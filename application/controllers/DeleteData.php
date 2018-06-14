<?php
class DeleteData extends CI_Controller{
    function deleteitems()
    {
        $item_pk = $this->input->post('item_pk');

        $this->db->where('item_pk',$item_pk)->delete('items');
        redirect('MyController/order','refresh');
        exit();
    }
}