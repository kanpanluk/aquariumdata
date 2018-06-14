<?php
class QueryJSON extends CI_Controller
{
    function jsonEncodeItems()
    {
        echo json_encode($this->QueryJSONModel->showitems());
    }


}