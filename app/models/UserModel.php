<?php

/**
 * Class Description
 * Menerapkan kelas User berdasarkan class diagram
 * 
 * @author Rizkyta Shainy A.
 */

class UserModel {
	
	/**
	 * @table String
	 * @db adalah object
	 */
	private $table = 'user';
	private $db;

	/**
	 * Constructor
	 * Membuat object dari class Database baru 
	 */
	public function __construct()
	{
		$this->db = new Database;
	}

	/**
	 * Mendapatkan array berisi data user yang ada di database
	 * @return $this->db->resultSet() berisi data semua user, may be null
	 */
	public function getAllUser()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	/**
	 * Mendapatkan data user berdasarkan id dari database
	 * @param id user yang dicari
	 * @return array berisi data user, may be null
	 */
	public function getUserById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	/**
	 * Menambahkan data input ke table user di database
	 * @param data input
	 * @return $this->db->rowCount() yaitu jumlah data setelah dilakukan INSERT, not null
	 */
	public function tambahUser($data)
	{
		$query = "INSERT INTO user (nama,username,password) VALUES(:nama,:username,:password)";
		$this->db->query($query);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('username',$data['username']);
		$this->db->bind('password', md5($data['password']));
		$this->db->execute();

		return $this->db->rowCount();
	}

	/**
	 * Mencari username
	 * @param username
	 * @return $this->db->single() data user yang usernamenya sesuai, may be null
	 */
	public function cekUsername($username){
		$username = $_POST['username'];
		$this->db->query("SELECT * FROM user WHERE username = :username");
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	/**
	 * Memperbarui data user pada database berdasarkan input
	 * @param data yang diinput
	 * @return $this->db->rowCount() yaitu jumlah data setelah dilakukan UPDATE, not null
	 */
	public function updateDataUser($data)
	{
		if(empty($_POST['password'])) {
			$query = "UPDATE user SET nama=:nama WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id',$data['id']);
			$this->db->bind('nama',$data['nama']);
		} else {
			$query = "UPDATE user SET nama=:nama, password=:password WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('password',md5($data['password']));
		}
		
		$this->db->execute();

		return $this->db->rowCount();
	}

	/**
	 * Menghapus user dengan id tertentu dari database
	 * @param id user
	 * @return $this->db->rowCount() yaitu jumlah data setelah dilakukan DELETE, not null
	 */
	public function deleteUser($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	/**
	 * Mencari user 
	 * @return  $this->db->resultSet() data yang memiliki key sesuai, may be null
	 */
	public function cariUser()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	/**
	 * 
	 */
	public function getLogin(){
		if(isset($_REQUEST('nama')) && isset ($_REQUEST('password'))){
			
		}
	}
}