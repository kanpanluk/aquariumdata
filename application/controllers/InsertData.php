<?php
class InsertData extends CI_Controller{

    function getitems()
    {
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $item_number = $this->input->post('item_number');
        $item_place = $this->input->post('item_place');
        $item_before = $this->input->post('item_before');

        $this->InsertModel->additems($name,$price,$item_number,$item_place,$item_before);
        redirect('MyController/order','refresh');
        exit();
    }

    function getbills()
    {
        $this->InsertModel->addnewBill();
        redirect('MyController/order','refresh');
        exit();
    }

    function getnotes()
    {
        $requestbill_pk = $this->input->post('requestbill_pk');
        $item_pk = $this->input->post('item_pk');
        $note = $this->input->post('note');

        $this->InsertModel->addnewnote($requestbill_pk,$item_pk,$note);
        redirect('MyController/confirmbuyeditems','refresh');
        exit();
    }

    function getclaim()
    {
        $item_pk = $this->input->post('item_pk');
        $item_number = $this->input->post('item_number');

        $this->InsertModel->addnewclaim($item_pk,$item_number);
        redirect('MyController/claim','refresh');
        exit();
    }

    function getstocks()
    {
        $name = $this->input->post('name');
        $item_number = $this->input->post('item_number');

        $this->InsertModel->addstock($name,$item_number);
        redirect('MyController/confirmbuyeditems','refresh');
        exit();

    }

}