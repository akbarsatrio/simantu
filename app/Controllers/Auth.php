<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;

class Auth extends BaseController
{

	use ResponseTrait;
	protected $session;
	function __construct() {
		$this->session = session();
	}

	function index() {
		return view('pages/login');
	}

	function validation() {
		$model = new UsersModel();
		$data = $model->getWhere(['user_username' => $this->request->getPost('username')])->getResult();
		if($data){
			if($data[0]->user_password == $this->request->getPost('password')){
				$newdata = [
					'username'  => $this->request->getPost('username'),
					'is_logged' => TRUE
				];
				$this->session->set($newdata);
				return $this->respond(['redirect' => 'dashboard', 'is_logged' => $this->session->get('is_logged')], 200);
			} else {
				return $this->failValidationError('Password invalid!');
			}
		} else {
			return $this->failNotFound('Data not found with username like '. $this->request->getPost('username'));
		}
	}

}
