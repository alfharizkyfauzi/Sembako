<?php

class Member extends Controller {

	public function __construct(){
		parent::__construct();	
		$this->model(array('member_m'));
	}
	
	public function sign_up(){
		
		if(isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');	
		}
		
		if(isset($_POST['submit'])){
			
			$checkEmail = $this->db->count("SELECT * FROM members WHERE email = :em", array(':em' => $_POST['email']));
			
			if(!is_numeric($_POST['telepon'])){
				$this->s->notice('Telepon hanya boleh berisi angka', 'member/sign_up');	}
			elseif(!is_numeric($_POST['kode_pos'])){
				$this->s->notice('Kode Pos boleh berisi angka', 'member/sign_up');	}
			elseif(!is_numeric($_POST['no_rekening'])){
				$this->s->notice('Nomor Rekening hanya boleh berisi angka', 'member/sign_up');	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'member/sign_up');	}
			elseif($this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'member/sign_up');	}
			elseif($this->s->is_email($_POST['email']) == FALSE){
				$this->s->notice('email tidak valid', 'member/sign_up');	}
			elseif($checkEmail != 0){
				$this->s->notice('Email telah terdaftar, cobalah email lain', 'member/sign_up');	}
			else {
				
				$foto = rand().$_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];
				
				move_uploaded_file($tmp, './public/images/members/'.$foto);
				
				$data = array(
					'nama'			=> $_POST['nama'],
					'email'			=> $_POST['email'],
					'password'		=> md5($_POST['password']),
					'telepon'		=> $_POST['telepon'],
					'no_rekening'	=> $_POST['no_rekening'],
					'kode_pos'		=> $_POST['kode_pos'],
					'id_lokasi'		=> $_POST['lokasi'],
					'alamat'		=> $_POST['alamat'],
					'foto'			=> $foto
				);
				
				$this->member_m->insert('members', $data);
				$this->s->notice('Berhasil mendaftar', 'member/login');
			}
		}
		
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		
		$this->view('sections/head');
		$this->view('sections/search');
		$this->view('sections/side');
		$this->view('pages/member.sign_up', $data);
		$this->view('sections/foot');
	}
	
	public function login(){
		
		if(isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');	
		}
		
		if(isset($_POST['submit'])){
			$check = $this->db->count("SELECT * FROM members WHERE email = :em AND password = :pass", 
					 array(':em' => $_POST['email'], ':pass' => md5($_POST['password'])));	
					 
			if($check != 0){
				$get = $this->db->fetch("SELECT * FROM members WHERE email = :em AND password = :pass", 
						 array(':em' => $_POST['email'], ':pass' => md5($_POST['password'])));	
						 
				$_SESSION[SESS]['member'] = $get[0];
				$this->s->notice('Berhasil login', '');
			} else {
				$this->s->notice('Email atau password salah', 'member/login');	
			}
		}
		
		$this->view('sections/head');
		$this->view('sections/search');
		$this->view('sections/side');
		$this->view('pages/member.login');
		$this->view('sections/foot');
	}
	
	public function logout(){
		$this->ses->logout();
		$this->s->notice('Berhasil logout', '');	
	}
	
	public function my_account(){
		
		if(!isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');	
		}
		
		if(isset($_POST['submit'])){
			if(!is_numeric($_POST['telepon'])){
				$this->s->notice('Telepon hanya boleh berisi angka', 'member/my_account');	}
			elseif(!is_numeric($_POST['kode_pos'])){
				$this->s->notice('Kode Pos boleh berisi angka', 'member/my_account');	}
			elseif(!is_numeric($_POST['no_rekening'])){
				$this->s->notice('Nomor Rekening hanya boleh berisi angka', 'member/my_account');	}
			elseif($_POST['lokasi'] == 'all'){
				$this->s->notice('Lokasi belum dipilih', 'member/my_account');	}
			elseif(is_uploaded_file($_FILES['foto']['tmp_name']) && $this->s->is_img('foto') == FALSE){
				$this->s->notice('Format foto tidak valid', 'member/my_account');	}
			elseif($this->s->is_email($_POST['email']) == FALSE){
				$this->s->notice('email tidak valid', 'member/my_account');	}
			else {
				
				if(!empty($_POST['password'])){
					$password = md5($_POST['password']);	
				} else {
					$password = $_POST['old_password'];
				}
				
				if(is_uploaded_file($_FILES['foto']['tmp_name'])){
				
					$foto = rand().$_FILES['foto']['name'];
					$tmp = $_FILES['foto']['tmp_name'];
					
					move_uploaded_file($tmp, './public/images/members/'.$foto);
					
					$data = "
						nama		= '".$_POST['nama']."',
						email		= '".$_POST['email']."',
						password	= '".$password."',
						telepon		= '".$_POST['telepon']."',
						no_rekening	= '".$_POST['no_rekening']."',
						kode_pos	= '".$_POST['kode_pos']."',
						id_lokasi	= '".$_POST['lokasi']."',
						alamat		= '".$_POST['alamat']."',
						foto		= '".$foto."'
					";
				} else {
					
					$data = "
						nama		= '".$_POST['nama']."',
						email		= '".$_POST['email']."',
						password	= '".$password."',
						telepon		= '".$_POST['telepon']."',
						no_rekening	= '".$_POST['no_rekening']."',
						kode_pos	= '".$_POST['kode_pos']."',
						id_lokasi	= '".$_POST['lokasi']."',
						alamat		= '".$_POST['alamat']."'
					";
				}
				
				$this->member_m->my_account($data, $_POST['id_member']);
				$this->s->notice('Berhasil memperbarui account', 'member/my_account');
			}
		}
		
		$id = $_SESSION[SESS]['member']['id_member'];
		
		$data['lokasi'] = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC");
		$data['data'] = $this->db->fetch("SELECT * FROM members WHERE id_member = :idm", array(':idm' => $id));
		
		$this->view('sections/head');
		$this->view('sections/search');
		$this->view('sections/side');
		$this->view('pages/member.my_account', $data);
		$this->view('sections/foot');
	}
	
	public function testimoni(){
		
		if(!isset($_SESSION[SESS]['member'])){
			$this->s->redirect('');	
		}
		
		$id = $_SESSION[SESS]['member']['id_member'];
		
		if(isset($_POST['submit'])){
			if($this->s->is_text($_POST['testimoni']) == FALSE){
				$this->s->notice('Testimoni hanya boleh berisi huruf', 'member/testimoni');	}
			else {
				$data = array(
					'id_member'	=> $id,
					'testimoni'	=> $_POST['testimoni']
				);	
				$this->member_m->insert('testimoni', $data);
				$this->s->notice('Terima kasih telah mengirimkan kami testimoni', 'member/testimoni');
			}
		}
		
		$data['total'] = $this->db->count("SELECT * FROM testimoni WHERE id_member = :idm", array(':idm' => $id));
		if($data['total'] != 0){
			$data['data'] = $this->db->fetch("SELECT * FROM testimoni WHERE id_member = :idm", array(':idm' => $id));
		}
		
		$this->view('sections/head');
		$this->view('sections/search');
		$this->view('sections/side');
		$this->view('pages/member.testimoni', $data);
		$this->view('sections/foot');
	}
	
}