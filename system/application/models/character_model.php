<?php

class Character_model extends Model {
	public function getAccountID() {
		$this->load->database();
		$sql = $this->db->query("SELECT `id` FROM `accounts` WHERE `name` = '".$_SESSION['name']."'")->row_array();
		return (int)$sql['id'];
	}
	
	public function getPlayersOnline() {
		$this->load->database();
		@$world = (int)$_REQUEST['world'];
		@$order = $_REQUEST['sort'];
		$allowed = array('level', 'vocation', 'name');
		if(!empty($world))
			$w = "AND `world_id` = '$world'";
		else
			$w = "";	
		if(!empty($order)) {
			if(in_array($order, $allowed))
				$o = "ORDER BY `$order` DESC";
			else
				$o = "ORDER BY `level` DESC";
		}
		else
			$o = "";
		return $this->db->query("SELECT `name`, `level`, `world_id`, `vocation`, `promotion` FROM `players` WHERE `online` = '1' $w $o")->result_array();
	}
	
	
	
}

?>