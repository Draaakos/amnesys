<?php 

	class House_model extends Model {
		
		public function getHouses() {
			require("config.php");
			$this->load->database();
				if(isset($_REQUEST['world']))
					$_SESSION['houses']['world'] = (int)$_REQUEST['world'];
				if(isset($_REQUEST['town']))
					$_SESSION['houses']['town'] = (int)$_REQUEST['town'];
				if(isset($_REQUEST['free']))
					$_SESSION['houses']['free'] = $_REQUEST['free'];
				if(isset($_REQUEST['guild']))
					$_SESSION['houses']['guild'] = $_REQUEST['guild'];
				if($_POST && empty($_REQUEST['free']))
					@$_SESSION['houses']['free'] = "";
				if($_POST && empty($_REQUEST['guild']))
					@$_SESSION['houses']['guild'] = "";
					
			$keys = array_keys($config['cities']);
			$world = @$_SESSION['houses']['world'];
			$town = @$_SESSION['houses']['town'];
			$free = @$_SESSION['houses']['free'];
			$guild = @$_SESSION['houses']['guild'];
				$w = (!empty($world)) ? "AND `world_id` = ".$world : "";
				$c = (!empty($town))  ? "WHERE `town` = ".$town : "WHERE `town` = '".$keys[0]."'";
				$f = (!empty($free)) ? "AND `owner` = 0" : "";
				$g = (!empty($guild)) ? "AND `guild` = 1" : "AND `guild` = 0";
			
			$this->load->helper("url");
			$page = $this->uri->segment(3);
			$page = (empty($page)) ? 0 : $page;		
			return $this->db->query("SELECT `id`, `world_id`, `owner`, `paid`, `warnings`, `lastwarning`, `name`, `size`, `price`, `rent`, `doors`, `beds`, `tiles`, `guild`, `clear`, `town` FROM `houses` $c $w $f $g LIMIT ".$page.", ".$config['postsLimit'])->result_array();
			
		}
		
		public function getHousesAmount() {
			require("config.php");
			$this->load->database();
			$keys = array_keys($config['cities']);
			if(isset($_REQUEST['world']))
					$_SESSION['houses']['world'] = (int)$_REQUEST['world'];
				if(isset($_REQUEST['town']))
					$_SESSION['houses']['town'] = (int)$_REQUEST['town'];
				if(isset($_REQUEST['free']))
					$_SESSION['houses']['free'] = $_REQUEST['free'];
				if(isset($_REQUEST['guild']))
					$_SESSION['houses']['guild'] = $_REQUEST['guild'];
				if($_POST && empty($_REQUEST['free']))
					@$_SESSION['houses']['free'] = "";
				if($_POST && empty($_REQUEST['guild']))
					@$_SESSION['houses']['guild'] = "";
			$keys = array_keys($config['cities']);
			$world = @$_SESSION['houses']['world'];
			$town = @$_SESSION['houses']['town'];
			$free = @$_SESSION['houses']['free'];
			$guild = @$_SESSION['houses']['guild'];
				$w = (!empty($world)) ? "AND `world_id` = ".$world : "";
				$c = (!empty($town))  ? "WHERE `town` = ".$town : "WHERE `town` = '".$keys[0]."'";
				$f = (!empty($free)) ? "AND `owner` = 0" : "";
				$g = (!empty($guild)) ? "AND `guild` = 1" : "AND `guild` = 0";	
			$sql = $this->db->query("SELECT count(id) FROM `houses` $c $w $f $g LIMIT 10")->result_array();
			return $sql[0]['count(id)'];
			
		}
		
		public function loadHouse($id) {
			$this->load->database();
			return $this->db->query("SELECT houses.world_id, players.name as owner, houses.paid, houses.name, houses.town, houses.price, houses.size, houses.rent, houses.doors, houses.beds, houses.tiles, houses.guild, house_auctions.bid, house_auctions.endtime, house_auctions.limit FROM houses LEFT JOIN players ON players.id = houses.owner LEFT JOIN house_auctions ON house_auctions.house_id = houses.id WHERE houses.id = '".$id."'")->result_array();
		}
		
		public function getAllowedCharacters($world) {
			$this->load->database();
			require("config.php");
			return $this->db->query( 'SELECT `p`.`id`, `p`.`name`, COUNT( `ha`.`player_id` ) AS `already`, COUNT( `h`.`id` ) AS `owned` FROM `players` AS `p` LEFT JOIN `houses` AS `h` ON `h`.`owner` = `p`.`id` LEFT JOIN `house_auctions` AS `ha` ON `ha`.`player_id` = `p`.`id` WHERE `p`.`account_id` = \''.$_SESSION['account_id'].'\' AND `p`.`level` >= '.$config['houseLevel'].' HAVING owned != 1 AND already != 1')->result_array();
			
		}
		
		public function loadCharacter($id) {
			$this->load->database();
			return $this->db->query("SELECT players.balance, players.world_id,  houses.owner, house_auctions.player_id FROM players LEFT JOIN houses ON houses.owner = $id LEFT JOIN house_auctions ON house_auctions.player_id = $id WHERE players.account_id = '".$_SESSION['account_id']."' AND players.id = $id")->result_array();
		}
		
		public function getBids($id) {
			$this->load->database();
			return $this->db->query("SELECT `bid`, `limit`, `endtime` FROM `house_auctions` WHERE `house_id` = '$id'")->result_array();
		}
		
		public function createAuction($house, $character, $bid, $world) {
			require("config.php");
			$this->load->database();
			$data['house_id'] = $house;
			$data['world_id'] = $world;
			$data['player_id'] = $character;
			$data['bid'] = 1;
			$data['limit'] = $bid;
			$data['endtime'] = time()+$config['houseAuctionTime'];
			$this->db->insert("house_auctions", $data);
			
		}
		
		public function setBid($house, $bid) {
			$this->load->database();
			$this->db->query("UPDATE house_auctions SET bid = $bid WHERE house_id = $house");
		}
		
		public function newBid($house, $character, $limit, $bid, $world) {
			$this->load->database();
			$this->db->query("UPDATE house_auctions SET `player_id` = '".$character."', `bid` = '".$bid."', `limit` = '".$limit."' WHERE `house_id` = '".$house."' AND `world_id` = '".$world."'");
		}
		
		public function getAllowedGuildCharacters($world) {
			$this->load->database();
			require("config.php");
			return $this->db->query( 'SELECT `p`.`id`, `p`.`name`, COUNT( `ha`.`player_id` ) AS `already`, COUNT( `h`.`id` ) AS `owned`, guild_ranks.level as guild FROM `players` AS `p` LEFT JOIN `houses` AS `h` ON `h`.`owner` = `p`.`id` LEFT JOIN `house_auctions` AS `ha` ON `ha`.`player_id` = `p`.`id` LEFT JOIN guild_ranks ON p.rank_id = guild_ranks.id WHERE `p`.`account_id` = \''.$_SESSION['account_id'].'\' AND `p`.`level` >= '.$config['houseLevel'].' HAVING owned != 1 AND already != 1 AND guild = 1')->result_array();
			
		}
		
		public function getCharactersName() {
			$this->load->database();
			return $this->db->query("SELECT name FROM players WHERE account_id = '".$_SESSION['account_id']."'")->result_array();
		}
		
		public function abandon($id) {
			$this->load->database();
			$this->db->query("UPDATE houses SET owner = 0 WHERE id = $id");
		}
		
		
	}

?>