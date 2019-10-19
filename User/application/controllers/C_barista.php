<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barista extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->library('form_validation');
        $this->load->model('m_barista', 'model');
    }

	public function index(){
        // $this->load->view('ex');

        $this->template->load('template', 'interface/v_dashboard');
	}

	public function pesanan(){

		$data = array(
			'basic' => $this->model->get_menu_basic(),
			'premium' => $this->model->get_menu_premium(),
			'soklat' => $this->model->get_menu_soklat(),
			'choco_pm' => $this->model->get_menu_choco_pm(),
			'yakult' => $this->model->get_menu_yakult(),
			'juice' => $this->model->get_menu_juice(),
			'topping' => $this->model->get_topping()
		);

		$this->template->load('template', 'interface/v_pesanan', $data);
	}

	public function cek_order(){
		$this->template->load('template', 'interface/v_cekPesanan');
	}

	public function stok(){

		$data = array(
			'basic' => $this->model->get_menu_basic(),
			'premium' => $this->model->get_menu_premium(),
			'soklat' => $this->model->get_menu_soklat(),
			'yakult' => $this->model->get_menu_yakult(),
			'juice' => $this->model->get_menu_juice(),
			'topping' => $this->model->get_topping(),
			'ekstra' => $this->model->get_ekstra(),
			'inv_powder' => $this->model->inventory_powder(),
			'inv_topping' => $this->model->inventory_topping()
		);

		$this->template->load('template', 'interface/v_inventory', $data);
	}

	public function history(){
		$this->template->load('template', 'interface/v_history');
	}

	public function detail($id){
		// echo $id;
		$query = $this->model->detail_nota($id);
		if($query->num_rows() > 0 ){
			$data['row'] = $query->row();
			$data['result'] = $this->model->detail_transaksi($id);

			$this->template->load('template', 'interface/v_detailPesanan', $data);
		}
		else{
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('c_barista/cek_order')."'</script>";
		}
		
	}


	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Menampilkan menu menu dan topping >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	public function get_menu(){
		$data = $this->model->get_menu();
		echo json_encode($data);
	}

	public function get_topping(){
		$data = $this->model->get_topping();
		echo json_encode($data);
	}

	public function get_sajian(){
		$id = $this->input->post('id', TRUE);
		$data = $this->model->get_sajian($id);
		echo json_encode($data);
	}

	public function powder_min(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_powder_min($id);
	}

	public function powder_plus(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_powder_plus($id);
	}

	public function topping_min(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_topping_min($id);	
	}

	public function topping_plus(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_topping_plus($id);
	}

	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Membuat nota transaksi baru >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	public function new_nota(){
		$tgl = $this->input->post('tanggal', TRUE);
		$wkt = $this->input->post('waktu', TRUE);
		$pembeli = $this->input->post('pembeli', TRUE);
		$t_awal = $this->input->post('sub_total', TRUE);
		$dis = $this->input->post('dis', TRUE);
		$t_akhir = $this->input->post('total_akhir', TRUE);
		// $id_id_jadwal = $this->input->post('id_jadwal', TRUE);
		$id_staff = $this->input->post('id_staff', TRUE);

		$data = $this->model->new_nota($tgl , $wkt , $pembeli , $t_awal , $dis , $t_akhir, $id_staff);
		echo json_encode(array('tgl' => $tgl , 'wkt' => $wkt));
	}

	public function get_new_nota(){
		$tgl = $this->input->post('tanggal', TRUE);
		$wkt = $this->input->post('waktu', TRUE);

		$data = $this->model->get_new_nota($tgl, $wkt);
		echo json_encode($data);
	}

	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Simpan Detail Transaksi >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function save_detail(){
		$data_detail = $this->input->post('data_pesanan');
		$id_nota = $this->input->post('id_n');
		$id_region = $this->session->userdata('id_region');

		$status = $this->model->add_detail($data_detail , $id_nota, $id_region);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	public function cek_pesanan(){
		$data = $this->model->cek_pesanan();
		echo json_encode($data);
	}

	public function update_status(){
		$id = $this->input->post('id', TRUE);

		$data = $this->model->update_status($id);
		echo json_encode($data);
	}

	public function list_history(){
		$id = $this->input->post('id', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$data = $this->model->history($id, $tanggal);
		echo json_encode($data);
	}

	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< EXTRA MILK MIN >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function basic(){
		$id = $this->input->post('id', TRUE);
		$this->model->basic($id);
	}

	public function premium(){
		$id = $this->input->post('id', TRUE);
		$this->model->premium($id);
	}

	public function basic_plus(){
		$id = $this->input->post('id', TRUE);
		$this->model->basic_plus($id);
	}

	public function premium_plus(){
		$id = $this->input->post('id', TRUE);
		$this->model->premium_plus($id);
	}

	public function sirup_min(){
		$id = $this->input->post('id', TRUE);
		$this->model->sirup_min($id);
	}

	public function sirup_plus(){
		$id = $this->input->post('id', TRUE);
		$this->model->sirup_plus($id);
	}

	public function cup_min(){
		$this->model->cup_min($id);
	}

	public function cup_plus(){
		$this->model->cup_plus($id);
	}

	// 

	public function get_nama_sajian(){
		$id = $this->input->post('id_p', TRUE);
		$data = $this->model->get_nama_sajian($id);
		echo json_encode($data);
	}

	public function get_nama_topping(){
		$id = $this->input->post('id_t', TRUE);
		$data = $this->model->get_nama_topping($id);
		echo json_encode($data);
	}	
}
