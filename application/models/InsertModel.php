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

            $dat = array(
                'requestbill_pk' => $this->session->userdata('requestbill_pk'),
                'acceptbill_status' => false,

            );
            $this->db->insert('acceptbill', $dat);

            $dat = array(
                'requestbill_pk' => $this->session->userdata('requestbill_pk'),

            );
            $this->db->insert('buybills', $dat);

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

        $checkitem = $this->db->select('*')->from('accs')->where('acc_name',$name)->get()->result();

        if(! $checkitem)
        {
            $data = array(

                'acc_name'=>$name,
                'department_pk'=>0

            );

            $this->db->insert('accs',$data);
        }
    }

    function addnewBill()
    {
        $this->session->unset_userdata(array('requestbill_pk'));
    }

    function addnewnote($requestbill_pk,$item_pk,$note){

        $check=$this->db->select('*')->from('note')
            ->where('requestbill_pk',$requestbill_pk)
            ->where('item_pk',$item_pk)->get()->result();

        $data = array(
            'requestbill_pk' => $requestbill_pk,
            'item_pk' => $item_pk,
            'note_note' => $note

        );

        if( ! $check )
            $this->db->insert('note',$data);
        else
            $this->db->update('note',$data);

    }

    function addnewclaim($item_pk,$item_number)
    {
        $this->db->set('item_claimnumber', 'item_claimnumber+1', FALSE)
            ->set('claim_status',true)
            ->where('item_pk', $item_pk)
            ->update('items');

        $data = array(
            'item_pk' => $item_pk,
            'item_number' => $item_number ,
            'staff_pk' => $this->session->userdata('staff_pk')

        );

        $this->db->insert('claims',$data);

    }

}