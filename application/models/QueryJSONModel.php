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
            $data = $this->db->select('*')->from('staffs')->where('staff_name',$name)->where('staff_password',$password)->get()->result();
            foreach ($data as $item){
                $this->session->set_userdata(array('staff_pk' => $item->staff_pk));
                $this->session->set_userdata(array('department_pk' => $item->department_pk));

            }
            $department_id = $this->db->select('*')
                ->from('departments')
                ->where('department_pk',$this->session->userdata('department_pk'))->get()->result();

            foreach ( $department_id as $item){
                $this->session->set_userdata(array('department_id' => $item->department_id));
            }

            $this->session->set_userdata(array('login' => true));

        }

        return $check;
    }

    function showaccs(){
        return $this->db->select('*')
            ->from('accs')->get()->result();
    }

    function showbuyedbill()
    {
        return $this->db->select('*')->from('requestbills r')
            ->join('acceptbill a' , 'a.requestbill_pk=r.requestbill_pk')
            ->where('requestbill_buystatus',true)
            ->where('acceptbill_status',false)->get()->result();
    }

    function showunconfirmbills()
    {
        return $this->db->select('*')->from('requestbills')
            ->where('requestbill_status',false)
            ->get()->result();
    }

    function showconfirmbuyeditems()
    {
        return $this->db->select('*')->from('requestbills')
            ->where('requestbill_buystatus',false)
            ->where('requestbill_status',true)
            ->get()->result();
    }

    function showclaimitem()
    {
        return $this->db->select('*')
            ->from('acceptbill a')
            ->join('requestbills r' , 'r.requestbill_pk = a.requestbill_pk')
            ->join('items i' , 'i.requestbill_pk = r.requestbill_pk')
            ->where('a.acceptbill_status',true)
            ->where('i.claim_status',false)
            ->get()->result();

//        SELECT *
//        FROM acceptbill JOIN requestbills JOIN items
//        WHERE acceptbill_status = true
//          AND acceptbill.requestbill_pk = requestbills.requestbill_pk
//          AND items.requestbill_pk = requestbills.requestbill_pk
//
//          AND items.item_pk NOT IN (SELECT claims.item_pk
//                       FROM claims
//                   GROUP BY claims.item_pk)
    }

    function showclaims()
    {
        return $this->db->select('*')
            ->from('claims c')
            ->join('items i','c.item_pk = i.item_pk')
            ->where('i.claim_status',true)
            ->group_by('i.item_pk')
            ->get()->result();
    }

    function showstocks()
    {
        return $this->db->select('*')
            ->from('stocks s')
            ->join('accs a','a.acc_pk = s.acc_pk')
            ->where('department_pk',$this->session->userdata('department_pk'))
            ->get()->result();
    }

    function shownotes()
    {
        return $this->db->select('*')
            ->from('note')
            ->get()->result();
    }
}