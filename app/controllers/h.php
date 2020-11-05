<?php

class H extends Controller {

	public function __construct(){
		parent::__construct();	
	}
	
	public function index($page = ''){
		
		$data['data'] = $this->db->fetch("SELECT * FROM menu WHERE judul_menu = :jud", array(':jud' => $page));
		$total = $this->db->count("SELECT * FROM menu WHERE judul_menu = :jud", array(':jud' => $page));
		
		if($total == 0){
			die('404 PAGE NOT FOUND');	
		}
		
		$this->view('sections/head');	
		$this->view('sections/search');	
		$this->view('sections/side');	
		$this->view('pages/h', $data);	
		$this->view('sections/foot');	
	}
	
	public function sitemap(){
		$this->view('sections/head');	
		$this->view('sections/search');	
		$this->view('sections/side');	
		$this->view('pages/h.sitemap');	
		$this->view('sections/foot');	
	}
	
}