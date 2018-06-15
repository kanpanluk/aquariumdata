<?php
class InsertModel extends CI_Model{
    function additems($name,$price,$item_number,$item_place,$item_before)
    {
        if(! $this->session->userdata('requestbill_pk') ) {
            $dat = array(
                'staff_pk' => $this->session->userdata('staff_pk'),
                'requestbill_status' => false,
                'requestbill_buystatus' => false
            );

            $this->db->insert('requestbills', $dat);
            $this->session->set_userdata(array('requestbill_pk' => $this->db->insert_id()));

        }

        $data = array(

            'name'=>$name,
            'price'=>$price,
            'item_number'=>$item_number,
            'item_place'=>$item_place,
            'item_before'=>$item_before,
            'requestbill_pk'=>$this->session->userdata('requestbill_pk')
        );

        $this->db->insert('items',$data);
    }

    function addnewBill()
    {
        $this->session->unset_userdata(array('requestbill_pk'));
    }

}