<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->data['plant'] = $source->plant;
        $this->data['stamp'] = $source->stamp;
        
        $this->render();
    }
    
    public function buildparts() {
        
        $sessions = $this->local_session->all();

        $apikey = '';
        // loop over the post fields, looking for flagged tasks
        foreach($sessions as $session) {
            $apikey = $session->apikey;
        }

        $parts = file_get_contents('https://umbrella.jlparry.com/work/mybuilds?key=' . $apikey);
        $parts = json_decode($parts, true);   
        
        foreach ($parts as $part) {
            $part = (object) $part;  // convert back to object
            if ($part->model >= 'a' && $part->model <= 'l') {
                $part->line = 'household';
            }
            else if ($part->model >= 'm' && $part->model <= 'v') {
                $part->line = 'butler';
            }
            else if ($part->model >= 'w' && $part->model <= 'z') {
                $part->line = 'companion';
            }
            $this->parts->add($part);
            
            $history = array('seq' => $part->id, 'plant' => $part->plant, 'action' => 'build', 
                'quantity' => 1, 'amount' => 50, 'stamp' => $part->stamp, 'model' => $part->model, 
                'line' => $part->line);
            $history = (object) $history;  // convert back to object
            $this->historys->add($history);
        }

        redirect('/part');
    }

    public function buyparts() {
        
        $sessions = $this->local_session->all();

        $apikey = '';
        // loop over the post fields, looking for flagged tasks
        foreach($sessions as $session) {
            $apikey = $session->apikey;
        }

        $parts = file_get_contents('https://umbrella.jlparry.com/work/mybuilds?key=' . $apikey);
        $parts = json_decode($parts, true);   
        
        foreach ($parts as $part) {
            $part = (object) $part;  // convert back to object
            if ($part->model >= 'a' && $part->model <= 'l') {
                $part->line = 'household';
            }
            else if ($part->model >= 'm' && $part->model <= 'v') {
                $part->line = 'butler';
            }
            else if ($part->model >= 'w' && $part->model <= 'z') {
                $part->line = 'companion';
            }
            $this->parts->add($part);
            
            $history = array('seq' => $part->id, 'plant' => $part->plant, 'action' => 'buy', 
                'quantity' => 1, 'amount' => 50, 'stamp' => $part->stamp, 'model' => $part->model, 
                'line' => $part->line);
            $history = (object) $history;  // convert back to object
            $this->historys->add($history);
        }

        redirect('/part');
    }
}
