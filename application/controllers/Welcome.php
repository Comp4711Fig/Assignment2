<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index() {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Home Page (' . $role . ')';
        $this->data['pagebody'] = 'homepage';
        $this->render();
    }

}
