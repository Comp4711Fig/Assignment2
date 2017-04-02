<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index() {

        $role = $this->session->userdata('userrole');

        $this->data['pagetitle'] = 'Home Page (' . $role . ')';
        //Total # of parts on hand
        $parts = sizeof($this->parts->all()); // get all the parts
        //Total # assembled bots
        $robots = sizeof($this->robots->all());

        //Total spent and earned
        $sessions = $this->local_session->all();
        foreach($sessions as $session) {
            $spent = $session->spent;
            $earned = $session->earned;
        }

        //replace the view with the content  (value =parts,robots, spent and earned)
        //total number of parts
        $this->data['numParts'] = $parts;
        // total number of robots
        $this->data['numRobots'] = $robots;
        // total spent
        $this->data['spent'] = $spent;
        // total earned
        $this->data['earned'] = $earned;
        $this->data['pagebody'] = 'homepage';
        $this->render();
    }
}
