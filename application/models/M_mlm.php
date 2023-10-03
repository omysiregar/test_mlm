<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_mlm extends CI_Model
{

	public function jumlah_data($nama)
	{

		$sql = "SELECT * FROM user WHERE nama LIKE ? and upline_id is null";
		$query = $this->db->query($sql, $nama);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$query->free_result();
			return $result;
		} else {
			return array();
		}
	}


	public function list_upline()
	{
		$sql = "SELECT * FROM user WHERE upline_id is null";
		$query = $this->db->query($sql);
	    if ($query->num_rows() > 0) {
	        $result = $query->result_array();
	        $query->free_result();
	        return $result;
	    } else {
	        return array();
	    }
	}

	public function jumlah_list_upline($params)
	{
		$sql = "SELECT * FROM user WHERE upline_id = $params";
		$query = $this->db->query($sql, $params);
	    if ($query->num_rows() > 0) {
	        $result = $query->result_array();
	        $query->free_result();
	        return $result;
	    } else {
	        return array();
	    }
	}

	// public function all_data($params) {

	//     $sql = "SELECT * FROM user WHERE nama LIKE ? 
	// 	ORDER BY id_user DESC
	// 	LIMIT ?,?";
	//     $query = $this->db->query($sql,$params);
	//     if ($query->num_rows() > 0) {
	//         $result = $query->result_array();
	//         $query->free_result();
	//         return $result;
	//     } else {
	//         return array();
	//     }
	// }
	function all_data($params = NULL)
	{
		$data['level1'] = $this->db->query(
			"SELECT * FROM user WHERE nama LIKE " . $params[0] . " AND upline_id is null ORDER BY id_user DESC"
		)->result();
		foreach ($data['level1'] as $nom => $row) {
			$data['level2'][$nom] = $this->db->query(
				"SELECT * FROM user  
            WHERE nama LIKE  " . $params[0] . " and upline_id = '$row->id_user' ORDER BY id_user DESC"
			)->result();
		}
		return $data;
	}


	public function get_data_exist($nama)
	{
		$sql = "SELECT * FROM user WHERE no_telp LIKE ? ";
		$query = $this->db->query($sql, $nama);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$query->free_result();
			return $result;
		} else {
			return array();
		}
	}

	public function dt($idx)
	{
		$sql = "SELECT * FROM user WHERE id_user LIKE ? ";
		$query = $this->db->query($sql, $idx);
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			$query->free_result();
			return $result;
		} else {
			return array();
		}
	}
}
