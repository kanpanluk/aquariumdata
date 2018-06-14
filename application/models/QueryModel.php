<?php
class QueryModel extends CI_Model{
    function showitems()
    {
        return $this->db->select('*')->from('test')->get()->result();
    }
}