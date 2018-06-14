<?php
class QueryJSONModel extends CI_Model{

    function showitems()
    {
        return $this->db->select('*')->from('items')->where('requestbill_pk',$this->session->userdata('requestbill_pk'))->get()->result();
    }


}