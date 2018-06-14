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


}