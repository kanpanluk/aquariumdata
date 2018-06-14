<?php
class UpdateData extends CI_Controller{
    function updateitems()
    {
        $item_pk =  $this->input->post('item_pk');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $item_number = $this->input->post('item_number');
        $item_place = $this->input->post('item_place');

        $this->UpdateModel->update($item_pk,$name,$price,$item_number,$item_place);
        redirect('MyController/order','refresh');
        exit();
    }
}