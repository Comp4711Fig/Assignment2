<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application
{
    public function index()
    {
	$role = $this->session->userdata('userrole');
        if ($role != ROLE_SUPERVISOR) redirect('/');
        
        $this->data['pagetitle'] = 'Assembly Page ('. $role . ')';
        
        $this->data['pagebody'] = 'assembly';
	$this->render(); 
    }
}
