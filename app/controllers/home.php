<?php

class Home extends Controller
{

	public function __construct()
	{
		parent::__construct();
		if (isset($_SESSION[SESS]['admin'])) {
			$this->s->redirect('admin/');
		}
	}

	public function index()
	{

		$data['new_items'] = $this->db->fetch("SELECT * FROM items ORDER BY id_item DESC LIMIT 4");
		$data['best_items'] = $this->db->fetch("SELECT * FROM items ORDER BY terjual DESC LIMIT 4");
		$data['promo_items'] = $this->db->fetch("SELECT * FROM items ORDER BY diskon DESC LIMIT 4");

		$this->view('sections/head');
		$this->view('sections/jumbotron');
		$this->view('sections/search');
		$this->view('pages/home', $data);
		$this->view('sections/foot');
	}
}
