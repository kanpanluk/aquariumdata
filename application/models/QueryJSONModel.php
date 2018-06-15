<?php
class QueryJSONModel extends CI_Model{

    function showitems()
    {

        return $this->db->select('*')->from('items')->where('requestbill_pk',$this->session->userdata('requestbill_pk'))->get()->result();
    }

    function showrequestbills()
    {
        return $this->db->select('*')->from('requestbills')->get()->result();
    }

    function logincheck($name,$password)
    {
        $check = $this->db->select('staff_name','staff_password')->from('staffs')->where('staff_name',$name)->where('staff_password',$password)->get()->result();

        if($check){
            $data = $this->db->select('staff_pk')->from('staffs')->where('staff_name',$name)->where('staff_password',$password)->get()->result();
            foreach ($data as $item){
                $this->session->set_userdata(array('staff_pk' => $item->staff_pk));
            }

            $this->session->set_userdata(array('login' => true));
        }

        return $check;
    }

    function showaccs($staff_pk){

        return $this->db->select('*')->from('staffs')->join('departments')->join('accs')->where('staff_pk',$staff_pk)->get()->result();
    }
}