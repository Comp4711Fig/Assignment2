<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index() {
        $role = $this->session->userdata('userrole');
        
        $this->data['pagetitle'] = 'Home Page (' . $role . ')';
         //Total # of parts on hand
         $parts = $this->parts->all(); // get all the parts
         $partsCounter =0;
        foreach($parts as $part){
        $partsCounter++;  
        }
        //Total # assembled bots

        //Total spent

        //Total earned 
           
      // replace the view with the content  (value =partsCounter)
        $this->data['numParts'] = $partsCounter;
         $this->data['pagebody'] = 'homepage';
        $this->render();
    }

}
