<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 1/6/2561
 * Time: 21:23
 */
class MyController extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->view('index');
        $this->load->view('footer');
    }
    public function order()
    {
        $this->load->view('header');
        $this->load->view('order/orderpage');
        $this->load->view('footer');
    }


}