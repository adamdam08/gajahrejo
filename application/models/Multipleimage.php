<?php
class Multipleimage extends CI_Model
{
    public function upload($data = array())
    {
        // Insert Ke Database dengan Banyak Data Sekaligus
        return $this->db->insert_batch('barangimg', $data);
    }
}
