<?php
class UpdateModel extends CI_Model{
    public function update($item_pk,$name,$price,$item_number,$item_place)
    {

        $data = array(
            'name'=>$name,
            'price'=>$price,
            'item_number'=>$item_number,
            'item_place'=>$item_place
        );

        $this->db->where('item_pk',$item_pk)->update('items',$data);

    }
}