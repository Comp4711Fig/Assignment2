<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Retrunpartrecords
 *
 * @author ljf92
 */
class Returnpartrecords extends MY_Model
{
    public $data;
    // Constructor
    public function __construct()
    {
        parent::__construct('returnpartrecords','id');
    }
}
