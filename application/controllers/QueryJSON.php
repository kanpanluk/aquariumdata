<?php
class QueryJSON extends CI_Controller
{
    function jsonEncodeItems()
    {
        echo json_encode($this->QueryJSONModel->showitems());
    }

    function jsonEncodeStaffs()
    {
        echo json_encode($this->QueryJSONModel->showstaffs());
    }

    function jsonEncodeRequestbills()
    {
        echo json_encode($this->QueryJSONModel->showrequestbills());
    }

    function jsonEncodeItemsfromBill()
    {
        $requestbill_pk = $this->input->post('requestbill_pk');
        $this->session->set_userdata(array('requestbill_pk' => $requestbill_pk));
        echo json_encode($this->QueryJSONModel->showitems());
    }

    function jsonEncodeAccs()
    {
        echo json_encode($this->QueryJSONModel->showaccs());
    }

    function jsonEncodeRequestbillsBuyTrue()
    {
        echo json_encode($this->QueryJSONModel->showbuyedbill());
    }

    function jsonEncodeUnconfirmbills()
    {
        echo json_encode($this->QueryJSONModel->showunconfirmbills());
    }

    function jsonEncodeConfirmbuyeditems()
    {
        echo json_encode($this->QueryJSONModel->showconfirmbuyeditems());
    }

    function jsonEncodeClaimitem()
    {
        echo json_encode($this->QueryJSONModel->showclaimitem());
    }

    function jsonEncodeClaims()
    {
        echo json_encode($this->QueryJSONModel->showclaims());
    }
}