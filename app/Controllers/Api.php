<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;

class Api extends BaseController
{

	use ResponseTrait;
	function index()
	{
		// $model = new UsersModel();
		// $data = $model->findAll();
		// return $this->respond($data);
		return $this->failForbidden('Sorry');
	}

	function validation(){
		$model = new UsersModel();
		$data = $model->getWhere(['user_username' => $this->request->getPost('username')])->getResult();
		if($data){
			if($data[0]->user_password == $this->request->getPost('password')){
				return $this->respond(['redirect']);
			} else {
				return $this->failValidationError('Password invalid!');
			}
		} else {
			return $this->failNotFound('Data not found with username like '. $this->request->getPost('username'));
		}
	}
	
}
