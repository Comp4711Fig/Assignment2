<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends Application {

    public function index() {

        $role = $this->session->userdata('userrole');
        if ($role != ROLE_BOSS) redirect('/');

        $this->data['pagetitle'] = 'Manage Page ('. $role . ')';
        
        $robots = $this->robots->all(); // get all the robots

        // build the part presentation output
        $result = '';   // start with an empty array        
        foreach ($robots as $robot) {
            $result .= $this->parser->parse('onerobot',(array)$robot,true);
        }
        // and then pass them on
        $this->data['display_robots'] = $result;
        
        
        // form to sell robot
        $fields = array(
            'frobot' => makeTextField('Enter robot id','robot', '', '', "Sell robot"),
            'zsubmit' => makeSubmitButton('Sell Robot', "Sell Robot", 'btn-success'),
        );
        $this->data = array_merge($this->data, $fields);
        
        
        $this->data['pagebody'] = 'manage';
        $this->render();
    }

    // handles reboot button
    public function reboot() {

        $sessions = $this->local_session->all();

        $apikey = '';
        $local_session = array();
        
        // reset spent and earned
        foreach($sessions as $session) {
            $apikey = $session->apikey;
            
            $local_session['plant'] = $session->plant;
            $local_session['token'] = $session->token;
            $local_session['apikey'] = $session->apikey;
            $local_session['spent'] = 0;
            $local_session['earned'] = 0;

            $local_session = (object) $local_session;
            $this->local_session->update($local_session);
        }
        
        $message = file_get_contents('https://umbrella.jlparry.com/work/rebootme?key=' . $apikey);

        // clears parts, historys, and robots table
        if (!strcmp($message, "Ok")) {
            $parts = $this->parts->all();
            foreach ($parts as $part) {
                $this->parts->delete($part->id);
            }
            $historys = $this->historys->all();
            foreach ($historys as $history) {
                $this->historys->delete($history->seq);
            }
            $robots = $this->robots->all();
            foreach ($robots as $robot) {
                $this->robots->delete($robot->id);
            }
        }

        $this->alert($message, 'success');

        $this->index();
    }

    // handles register button
    public function register() {

        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Manage Page (' . $role . ')';

        $fields = array(
            'fplant' => makeTextField('Plant name', 'plant', '', 'Work', "What needs to be done?"),
            'ftoken' => makeTextField('Secret token', 'token', '', 'Work', "What needs to be done?"),
            'zsubmit' => makeSubmitButton('Register', "Click on home or <back> if you don't want to change anything!", 'btn-success'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'register';
        $this->render();
    }

    // handle form submission
    public function submit() {
        $session = $this->input->post();
        $session = (object) $session;

        $apikey = file_get_contents('https://umbrella.jlparry.com/work/registerme/fig/' . $session->token);
        $session->apikey = substr($apikey, 3, 6);

        // registers session
        $this->local_session->add($session);

        $this->alert($apikey, 'success');

        $this->index();
    }

    // sells robot to PRC
    public function sellrobot() {
        
        $robotid = $this->input->post();
        
        // convert from array to string
        $robotid = implode($robotid);
        
        $robot = $this->robots->get($robotid);

        
        $sessions = $this->local_session->all();

        $local_session = array();
        $apikey = '';
        foreach($sessions as $session) {
            $apikey = $session->apikey;
        }

        $message = file_get_contents('https://umbrella.jlparry.com/work/buymybot/' .
                $robot->part1CA . '/' . $robot->part2CA . '/' . $robot->part3CA . '?key=' . $apikey); 

        // removes from robots table
        if (!strcmp($message, "Ok")) {
            
            // sell robot
            foreach($sessions as $session) {
                $apikey = $session->apikey;

                $local_session['plant'] = $session->plant;
                $local_session['token'] = $session->token;
                $local_session['apikey'] = $session->apikey;
                $local_session['spent'] = $session->spent;
                // each robot worth 50 bucks
                $local_session['earned'] = $session->earned + 50;;

                $local_session = (object) $local_session;
                $this->local_session->update($local_session);
            }

            // delete robot from database
            $this->robots->delete($robotid);
        }

        $this->alert($message, 'success');
        
        $this->index();
    }
}
