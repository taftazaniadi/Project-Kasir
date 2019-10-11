<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_auth extends CI_Model{

    public function get($id = null)
	{
        $this->db->select('*');
        $this->db->from('staff');
        if($id != null){
            $this->db->where('id_staff', $id);
        }
		$query = $this->db->get();
		return $query;
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['pass']);

        $query = $this->db->get();
        return $query;
    }

    }

?>