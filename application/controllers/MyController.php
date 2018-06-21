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

    public function checkorder()
    {
        $this->load->view('header');
        $this->load->view('order/checkorderpage');
        $this->load->view('footer');
    }

    public function acceptitem()
    {
        $this->load->view('header');
        $this->load->view('order/acceptitem');
        $this->load->view('footer');
    }
    public function confirmbills()
    {
        $this->load->view('header');
        $this->load->view('order/confirmbills');
        $this->load->view('footer');
    }

    public function confirmbuyeditems()
    {
        $this->load->view('header');
        $this->load->view('order/confirmbuyeditems');
        $this->load->view('footer');
    }

    public function claim()
    {
        $this->load->view('header');
        $this->load->view('claim');
        $this->load->view('footer');
    }

    public function confirmclaim()
    {
        $this->load->view('header');
        $this->load->view('confirmclaim');
        $this->load->view('footer');

    }

    public function logout()
    {
        $this->session->set_userdata(array('login' => false));
        redirect('Welcome/index','refresh');
    }


}