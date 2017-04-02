<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends Application{
    public function index() {
        
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_BOSS) redirect('/');

        $this->data['pagetitle'] = 'Manage Page (' . $role . ')';
        $this->data['pagebody'] = 'manage';
        $this->render();
    }
    
    public function reboot() {
        
        $sessions = $this->local_session->all();

        $apikey = '';
        // loop over the post fields, looking for flagged tasks
        foreach($sessions as $session) {
            $apikey = $session->apikey;
        }

        $message = file_get_contents('https://umbrella.jlparry.com/work/rebootme?key=' . $apikey);
        
        if (!strcmp($message, "Ok"))
        {
            $parts = $this->parts->all();
            foreach ($parts as $part) {
                $this->parts->delete($part->id);
            }
            
            $historys = $this->historys->all();
            foreach ($historys as $history) {
                $this->historys->delete($history->seq);
            }
        }

        $this->alert($message, 'success');

        $this->index();
    }
    
    public function register() {

        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Manage Page (' . $role . ')';
        
        $fields = array(
            'fplant' => makeTextField('Plant name', 'plant', '', 'Work', "What needs to be done?"),
            'ftoken' => makeTextField('Secret token', 'token', '', 'Work', "What needs to be done?"),
            'zsubmit' => makeSubmitButton('Register', "Click on home or <back> if you don't want to change anything!", 
                    'btn-success'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'register';
        $this->render();

    }
    
    // handle form submission
    public function submit()
    {
        $session = $this->input->post();
        $session = (object) $session;
        
        $apikey = file_get_contents('https://umbrella.jlparry.com/work/registerme/fig/' . $session->token);
        $session->apikey = substr($apikey,3,6);
        
        $this->local_session->add($session);

        $this->alert($apikey, 'success');

        $this->index();
        
    }

    
    
}