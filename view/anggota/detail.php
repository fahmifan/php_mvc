<?php $judul = $anggota['nama']; ?>

<?php ob_start() ?>
	<h1><?= $anggota['nama']?></h1>
	<table class="table">
		<tr>
			<td>Nama </td>
			<td><?= $anggota['nama'] ?></td>
		</tr>
		<tr>
			<td>Tgl Lahir </td>
			<td><?= $anggota['tgl_lahir']?></td>
		</tr>
		<tr>
			<td>Kota Lahir</td>
			<td><?= $anggota['kota_lahir'] ?></td>
		</tr>
	</table>
	<a href="http://localhost/php_mvc_tuts/index.php/anggota"><button class="btn btn-success btn-md">Back</button></a>
<?php $isi = ob_get_clean() ?>
<?php require_once 'view/template.php' ?>