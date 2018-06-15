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

}