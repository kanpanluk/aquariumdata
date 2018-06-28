<?php
class UpdateModel extends CI_Model{

    public function update($item_pk,$name,$price,$item_number,$item_place,$item_before)
    {

        $data = array(
            'name'=>$name,
            'price'=>$price,
            'item_number'=>$item_number,
            'item_place'=>$item_place,
            'item_before'=>$item_before
        );

        $this->db->where('item_pk',$item_pk)->update('items',$data);

    }

    function updateacceptbill_status($requestbill_pk)
    {

        $data = array(
            'acceptbill_status'=> true ,
            'staff_pk' => $this->session->userdata('staff_pk')
        );

        $this->db->where('requestbill_pk',$requestbill_pk)->update('acceptbill',$data);
    }

    function confirmrequestbills($requestbill_pk)
    {
        $data = array(
            'requestbill_status'=> true ,
        );

        $this->db->where('requestbill_pk',$requestbill_pk)->update('requestbills',$data);
    }

    function confirmbuyeditems($buybill_time,$buybill_price,$items)
    {

              $data = array(
            'requestbill_buystatus'=> true ,
        );

        $this->db->where('requestbill_pk',$this->session->userdata('requestbill_pk'))->update('requestbills',$data);

        $data = array(
            'buybill_time'=> $buybill_time ,
            'buybill_price' => $buybill_price
        );

        $this->db->where('requestbill_pk',$this->session->userdata('requestbill_pk'))->update('buybills',$data);


    }

    function confirmClaims($item_pk)
    {
        $data = array(
            'claim_status' => false
        );

        $this->db->where('item_pk',$item_pk)->update('items',$data);
    }

    function updatestocks($acc_name,$item_pk,$item_number)
    {
        $table = $this->db->select('*')
            ->from('accs a')
            ->join('stocks s','s.acc_pk = a.acc_pk')
            ->where('acc_name',$acc_name)->get()->result();

        if($table){
            foreach ($table as $item) {
                $acc_pk = $item->acc_pk;
                $number = $item->number;
            }

            $this->db->set('number', $number - $item_number, false)
                ->where('acc_pk', $acc_pk)
                ->update('stocks');

            $data = array(
                'acc_pk' => $item_pk,
                'number' => $item_number
            );
            $this->db->insert('stocks_out', $data);

            $table = $this->db->select('*')
                ->from('items')
                ->where('item_pk', $item_pk)->get()->result();

            foreach ($table as $item) {
                $number = $item->item_number;
            }

            $this->db->set('item_number', $number - $item_number, false)
                ->where('item_pk', $item_pk)
                ->update('items');
        }

    }

}

