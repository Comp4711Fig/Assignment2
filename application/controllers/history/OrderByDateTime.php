<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrderByDateTime extends Application {
    
    private $items_per_page = 20;
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function index()
    {
        $historys = $this->historys->all(); // get all history
        $this->show_page($historys);
    }
    
    // Show a single page of history items
    private function show_page($historys)
    {
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_BOSS) redirect('/');
        $this->data['pagetitle'] = 'History Page ('. $role . ')';
        
        // order them by datetime
        usort($historys, "orderByDateTime");

        // and then pass them on
        $this->data['display_historys'] = $historys;
        $this->data['pagebody'] = 'historys';
        $this->render();
    }
    
    // Extract & handle a page of items, defaulting to the beginning
    function page($num = 1)
    {
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_BOSS) redirect('/');
        $this->data['pagetitle'] = 'History Page ('. $role . ')';
        
        $records = $this->historys->all(); // get all the historys
        $historys = array(); // start with an empty extract

        // use a foreach loop, because the record indices may not be sequential
        $index = 0; // where are we in the historys list
        $count = 0; // how many items have we added to the extract
        $start = ($num - 1) * $this->items_per_page;
        foreach($records as $history) {
            if ($index++ >= $start) {
                $historys[] = $history;
                $count++;
            }
            if ($count >= $this->items_per_page) break;
        }

        $this->data['pagination'] = $this->pagenav($num);
        $this->show_page($historys);
    }
    
    // Build the pagination navbar
    private function pagenav($num) {
        $lastpage = ceil($this->historys->size() / $this->items_per_page);
        $parms = array(
            'first' => 1,
            'previous' => (max($num-1,1)),
            'next' => min($num+1,$lastpage),
            'last' => $lastpage
        );
        return $this->parser->parse('itemnav_orderbydatetime',$parms,true);
    }
}

// return -1, 0, or 1 of $a's datetime is earlier, equal to, or later than $b's
function orderByDateTime($a, $b)
{
    if ($a->stamp < $b->stamp)
        return -1;
    elseif ($a->stamp > $b->stamp)
        return 1;
    else
        return 0;
}
