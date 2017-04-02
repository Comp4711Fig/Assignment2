<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    private $items_per_page = 20;

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_BOSS)
            redirect('/');
        $this->data['pagetitle'] = 'History Page (' . $role . ')';

        $historys = $this->historys->all(); // get all history
        $this->show_page($historys);
    }

    // Show a single page of todo items
    private function show_page($historys) {
        // convert the array of history objects into an array of associative objects
        $display_historys = array();  
        foreach ($historys as $history) {
            $display_historys[] = (array) $history;
        }

        // and then pass them on
        $this->data['display_historys'] = $display_historys;
        $this->data['pagebody'] = 'historys';
        $this->render();
    }

    // Extract & handle a page of items, defaulting to the beginning
    function page($num = 1) {
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_BOSS)
            redirect('/');
        $this->data['pagetitle'] = 'History Page (' . $role . ')';

        $records = $this->historys->all(); // get all the historys
        $historys = array(); // start with an empty extract
        // use a foreach loop, because the record indices may not be sequential
        $index = 0; // where are we in the historys list
        $count = 0; // how many items have we added to the extract
        $start = ($num - 1) * $this->items_per_page;
        foreach ($records as $history) {
            if ($index++ >= $start) {
                $historys[] = $history;
                $count++;
            }
            if ($count >= $this->items_per_page)
                break;
        }

        $this->data['pagination'] = $this->pagenav($num);
        $this->show_page($historys);
    }

    // Build the pagination navbar
    private function pagenav($num) {
        $lastpage = ceil($this->historys->size() / $this->items_per_page);
        $parms = array(
            'first' => 1,
            'previous' => (max($num - 1, 1)),
            'next' => min($num + 1, $lastpage),
            'last' => $lastpage
        );
        return $this->parser->parse('itemnav', $parms, true);
    }

    // handles filter by robot model
    public function filterbyrobotmodel() {    
        
        $fields = array(
            'fhistory' => makeTextField('Enter robot model','history', '', '', "Filter by robot model"),
            'zsubmit' => makeSubmitButton('Filter', "Filter by robot model", 'btn-success'),
        );
        $this->data = array_merge($this->data, $fields);
        
        $this->data['pagebody'] = 'filterbyrobotmodel';
        $this->render();
    }
    
    // handles filter by robot line
    public function filterbyrobotline() {    
        
        $fields = array(
            'fhistory' => makeTextField('Enter robot line','history', '', '', "Filter by robot line"),
            'zsubmit' => makeSubmitButton('Filter', "Filter by robot line", 'btn-success'),
        );
        $this->data = array_merge($this->data, $fields);
        
        $this->data['pagebody'] = 'filterbyrobotline';
        $this->render();
    }

}
