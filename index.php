<?php

/**
 * Halaman index ini adalah layaknya main pada bahasa perog. yg lain.
 * Halaman ini adalah gateway bagi User untuk bisa melakukan request ke Controller.
 * atau disebut front-controller.
 * index.php ini jg bisa disebut dengan file Router, yg berfungsi mengarahkan user ke Controller
 * dan method yang benar.
 */

$request = preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']);
$uri = explode('/', $request);

// Cek apakah controller dan method ada pada segment URI.
// Untuk mengarahkan ke controller dan method yg benar.
$uri0 = isset( $uri[0] );
$uri1 = isset( $uri[1] );
$id = isset( $_GET['id'] );

// memanggil semua resource yang diperlukan
require_once 'lib/Database.php';
require_once 'controller/Anggota.php';
require_once 'model/AnggotaModel.php';

$db = new Database();
$model = new AnggotaModel($db);
$controller = new Anggota($model);

//Routing dan menjalankan method yg sesuai dgn URL
// Pada frameworj MVC routing biasanya dilakukan oleh Library tersendiri biasanya "Router"

if($uri0 && $uri1 && $uri[0] === 'anggota' &&$uri[1] === 'detail') {

	$id = $_GET['id'];
	$controller->detail($id);

} elseif($uri0 && $uri1 && $uri[0] === 'anggota' &&$uri[1] === 'edit') {

	$id = $_GET['id'];
	$controller->edit($id);

} elseif($uri0 && $uri1 && $uri[0] === 'anggota' &&$uri[1] === 'delete') {

	$id = $_GET['id'];
	$controller->delete($id);

} elseif($uri0 && $uri1 && $uri[0] === 'anggota' &&$uri[1] === 'create') {

	$controller->create();

} elseif($uri[0] === 'anggota') {

	$controller->index();

} else {
	header('HTTP/1.1 404 Not Found');
	echo '<html><body>
			<h1>Page Not Found</h1></body></html>';
}

?>