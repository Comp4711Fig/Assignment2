<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
	$role = $this->session->userdata('userrole');
        if ($role != ROLE_SUPERVISOR) redirect('/');
        
        $this->data['pagetitle'] = 'Assembly Page ('. $role . ')';
        $isAuth = ROLE_SUPERVISOR;
        $top = array();
        $torso = array();
        $bottom = array();
        $cellsForRobots = array();
        
        //get all parts
        $parts = $this->parts->all();
        //get all robots
        $robots = $this->robots->all();
        //single parts
        foreach ($parts as $part){
            if($part->piece == 1){
                $top[]= $this->parser->parse('_singlePart', (array) $part, true);
            }else if($part->piece == 2){
                $torso[]= $this->parser->parse('_singlePart', (array) $part, true);
            }else if($part->piece == 3){
                $bottom[]= $this->parser->parse('_singlePart', (array) $part, true);
            }
        }
       // build a robot
        foreach ($robots as $robot){
            $robot=(object)$robot;
            $robot->part1model = $this->parts->get($robot->part1CA)->model;
            $robot->part1piece = $this->parts->get($robot->part1CA)->piece;
            $robot->part2model = $this->parts->get($robot->part2CA)->model;
            $robot->part2piece = $this->parts->get($robot->part2CA)->piece;
            $robot->part3model = $this->parts->get($robot->part3CA)->model;
            $robot->part3piece = $this->parts->get($robot->part3CA)->piece;
            $cellsForRobots[] = $this->parser->parse('_singleRobot', (array)$robot, true);
        }
        //create a html table 
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="theTable">',
            'cell_start' => '<td class="justOne">',
            'table_close' => '</table>'
        );
        
        $this->table->set_template($template);
        //finally generate the top part table
        $this->table->set_caption('Top Part');
        $rows = $this->table->make_columns($top, 3);
        $this->data['thetableTop'] = $this->table->generate($rows);
        
        //generate the torso part table
        $this->table->set_caption('Torso Part');
        $rows = $this->table->make_columns($torso, 3);
        $this->data['thetableTorso'] = $this->table->generate($rows);
        
        //generate the bottom part table
        $this->table->set_caption('Bottom Part');
        $rows = $this->table->make_columns($bottom, 3);
        $tableHtml = $this->table->generate($rows); 
        $tableHtml .= $this->parser->parse('_assemblyReturn',[], true);
        $this->data['thetableBottom'] = $tableHtml;
        $this->data['partFormAction'] = $isAuth ? '/assembly/assemblyOrReturn' : '#';
        
        //generate the assembled robots table
        $this->table->set_caption('Assembled Robots');
        $rows = $this->table->make_columns($cellsForRobots, 3);
        $this->data['thetableRobots'] = $this->table->generate($rows);
        
        $this->data['pagebody'] = 'assembly';
        $this->render();
    }
    //for assembly button or retrun button
    public function assemblyOrReturn(){
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_SUPERVISOR) redirect('/');
       //if click assembly button
        if(isset($_POST['assembly'])){
            $error_msgs = array();
            $partIds = array();
            $orderedPartsIds = array();
            
            foreach($this->input->post() as $key=>$value) {
                 if (substr($key,0,4) == 'part'){
                      $partIds[] = substr($key, 4);
                 }
            }
           
            //validation
            if(count($partIds) != 3 ){
                $error_msgs[]="You must choose exactly 3 parts !";
            }
            //get the id that choosed
            if(count($error_msgs) == 0){
                $pieceIds = [1,2,3];
                foreach ($partIds as $partId){
                    $pieceId = $this->parts->get($partId)->piece;
                    if(($key = array_search($pieceId,$pieceIds))!==FALSE){
                          if($pieceId == 1){
                              $orderedPartsIds[0] = $partId;
                          }else if($pieceId == 2){
                               $orderedPartsIds[1] = $partId;
                          }else {
                               $orderedPartsIds[2] = $partId;
                          }
                          unset($pieceIds[$key]);
                    }else{
                            $error_msgs[] = "You must choose only one part from each category to assembly!";
                            break;
                    }
                 }
            }
            //create the robot table
            if (count($error_msgs) == 0) {
                $robot = $this->robots->create();
                $robot->part1CA = $orderedPartsIds[0];
                $robot->part2CA = $orderedPartsIds[1];
                $robot->part3CA = $orderedPartsIds[2];
                $robot->timestamp = date('Y-m-d H:i:s',time());
                $robot->status = 1;
                $this->robots->add($robot);
                $this->alert('Assembly a robot Successful!');
            }else{
                $this->alert('<strong>Validation errors!<strong><br>'.$error_msgs[0], 'danger');
            }    
         } 
        //if click return button
         else if(isset($_POST['return'])){
            $url = "http://umbrella.jlparry.com/work/recycle";
            $partsUrl = "";
           
           
              foreach ($this->input->post() as $key => $value) {
                if (substr($key, 0, 4) == 'part') {
                    $partIds[] = substr($key, 4);
                }
            }
                
                foreach( $partIds as $partId) {
                    $partsUrl .= "/".$partId;
                    //check url is base_url/part1/part2/part3
                    if(substr_count($partsUrl, "/") == 3){
                        $allUrl = $url.$partsUrl;
                        $response = file_get_contents($allUrl.'?key=2fba4b');
                        $responses= explode(" ", $response);
                        if ($response == "Ok"){
                            $gets+= $responses;
                        }
                        $partsUrl = "";
                    }
               //delete the part for parts table
               $this->parts->delete($partId);   
               $this->alert('Return Parts Successful!');
        }
    }
     $this->index();
    }
}
    
                    