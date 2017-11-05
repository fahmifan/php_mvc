<?php

class AnggotaModel extends Database
{
	protected $db;

	public function __construct($db = null)
	{
		$this->db = $db;
	}

	public function getAllAnggota()
	{
		$this->db->openConn();
		// $anggota[] = null;
		$query = "SELECT* FROM anggota";
		$result = $this->db->link->query($query);

		if($result->rowCount() > 0 ) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) :
				$anggota[] = $row;
			endwhile;	

			$this->db->closeConn();
		} else {
			$anggota[] = null;
		}
		return $anggota;
	}

	public function getAnggotaById($id)
	{
		$this->db->openConn();

		$query = "SELECT * FROM anggota WHERE id = $id";

		$statement = $this->db->link->prepare($query);
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $row;
	}

	public function insert()
	{
		$this->db->openConn();

		$query = "INSERT INTO anggota(nama, tgl_lahir, kota_lahir) VALUES (
					:nama, :tgl_lahir, :kota_lahir)";
		
		$statement = $this->db->link->prepare($query);

		$statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
		$statement->bindValue(':tgl_lahir', $_POST['tgl_lahir'], PDO::PARAM_STR);
		$statement->bindValue(':kota_lahir', $_POST['kota_lahir'], PDO::PARAM_STR);

		$statement->execute();

		$this->db->closeConn();
	}

	public function update()
	{
		$this->db->openConn();

		$query = "UPDATE anggota SET nama = :nama, tgl_lahir = :tgl_lahir, kota_lahir = :kota_lahir";
		
		$statement = $this->db->link->prepare($query);

		$statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
		$statement->bindValue(':tgl_lahir', $_POST['tgl_lahir'], PDO::PARAM_STR);
		$statement->bindValue(':kota_lahir', $_POST['kota_lahir'], PDO::PARAM_STR);

		$statement->execute();

		$this->db->closeConn();
	}

	public function delete($id)
	{
		$this->db->openConn();
		$query = "DELETE FROM anggota WHERE id = :id";

		$statement = $this->db->link->prepare($query);

		$statement->bindValue(':id', $id, PDO::PARAM_STR);

		$statement->execute();
	}
}

?>