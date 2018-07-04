<?php
class UpdateData extends CI_Controller{
    function updateitems()
    {
        $item_pk =  $this->input->post('item_pk');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $item_number = $this->input->post('item_number');
        $item_place = $this->input->post('item_place');
        $item_before = $this->input->post('item_before');


        $this->UpdateModel->update($item_pk,$name,$price,$item_number,$item_place,$item_before);
        redirect('MyController/order','refresh');
        exit();
    }

    function updateAcceptbill_status()
    {
        $requestbill_pk = $this->input->post('requestbill_pk');

        $this->UpdateModel->updateacceptbill_status($requestbill_pk);

        redirect('MyController/acceptitem','refresh');
        exit();

    }

    function confirmRequestbills()
    {
        $requestbill_pk = $this->input->post('requestbill_pk');

        $this->UpdateModel->confirmrequestbills($requestbill_pk);

        redirect('MyController/confirmbills','refresh');
        exit();

    }

    function confirmBuyeditems()
    {

        $buybill_price = $this->input->post('buybill_price');
        $buybill_time = $this->input->post('buybill_time');

        $this->UpdateModel->confirmbuyeditems($buybill_time,$buybill_price);

        redirect('MyController/confirmbuyeditems','refresh');
        exit();
    }

    function confirmClaims()
    {
        $item_pk = $this->input->post('item_pk');

        $this->UpdateModel->confirmClaims($item_pk);

        redirect('MyController/confirmclaim','refresh');
        exit();
    }

    function getstocks()
    {
        $acc_name = $this->input->post('acc_name');
        $item_pk = $this->input->post('item_pk');
        $item_number = $this->input->post('item_number');
        $note = $this->input->post('note');
        $requestbill_pk = $this->input->post('requestbill_pk');

        $check = $this->UpdateModel->updatestocks($acc_name,$item_pk,$item_number,$requestbill_pk);

        if($check){
            $this->InsertModel->addnewnote($requestbill_pk,$item_pk,$note);
        }

    }
}