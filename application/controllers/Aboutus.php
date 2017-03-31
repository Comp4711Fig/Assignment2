<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends Application
{
    public function index()
    {
	$role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Assembly Page ('. $role . ')';

        $this->data['pagebody'] = 'aboutus';
	$this->render(); 
    }
}