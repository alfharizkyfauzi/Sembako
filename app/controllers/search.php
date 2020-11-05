<?php

class Search extends Controller {
	
	public function index($id = ''){
		$this->p->setup(12);
		$offset = $this->p->offset;
		$limit = $this->p->limit;
		
		if(!isset($_GET['q'])){
			die('404 PAGE NOT FOUND');
		}
		
		if($_GET['harga'] == 1){
			$harga = "harga < 1000000";	}
		elseif($_GET['harga'] == 2){
			$harga = "harga > 1000000 AND harga < 10000000";	}
		elseif($_GET['harga'] == 3){
			$harga = "harga > 10000000";	}
		
		if(!empty($_GET['q'])){
			if($_GET['kat'] != 'all' && $_GET['lok'] != 'all' && $_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk AND id_lokasi = :idl AND $harga LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk AND id_lokasi = :idl AND $harga", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['kat'] != 'all' && $_GET['lok'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk AND id_lokasi = :idl LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk AND id_lokasi = :idl", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['kat'] != 'all' && $_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk AND $harga LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk AND $harga", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat']
				));	
			}
			elseif($_GET['lok'] != 'all' && $_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_lokasi = :idl AND $harga LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_lokasi = :idl AND $harga", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['kat'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_kategori = :idk", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idk'	=> $_GET['kat']
				));	
			}
			elseif($_GET['lok'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_lokasi = :idl LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND id_lokasi = :idl", 
				array(
					':q'	=> '%'.$_GET['q'].'%',
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND $harga LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q AND $harga", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
			}
			else {
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
			}
		}
		
		//////
		/////
		//////
		
		
		else {
			if($_GET['kat'] != 'all' && $_GET['lok'] != 'all' && $_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				id_kategori = :idk AND id_lokasi = :idl AND $harga LIMIT $offset, $limit", 
				array(
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				id_kategori = :idk AND id_lokasi = :idl AND $harga", 
				array(
					
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['kat'] != 'all' && $_GET['lok'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				id_kategori = :idk AND id_lokasi = :idl LIMIT $offset, $limit", 
				array(
					
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				id_kategori = :idk AND id_lokasi = :idl", 
				array(
					
					':idk'	=> $_GET['kat'],
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['kat'] != 'all' && $_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				id_kategori = :idk AND $harga LIMIT $offset, $limit", 
				array(
					
					':idk'	=> $_GET['kat']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				id_kategori = :idk AND $harga", 
				array(
					
					':idk'	=> $_GET['kat']
				));	
			}
			elseif($_GET['lok'] != 'all' && $_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				id_lokasi = :idl AND $harga LIMIT $offset, $limit", 
				array(
					
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				id_lokasi = :idl AND $harga", 
				array(
					
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['kat'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				id_kategori = :idk LIMIT $offset, $limit", 
				array(
					
					':idk'	=> $_GET['kat']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				id_kategori = :idk", 
				array(
					
					':idk'	=> $_GET['kat']
				));	
			}
			elseif($_GET['lok'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				id_lokasi = :idl LIMIT $offset, $limit", 
				array(
					
					':idl'	=> $_GET['lok']
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				id_lokasi = :idl", 
				array(
					
					':idl'	=> $_GET['lok']
				));	
			}
			elseif($_GET['harga'] != 'all'){
				$fetch = $this->db->fetch("SELECT * FROM items WHERE $harga LIMIT $offset, $limit");	
				$total = $this->db->count("SELECT * FROM items WHERE $harga");	
			}
			else {
				$fetch = $this->db->fetch("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q LIMIT $offset, $limit", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
				$total = $this->db->count("SELECT * FROM items WHERE
				nama_item LIKE :q OR merk LIKE :q", 
				array(
					':q'	=> '%'.$_GET['q'].'%'
				));	
			}
		}
		
		$data['data'] = $fetch;
		$data['total'] = $total;
		$data['offset'] = $offset;
		$data['pagination'] = $this->p->create_links($data['total']);
		
		
		$this->view('sections/head');	
		$this->view('sections/search');	
		$this->view('pages/search', $data);	
		$this->view('sections/foot');	
	}
	
}