<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db->flush_cache();
    }

    public function getAll($table) {
        return $this->db->get($table)->result();
    }

    public function insert_data($table, $fordata) {
        return $this->db->insert($table, $fordata);
    }

   public function update_data($where, $table, $content) {
       return $this->db->update($table, $content, $where);
   }
   public function update($table, $content, $selection) {
        $this->db->where($selection, $content[$selection]);
        $this->db->update($table, $content);
    }

    public function delete_data($table, $fordata) {
        $this->db->delete($table, $fordata);
    }
    public function getNotifikasi(){
        $sql = "SELECT * FROM notifikasi
                WHERE status = 0";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

}
