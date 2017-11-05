<?php $judul = 'Daftar Anggota' ?>

<?php ob_start() ?>

<h1>Daftar Anggota</h1>
<table class="table">
	<tr>
		<th>ID</th>
		<th>Nama</th>
		<th>Tanggal Lahir</th>
		<th>Kota Lahir</th>
		<th>Detail</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach($anggota as $row) :?>
	<tr>
		<td><?= $row['id'] ?></td>
		<td><?= $row['nama'] ?></td>
		<td><?= $row['tgl_lahir'] ?></td>
		<td><?= $row['kota_lahir'] ?></td>
		
		<td><a href="http://localhost/php_mvc_tuts/index.php/anggota/detail?id=<?= $row['id']; ?>"> <button class="btn btn-success btn-xs">Detail</button> </a></td>
		<td><a href="http://localhost/php_mvc_tuts/index.php/anggota/edit?id=<?= $row['id']; ?>"> <button class="btn btn-warning btn-xs">Edit</button> </a></td>
		<td><a href="http://localhost/php_mvc_tuts/index.php/anggota/delete?id=<?= $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn btn-danger btn-xs">Delete</a></td>
	</tr>
	<?php endforeach;?>
</table>
	<a href="http://localhost/php_mvc_tuts/index.php/anggota/create"><button class="btn btn-primary btn-md">Create</button></a>
<?php $isi = ob_get_clean()?>

<?php require_once 'view/template.php'; ?>