<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Members extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function get_all(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('company','company.idcompany = members.idcompany', 'left');
		$this->db->join('city','city.idcity = members.idcity', 'left');

		return $this->db->get();
    }

    public function get($id){
    	$this->db->select('*');
		$this->db->from('members');
		$this->db->join('company','company.idcompany = members.idcompany', 'left');
		$this->db->join('city','city.idcity = members.idcity', 'left');

    	return $this->db->where('id', $id)->get()->row_array();
    }

    public function add($post){
	if($this->db->insert('members', $post)){
        	$msg = "Input data berhasil";
        	return array('msg'=>$msg, 'sts'=>true);
        }else{
        	$msg = $this->db->error();
        	return array('msg'=>$msg, 'sts'=>false);
        }

        $file = $_FILES;
        $filename = $_FILES['foto']['name'];
        $newfilename = uniqid();

        if(!empty($file)){
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2000;
            $config['file_name']            = $newfilename;
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('foto')){
                $data['error'] = $this->upload->display_errors();   
            }else{
                $newfile = $this->upload->data();
                $handle = fopen($config['upload_path'].$newfile['file_name'], "r");
                fclose($handle);
            }
            $foto = $config['upload_path'].$config['file_name'].$config['allowed_types'];

        
            $data = [
                "fullname" => $this->input->post('fullname'),
                "email" => $this->input->post('email'),
                "address" => $this->input->post('address'),
                "foto" => $filename,
                "idcompany" => $this->input->post('idcompany'),
                "idcity" => $this->input->post('idcity')
            ];
            
            $this->db->insert('members', $data);

        }
    }

    public function del($id){
    	$this->db->select('*');
		$this->db->from('members');
		$this->db->join('company','company.idcompany = members.idcompany', 'left');
		$this->db->join('city','city.idcity = members.idcity', 'left');

        $this->db->where('id', $id);
        if($this->db->delete('members')){
            $msg = "Delete data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }
    }

    public function update($id, $post){
    	/*$this->db->select('members');*/
		$this->db->join('company','company.idcompany = members.idcompany', 'left');
		$this->db->join('city','city.idcity = members.idcity', 'left');

        $this->db->where('id', $id);
        if($this->db->update('members', $post)){
            $msg = "Edit data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }   
    }

    //COMPANY

    public function getDataCompany()    {
    	return $this->db->get('company');
    }

    public function getcompany($id){
    	return $this->db->where('idcompany', $id)->get('company')->row_array();
    }

    public function addcompany($post)    {
		if($this->db->insert('company', $post)){
        	$msg = "Input data berhasil";
        	return array('msg'=>$msg, 'sts'=>true);
        }else{
        	$msg = $this->db->error();
        	return array('msg'=>$msg, 'sts'=>false);
        }	
    }

    public function updatecompany($id, $post){
		$this->db->where('idcompany', $id);
        if($this->db->update('company', $post)){
            $msg = "Edit data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }   
    }

    public function deletecompany($id){
	$this->db->where('idcompany', $id);
        if($this->db->delete('company')){
            $msg = "Delete data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }
    }

    //City
    public function getDataCity()    {
    	return $this->db->get('city');
    }

    public function getcity($id){
    	return $this->db->where('idcity', $id)->get('city')->row_array();
    }

    public function updatecity($id, $post){
		$this->db->where('idcity', $id);
        if($this->db->update('city', $post)){
            $msg = "Edit data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }   
    }


    public function addcity($post)    {
		if($this->db->insert('city', $post)){
        	$msg = "Input data berhasil";
        	return array('msg'=>$msg, 'sts'=>true);
        }else{
        	$msg = $this->db->error();
        	return array('msg'=>$msg, 'sts'=>false);
        }	
    }

    public function deletecity($id){
	$this->db->where('idcity', $id);
        if($this->db->delete('city')){
            $msg = "Delete data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }
    }
}
