<?php

class Account_model extends Model {

	function __construct() {
		parent::__construct();
	}

	function check_login() {
		require("config.php");
		$this->load->database();
		$sql = $this->db->query("SELECT `id`, page_access FROM `accounts` WHERE `name` = '".$_POST['name']."' AND `password` = sha1('".$_POST['pass']."')");
		$row = $sql->row_array();
			if(!empty($row)) {
			$_SESSION['account_id'] = $row['id'];
			$_SESSION['access'] = $row['page_access'];
				if($row['page_access'] >= $config['adminAccess'])
					$_SESSION['admin'] = 1;
				else
					$_SESSION['admin'] = 0;
			}
		if($sql->num_rows == 0) return false; else return true;
	}
	
	function getRecoveryKey($name) {
		$this->load->database();
		$sql = $this->db->query("SELECT `key` FROM `accounts` WHERE `name` = '$name'")->row_array();
		return $sql['key'];
	}
	
	function generateKey($name) {
		$this->load->database();
		$key = rand(1000,9999).'-'.rand(1000,9999).'-'.rand(1000,9999).'-'.rand(1000,9999);
		$this->db->query("UPDATE `accounts` SET `key` = '$key' WHERE `name` = \"$name\"");
		return $key;
	}
	
	public function getAccountID() {
		$this->load->database();
		$sql = $this->db->query("SELECT `id` FROM `accounts` WHERE `name` = \"".$_SESSION['name']."\"")->row_array();
		return (int)$sql['id'];
	}
	
	public function getCharacters() {
		$this->load->database();
		 return $this->db->query("SELECT `id`, `name`, `level` FROM `players` WHERE `account_id` = '".$_SESSION['account_id']."' AND `deleted` = 0")->result();
	}
	
	public function checkPassword($pass) {
		$this->load->database();
		return ($this->db->query("SELECT `id` FROM `accounts` WHERE `name` = '".$_SESSION['name']."' AND `password` = sha1('".$pass."')")->num_rows == 0) ? false : true; 
	}
	
	public function changePassword($pass, $name) {
		$this->load->database();
		$this->db->query("UPDATE `accounts` SET `password` = sha1('".$pass."') WHERE `name` = \"".$name."\"");
	}
	
	public function isUserPlayer($id) {
		$this->load->database();
		return ($this->db->query("SELECT `id` FROM `players` WHERE `account_id` = '".$_SESSION['account_id']."' AND `name` = \"".$id."\"")->num_rows == 0) ? false: true;
	}
	
	public function getPlayerComment($id) {
		$this->load->database();
		return $this->db->query("SELECT `comment` FROM `players` WHERE `name` = \"".$id."\"")->result_array();
	}
	
	public function changeComment($id, $comment) {
		$this->load->database();
		$this->db->query("UPDATE `players` SET `comment` = '".$comment."' WHERE `name` = \"".$id."\"");
	}
	
	public function deletePlayer($id) {
		$this->load->database();
		$this->db->query("UPDATE `players` SET `deleted` = '1' WHERE `name` = \"".$id."\"");
	}
}

?>