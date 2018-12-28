<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {


	//HOME INDEX

	public function index(){
		$this->load->model('members');

		$file = $_FILES;

		if(!empty($file)){

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'csv';
            $config['max_size']             = 100;

            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('csv')){
            	$data['error'] = $this->upload->display_errors();	
            }else{
            	$newfile = $this->upload->data();
           
				$handle = fopen($config['upload_path'].$newfile['file_name'], "r");
				$i = 1; $data['ok'] = ""; $data['error'] = "";
				while (($dt = fgetcsv($handle, 1000, ",")) !== FALSE) {
					// proses simpan ke db
					$in['fullname'] = $dt[0];
					$in['email'] = $dt[1];
					$in['address'] = $dt[2];
					$in['idcompany'] = $dt[3];
                    $in['idcity'] = $dt[4];

					$add = $this->members->add($in);
					if($add['sts']){
						$data['ok'] .= "Baris ke ".$i.": ".$add['msg']."<br />"; 
					}else{
						$data['error'] .= "Baris ke ".$i.": ".$add['msg']."<br />";
					}
					$i++;	
				}
				fclose($handle);
            }
        }

		$data['view'] = 'table';
		$data['title'] = 'Data Members';
		$data['members'] = $this->members->get_all()->result_array();

		$this->load->view('home', $data);
	}

	public function add(){
		$this->load->model('members');
		
		$data['view'] = 'add';		
		$data['title'] = 'Add Member';
		$data['members'] = null;
		$data['company'] = $this->members->getDataCompany()->result_array();
		$data['city'] = $this->members->getDataCity()->result_array();

		if($this->input->post()){
			$add = $this->members->add($this->input->post());
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$this->load->view('home', $data);
	}

	public function detail($id){
		$this->load->model('members');

		$data['view'] = 'detail';		
		$data['members'] = $this->members->get($id);
		$data['title'] = $data['members']['fullname'];

		$this->load->view('home', $data);
	}

	public function del($id){
		$this->load->model('members');
		
		$data['view'] = 'delete';		
		$data['title'] = 'Hapus Member';
		$data['members'] = $this->members->get($id);
		$data['company'] = $this->members->getDataCompany()->result_array();
		$data['city'] = $this->members->getDataCity()->result_array();

		if($this->input->post()){
			$add = $this->members->del($id);
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$this->load->view('home', $data);
	}

	public function edit($id){
		$this->load->model('members');

		$data['view'] = 'edit';		
		$data['title'] = 'Edit Member';
		$data['company'] = $this->members->getDataCompany()->result_array();
		$data['city'] = $this->members->getDataCity()->result_array();

		if($this->input->post()){

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('foto')){
            	$data['error'] = $this->upload->display_errors();	
            }else{
            	$newfile = $this->upload->data();
            	$post = $this->input->post();
            	$post['foto'] = $newfile['file_name'];

            	$add = $this->members->update($id, $post);
				if($add['sts']){
					$data['ok'] = $add['msg']; 
				}else{
					$data['error'] = $add['msg'];
				}	
            }	
			
		}

		$data['members'] = $this->members->get($id);

		$this->load->view('home', $data);
	}

	//COMPANY

	public function addcompany(){
		$this->load->model('members');

		$data['view'] = 'company/addcompany';		
		$data['title'] = 'Tambah Company';
		$data['company'] = $this->members->getDataCompany()->result_array();

		
		if($this->input->post()){
			$add = $this->members->addcompany($this->input->post());
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$this->load->view('home', $data);
	}

	public function editcompany($id){
		$this->load->model('members');

		$data['view'] = 'company/editcompany';		
		$data['title'] = 'Edit Company';
		$data['company'] = $this->members->getcompany($id);

		$post = $this->input->post();

		if($this->input->post()){
			$add = $this->members->updatecompany($id, $post);
				if($add['sts']){
					$data['ok'] = $add['msg']; 
				}else{
					$data['error'] = $add['msg'];
				}
			}

		$this->load->view('home', $data);
	}

	public function deletecompany($id){
		$this->load->model('members');
		
		$data['view'] = 'company/delete';		
		$data['title'] = 'Hapus Company';
		$data['company'] = $this->members->getcompany($id);

		if($this->input->post()){
			$add = $this->members->deletecompany($id);
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$this->load->view('home', $data);
	}


	//CITY CRUD

	public function addcity(){
		$this->load->model('members');

		$data['view'] = 'city/addcity';		
		$data['title'] = 'Tambah City';
		$data['city'] = $this->members->getDataCity()->result_array();

		
		if($this->input->post()){
			$add = $this->members->addcity($this->input->post());
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$this->load->view('home', $data);
	}

	public function editcity($id){
		$this->load->model('members');

		$data['view'] = 'city/editcity';		
		$data['title'] = 'Edit Company';
		$data['city'] = $this->members->getcity($id);

		$post = $this->input->post();

		if($this->input->post()){
			$add = $this->members->updatecity($id, $post);
				if($add['sts']){
					$data['ok'] = $add['msg']; 
				}else{
					$data['error'] = $add['msg'];
				}
			}

		$this->load->view('home', $data);
	}

	public function deletecity($id){
		$this->load->model('members');
		
		$data['view'] = 'city/deletecity';		
		$data['title'] = 'Hapus Company';
		$data['city'] = $this->members->getcity($id);

		if($this->input->post()){
			$add = $this->members->deletecity($id);
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$this->load->view('home', $data);
	}

}