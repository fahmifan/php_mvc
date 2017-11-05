<?php

$request = preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']);
$uri = explode('/', $request);

// Set form action
if($uri[1] === 'edit') {

	$judul = 'Edit Anggota';
	$form_action = "http://localhost/php_mvc_tuts/index.php/anggota/edit?=" . $_GET['id'];

} else {
	$judul = 'Tambah Anggota';
	$form_action = "http://localhost/php_mvc_tuts/index.php/anggota/create";
}

// Set form value
$valNama = isset($anggota['nama']) ? $anggota['nama'] : '';
$valTglLahir = isset($anggota['tgl_lahir']) ? $anggota['tgl_lahir'] : '';
$valKotaLahir = isset($anggota['kota_lahir']) ? $anggota['kota_lahir'] : '';

?>

<?php ob_start() ?>

	<h1><?= $judul ?></h1>

	<form action="<?= $form_action ?>" method="post">
		<div class="form-group">
			<label for="nama">Nama</label><br>
			<input type="text" name="nama" class="form-control" value="<?= $valNama?>"><br>
		</div>
		<div class="form-group">
			<label for="tgl_lahir">Tgl Lahir</label><br>
			<input type="text" name="tgl_lahir" class="form-control" placeholder="yyyy-mm-dd" value="<?= $valTglLahir?>"><br>
		</div>
		<div class="form-group">	
			<label for="kota_lahir">Kota Lahir</label><br>
			<input type="text" name="kota_lahir" class="form-control" value="<?= $valKotaLahir?>"><br>
		</div>
		<button class="btn btn-primary" type="submit">Submit</button>
	</form>

<?php $isi = ob_get_clean() ?>
<?php require_once 'view/template.php'; ?>