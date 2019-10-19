<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	//fungsi cek login
	public function login()
	{
        check_alredy_login();
		$this->load->view('login');
	}

	//fungsi proses login
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login']))
		{
			$this->load->model('m_auth', 'auth');
			$query = $this->auth->login($post);
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
					'id_staff' => $row->id_staff,
					'id_region' => 1
                    // 'id_jadwal' => $row->id_jadwal
                );
                $this->session->set_userdata($params);

				// $this->session->set_flashdata('flash','Login Berhasil');			
                
                
                echo "<script>window.location='".site_url('index.php/c_barista')."'</script>";
                
				
			}

			else
			{
				$this->session->set_flashdata('auth','Gagal');
				echo "<script>window.location='".site_url('index.php/auth/login')."'</script>";
			}
		}	

	}

	// fungsi logout
	public function logout()
	{
		$params = array('id_staff');
		$this->session->unset_userdata($params);
		redirect(base_url('index.php/auth/login'));
	}
}
