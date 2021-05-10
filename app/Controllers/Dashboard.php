<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	
	protected $session;

	function __construct() {
		$this->session = session();
	}

	function index() {
		var_dump($this->session->get());
	}

	function out(){
		$this->session->destroy();
		return redirect()->to('/auth');
	}

}
