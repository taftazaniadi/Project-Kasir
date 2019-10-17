<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_barista extends CI_Model{


    	public function get_menu_basic(){

			$id_region = $this->session->userdata('id_region');

    		$this->db->select('*');
    		$this->db->from('powder');
    		$this->db->where('id_jenis', 1);
    		$this->db->where('sisa >', 0);
    		$this->db->WHERE('id_region', $id_region);
			$this->db->order_by('nama_powder' , 'ASC');

    		$query = $this->db->get();
    		return $query->result();

    	}

    	public function get_menu_premium(){

			$id_region = $this->session->userdata('id_region');

    		$this->db->select('*');
    		$this->db->from('powder');
    		$this->db->where('id_jenis', 2);
    		$this->db->where('sisa >', 0);
    		$this->db->WHERE('id_region', $id_region);
    		$this->db->order_by('nama_powder' , 'ASC');

    		$query = $this->db->get();
    		return $query->result();

    	}

    	public function get_menu_soklat(){

			$id_region = $this->session->userdata('id_region');

    		$this->db->select('*');
    		$this->db->from('powder');
    		$this->db->where('id_jenis', 3);
    		$this->db->where('sisa >', 0);
    		$this->db->WHERE('id_region', $id_region);
    		$this->db->order_by('nama_powder' , 'ASC');

    		$query = $this->db->get();
    		return $query->result();

		}

		public function get_menu_choco_pm(){

			$id_region = $this->session->userdata('id_region');

    		$this->db->select('*');
    		$this->db->from('powder');
    		$this->db->where('id_jenis', 4);
    		$this->db->where('sisa >', 0);
    		$this->db->WHERE('id_region', $id_region);
    		$this->db->order_by('nama_powder' , 'ASC');

    		$query = $this->db->get();
    		return $query->result();

		}
		
		public function get_menu_yakult(){

			$id_region = $this->session->userdata('id_region');

			$this->db->select('*');
			$this->db->from('powder');
			$this->db->where('id_jenis', 5);
			$this->db->where('sisa >', 0);
			$this->db->WHERE('id_region', $id_region);
			$this->db->order_by('nama_powder', 'ASC');

			$query = $this->db->get();
			return $query->result();

		}

		public function get_menu_juice(){

			$id_region = $this->session->userdata('id_region');

			$this->db->select('*');
			$this->db->from('powder');
			$this->db->where('id_jenis', 6);
			$this->db->where('sisa >', 0);
			$this->db->WHERE('id_region', $id_region);
			$this->db->order_by('nama_powder', 'ASC');

			$query = $this->db->get();
			return $query->result();

		}

    	public function get_topping(){

    		$this->db->select('*');
    		$this->db->from('topping');
    		$this->db->WHERE('id_region', 1);
    		$this->db->order_by('nama_topping' , 'ASC');

    		$query = $this->db->get();
    		return $query->result();

    	}

    	public function get_sajian($id){
    		$this->db->select('*');
    		$this->db->from('detail_penyajian');
			$this->db->where('id_powder', $id);
			$this->db->where('id_region', 1);
    		$this->db->join('penyajian', 'detail_penyajian.id_penyajian = penyajian.id_penyajian');
    		$this->db->order_by('penyajian.nama_penyajian', 'ASC');

    		$query = $this->db->get();
    		return $query->result();
		}
		
		public function get_ekstra(){
			$this->db->select('*');
			$this->db->from('ekstra');
			$this->db->WHERE('id_region', 1);
			
			$query = $this->db->get();
			return $query->result();
		}

    	public function set_powder_min($id){
    		$sql = $this->db->query("UPDATE powder SET sisa = sisa - 1 WHERE id_powder = '$id'");
    		return $sql;
    	}

    	public function set_powder_plus($id){
    		$sql = $this->db->query("UPDATE powder SET sisa = sisa + 1 WHERE id_powder = '$id'");
    		return $sql;
    	}

    	public function set_topping_min($id){
    		$sql = $this->db->query("UPDATE topping SET penggunaan = penggunaan + 1 WHERE id_topping = '$id'");
    		return $sql;
    	}

    	public function set_topping_plus($id){
    		$sql = $this->db->query("UPDATE topping SET penggunaan = penggunaan - 1 WHERE id_topping = '$id'");
    		return $sql;
    	}

    	public function new_nota($tgl , $wkt , $pembeli, $t_awal, $dis , $t_akhir, $id_staff){
    		$sql = $this->db->query("INSERT INTO jual (no_nota,tanggal,waktu,nama_pembeli,total_awal,diskon,total,id_staff) VALUES ('','$tgl', '$wkt','$pembeli','$t_awal','$dis','$t_akhir','$id_staff')");
    		return $sql;
    	}

    	public function get_new_nota($tgl, $wkt){
    		$sql = $this->db->query("SELECT * FROM jual WHERE tanggal = '$tgl' AND waktu = '$wkt'");
    		if($sql->num_rows() > 0){
    			foreach ($sql->result() as $value) {
    				$hasil = array(
    					'id' => $value->no_nota,
    				);
    			}
    		}

    		return $hasil;
    	}

    	public function add_detail($data_detail, $id_nota, $id_region){

    		for ($i=0; $i < count($data_detail); $i++) { 
    			
    			$data[] = array(
    				'no_nota' => $id_nota,
    				'id_powder' => $data_detail[$i]['id_menu'],
    				'id_penyajian' => $data_detail[$i]['id_sajian'] != '' ? $data_detail[$i]['id_sajian'] : null ,
    				'id_topping' => $data_detail[$i]['id_topping'] != '' ? $data_detail[$i]['id_topping'] : null,
					'jumlah' => $data_detail[$i]['harga'],
					'id_region' => $id_region
    			);

    		}

    		try {

    			for ($i=0; $i < count($data_detail); $i++) { 
    				$this->db->insert('detail_transaksi', $data[$i]);
    			}
    			return 'success';
    			
    		} catch (Exception $e) {
    			return 'failed';
    		}

    	}

    	public function cek_pesanan(){
    		$this->db->select('*');
    		$this->db->from('jual');
    		$this->db->where('status', 'Process');			
			$this->db->order_by('tanggal', 'DESC');
			$this->db->order_by('waktu', 'DESC');

    		$sql = $this->db->get();
    		return $sql->result();
    	}

    	public function update_status($id){
    		$data = array(
    			'status' => 'Success'
    		);

    		$this->db->where('no_nota', $id);
    		$this->db->update('jual', $data);
    	}

    	public function history($id, $tanggal){

    		$this->db->select('*');
    		$this->db->from('detail_transaksi');
    		$this->db->join('powder', 'detail_transaksi.id_powder = powder.id_powder');
    		// $this->db->join('topping', 'detail_transaksi.id_topping = topping.id_topping');
    		// $this->db->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian');
			$this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
			$this->db->where('jual.id_staff', $id);
    		$this->db->where('jual.tanggal', $tanggal);
    		$this->db->order_by('detail_transaksi.no_nota', 'ASC');

    		$sql = $this->db->get();
    		return $sql->result();
		}
		
		public function get_nama_sajian($id){
			if($id == null){
				$idp = 0;

				$hasil = array(
					'nama_penyajian' => '--'
				);
				
			}
			else{
				$idp = $id;
				$hsl = $this->db->query("SELECT * FROM penyajian WHERE id_penyajian = '$idp'");
				if($hsl->num_rows()>0){
					foreach ($hsl->result() as $value) {
						$hasil = array(
							'nama_penyajian' => $value->nama_penyajian
						);
					}
				}
			}
			return $hasil;
		}

		public function get_nama_topping($id){
			if($id == null){
				$idt = 0;

				$hasil = array(
					'nama_topping' => '--'
				);
				
			}
			else{
				$idt = $id;
				$hsl = $this->db->query("SELECT * FROM topping WHERE id_topping = '$idt'");
				if($hsl->num_rows()>0){
					foreach ($hsl->result() as $value) {
						$hasil = array(
							'nama_topping' => $value->nama_topping
						);
					}
				}
			}
			return $hasil;
		}

    	public function detail_nota($id){
    		$this->db->select('*');
    		$this->db->from('jual');
    		// $this->db->join('powder', 'detail_transaksi.id_powder = powder.id_powder');
    		// $this->db->join('topping', 'detail_transaksi.id_topping = topping.id_topping');
    		// $this->db->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian');
    		// $this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
			// $this->db->join('jadwal', 'jual.id_jadwal= jadwal.id_jadwal');
			$this->db->join('staff', 'jual.id_staff = staff.id_staff');
    		$this->db->where('jual.no_nota', $id);

    		$sql = $this->db->get();
    		return $sql;
    	}

    	public function detail_transaksi($id){
    		$this->db->select('*');
    		$this->db->from('detail_transaksi');
    		// $this->db->join('powder', 'detail_transaksi.id_powder = powder.id_powder');
    		// $this->db->join('topping', 'detail_transaksi.id_topping = topping.id_topping');
    		// $this->db->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian');
    		// $this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
    		$this->db->where('detail_transaksi.no_nota', $id);

    		$sql = $this->db->get();
    		return $sql->result();

		}
		
		public function basic($id){
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa - 0.1 WHERE id_ekstra = '$id'");
    		return $sql;
		}

		public function premium($id){
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa - 0.2 WHERE id_ekstra = '$id'");
    		return $sql;
		}

		public function basic_plus($id){
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa + 0.1 WHERE id_ekstra = '$id'");
    		return $sql;
		}

		public function premium_plus($id){
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa + 0.2 WHERE id_ekstra = '$id'");
    		return $sql;
		}

		// ================================================================================

		public function inventory_powder(){

			$id_region = $this->session->userdata('id_region');

			$this->db->select('*');
			$this->db->from('powder');
			$this->db->join('jenis_menu', 'powder.id_jenis =  jenis_menu.id_jenis');
			$this->db->where('powder.id_region', $id_region);
			$this->db->order_by('powder.id_jenis', 'ASC');

			$query = $this->db->get();
			return $query->result();
		}

		public function inventory_topping(){

			$id_region = $this->session->userdata('id_region');

			$this->db->select('*');
			$this->db->from('topping');
			$this->db->where('id_region', $id_region);
			$this->db->order_by('nama_topping', 'ASC');

			$query = $this->db->get();
			return $query->result();
		}

    }
