<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Public {
    public function index(){
        $this->load->view('public/principal/index');
    }
}