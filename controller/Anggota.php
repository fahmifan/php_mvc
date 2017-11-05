<?php
class Anggota 
{
	protected $model = null;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function index() 
	{
		$anggota = $this->model->getAllAnggota();
		require_once 'view/anggota/list.php';
	}
	
	public function detail($id)
	{
		$anggota = $this->model->getAnggotaById($id);
		require_once 'view/anggota/detail.php';
	}

	public function create()
	{
		if($_POST) {

			$this->model->insert();
			header('Location: http://localhost/php_mvc_tuts/index.php/anggota');
		
		} else {
			require_once 'view/anggota/form.php';
		}
	}

	public function edit($id)
	{
		if($_POST) {
			
			$this->model->update($id);
			header('Location: http://localhost/php_mvc_tuts/index.php/anggota');

		} else {
			
			$anggota = $this->model->getAnggotaById($id);
			require_once 'view/anggota/form.php';
		}
	}

	public function delete($id)
	{
		$this->model->delete($_GET['id']);
		header('Location: http://localhost/php_mvc_tuts/index.php/anggota');
	}
}
