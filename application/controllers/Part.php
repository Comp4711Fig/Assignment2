<?php

class Part extends Application {

    public function index() {
        
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_WORKER) redirect('/');

        $this->data['pagetitle'] = 'Parts Page ('. $role . ')';
        $parts = $this->parts->all(); // get all the parts
        
        // build the part presentation output
        $result = '';   // start with an empty array        
        foreach ($parts as $part) {
            $result .= $this->parser->parse('onepart',(array)$part,true);
        }

        // and then pass them on
        $this->data['display_parts'] = $result;
        $this->data['pagebody'] = 'parts';
        $this->render();
    }
    
    public function getpart($id){
        $this->data['pagebody'] = 'singlepart';	
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Parts Page ('. $role . ')';
        
	$source = $this->parts->get($id);
        $this->data['id'] = $source->id;
        $this->data['model'] = $source->model;
        $this->data['piece'] = $source->piece;
        //$this->data['partCode'] = $source->partCode;
        //$this->data['caCode'] = $source->caCode;
        $this->data['plant'] = $source->plant;
        $this->data['stamp'] = $source->stamp;
        
        $this->render();
    }
    
    public function buildparts() {
        $parts = file_get_contents('https://umbrella.jlparry.com/work/mybuilds?key=434541');
        $parts = json_decode($parts, true);   
        
        foreach ($parts as $part) {
            $part = (object) $part;  // convert back to object
            $this->parts->add($part);
            
            if ($part->model >= 'a' && $part->model <= 'l') {
                $robotLine = 'household';
            }
            else if ($part->model >= 'm' && $part->model <= 'v') {
                $robotLine = 'butler';
            }
            else if ($part->model >= 'w' && $part->model <= 'z') {
                $robotLine = 'companion';
            }
            
            $history = array('seq' => $part->id, 'plant' => $part->plant, 'action' => 'build', 
                'quantity' => 1, 'amount' => 50, 'stamp' => $part->stamp, 'model' => $part->model, 'line' => $robotLine);
            $history = (object) $history;  // convert back to object
            $this->historys->add($history);
        }

        redirect('/part');
    }

    public function buyparts() {
        $parts = file_get_contents('https://umbrella.jlparry.com/work/buybox?key=434541');
        $parts = json_decode($parts, true);   
        
        foreach ($parts as $part) {
            $part = (object) $part;  // convert back to object
            $this->parts->add($part);
            
            if ($part->model >= 'a' && $part->model <= 'l') {
                $robotLine = 'household';
            }
            else if ($part->model >= 'm' && $part->model <= 'v') {
                $robotLine = 'butler';
            }
            else if ($part->model >= 'w' && $part->model <= 'z') {
                $robotLine = 'companion';
            }
            
            $history = array('seq' => $part->id, 'plant' => $part->plant, 'action' => 'build', 
                'quantity' => 1, 'amount' => 50, 'stamp' => $part->stamp, 'model' => $part->model, 'line' => $robotLine);
            $history = (object) $history;  // convert back to object
            $this->historys->add($history);
        }

        redirect('/part');
    }
}
