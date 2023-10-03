<?php

defined('BASEPATH') or exit('No direct script access allowed');

class halaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model("M_mlm", "mlm");
		// $this->load->library('upload');
		$this->load->library('pagination');
		$this->load->helper('test');
	}

	public function index()
	{
		$data['list'] = $this->mlm->list_upline();
		$data['modl'] = $this->mlm;
		$this->load->view('halaman/index', $data);
	}
	// public function get_jumlah_upline() {
    //     $params = $this->input->post('upline_id');
    //     $data = $this->Order->get_list_ruangan($params);
    //     echo json_encode($data);
    // }


	public function data()
	{
		$nama = empty($_GET['sort']) ? '%' : '%' . $_GET['sort'] . '%';
		//mangil ajaxpagination
		$query_total = count($this->mlm->jumlah_data($nama));
		$per = 2;

		$config['attributes'] = array('class' => 'page-link');
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['base_url'] = site_url("halaman/data");
		$config['total_rows'] = $query_total;
		$config['uri_segment'] = 3;
		$config['per_page'] = $per;


		// pagination attribute
		$start = $this->uri->segment(3, 0) + 1;
		$end = $this->uri->segment(3, 0) + $per;
		$end = (($end > $query_total) ? $query_total : $end);
		$pagination['start'] = ($query_total == 0) ? 0 : $start;
		$pagination['end'] = $end;
		$pagination['total'] = $query_total;
		$this->pagination->initialize($config);
		$pagination['data'] = $this->pagination->create_links();
		// pagination assign value
		$data['pagination'] = $pagination;
		$kode_nama = empty($_GET['sort']) ? "'%'" : "'%" . $_GET['sort'] . "%'";
		$params = array($kode_nama, ($start - 1), $per);
		$data['user'] = $this->mlm->all_data($params);
		/* end of pagination ---------------------- */
		$data['list'] = $this->mlm->list_upline();
		$this->load->view('halaman/data', $data);
	}

	public function add_proses()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$lan[] = 'nama';
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$lan[] = 'alamat';
		$this->form_validation->set_rules('no_telp', 'No. Telp', 'required');
		$lan[] = 'no_telp';
		if ($this->form_validation->run() == FALSE) {
			$array = array();
			foreach ($lan as $key => $value) {
				$array[$key] = array('id' => $value, 'err' => form_error($value));
			}
			echo json_encode(array('status' => 0, 'err' => $array));
		} else {
			$data['nama'] = $this->input->post('nama');
			$data['alamat'] = $this->input->post('alamat');
			$data['no_telp'] = $this->input->post('no_telp');
			$data['upline_id'] = empty($this->input->post('upline'))? null : $this->input->post('upline');
			if ($this->crud_model->insert_data('user', $data)) {
				// default error
				$status = "success";
				$status_no = 1;
				$pesan = "Penambahan data Berhasil !";
				$hasil = "Succes!";
			} else {
				$status = "danger";
				$status_no = 0;
				$pesan = "Penambahan data Gagal !";
				$hasil = "Error!";
			}
			$alert = "<div class='alert alert-$status alert-styled-left alert-dismissable'><button type='button' class='close' data-dismiss='alert'  ><span>&times;</span></button>
                    <span class='font-weight-semibold'>$hasil </span> $pesan</div>";
			echo json_encode(array('status' => $status_no, 'msg' => $alert));
		}
	}


	// delete process    
	public function delete()
	{
		if (!empty($_GET['idx'])) {
			$getData = $this->mlm->dt($_GET['idx']);
			if (!empty($getData)) {
				$status = 1;
				$pesan = 'Data berhasil dihapus !';
				$this->crud_model->delete_data('user', "id_user = '$_GET[idx]'");
			} else {
				$status = 1;
				$pesan = 'Data tidak terdaftar, coba lagi !';
			}
			echo json_encode(array('status' => $status, 'msg' => $pesan));
		} else {
			$status = 0;
			$pesan = 'Ada kesalahan !';
			echo json_encode(array('status' => $status, 'msg' => $pesan));
		}
	}
}
