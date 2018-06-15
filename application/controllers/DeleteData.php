<?php
class DeleteData extends CI_Controller{
    function deleteitems()
    {
        $item_pk = $this->input->post('item_pk');

        $this->db->where('item_pk',$item_pk)->delete('items');
        redirect('MyController/order','refresh');
        exit();
    }

    function deleterequestbills()
    {
        $requestbill_pk = $this->input->post('requestbill_pk');

        $this->db->where('requestbill_pk',$requestbill_pk)->delete('requestbills');
        $this->db->from('items')->where('requestbill_pk',$requestbill_pk)->delete('items');
        redirect('MyController/checkorder','refresh');
        exit();
    }


}