<?php 
class videos_model extends model {
	public function getCharacters() {
		$this->load->database();
		return $this->db->query("SELECT `id`, `name` FROM `players` WHERE `account_id` = '".$_SESSION['account_id']."' AND`deleted` != 1")->result_array();
	}
	
	public function checkCharacter($id) {
		$this->load->database();
		return ($this->db->query("SELECT `id` FROM `players` WHERE `id` = '".$id."' AND `account_id` = '".$_SESSION['account_id']."'")->num_rows == 0) ? false : true;
	}
	
	public function addVideo($id, $character, $title, $description) {
		$this->load->database();
		$data['id'] = "";
		$data['author'] = $character;
		$data['title'] = $title;
		$data['description'] = $description;
		$data['youtube'] = $id;
		$data['views'] = 1;
		$data['time'] = time();
		$this->db->insert("videos", $data);
	}
	
	public function videoExists($id) {
		$this->load->database();
		return ($this->db->query("SELECT id FROM videos WHERE youtube = '".$id."'")->num_rows == 0) ? false : true;
	}
	
	public function getMainVideos() {
		$this->load->database();
		return $this->db->query("SELECT videos.id, videos.title, videos.views, videos.youtube, videos.time, players.name as author FROM `videos` LEFT JOIN players ON players.id = videos.author ORDER BY `views` DESC")->result_array();
	}
	
	public function loadVideo($id) {
		$this->load->database();
		return $this->db->query("SELECT videos.id, videos.title, videos.description,  videos.views, videos.youtube, videos.time, players.name as author FROM `videos` LEFT JOIN players ON players.id = videos.author WHERE videos.id = $id")->result_array();
	}
	
	public function getComments($id) {
		require("config.php");
		$this->load->helper("url");
		$page = $this->uri->segment(4);
			$page = (empty($page)) ? 0 : $page;
		$this->load->database();
		return $this->db->query("SELECT video_comments.id, video_comments.time, video_comments.text, players.name as author FROM video_comments LEFT JOIN players ON players.id = video_comments.author WHERE video_comments.video = '".$id."' ORDER BY id DESC LIMIT ".$page.", ".$config['videoCommentsLimit']."")->result_array();
	}
	
	public function getCommentsAmount($id) {
		$this->load->database();
		return $this->db->query("SELECT `id` FROM `video_comments` WHERE `video` = '".$id."'")->num_rows;
	}
	
	public function createComment($video, $character, $text) {
		$this->load->database();
		$data['id'] = "";
		$data['author'] = $character;
		$data['video'] = $video;
		$data['time'] = time();
		$data['text'] = $text;
		$this->db->insert("video_comments", $data);
	}
	
	public function getCommentAuthor($id) {
		$this->load->database();
		return $this->db->query("SELECT players.name as author FROM `video_comments` LEFT JOIN players ON players.id = video_comments.author  WHERE video_comments.id = '".$id."'")->result_array();
	}
	
	public function deleteComment($id) {
		$this->load->database();
		$this->db->query("DELETE FROM video_comments WHERE id = '".$id."'");
	}
	
	public function searchVideos($string) {
		require("config.php");
		$this->load->helper("url");
		$page = $this->uri->segment(4);
			$page = (empty($page)) ? 0 : $page;
		$this->load->database();
		$string = str_replace(" ", "%", $string);
		return $this->db->query("SELECT videos.id, videos.title, videos.views, videos.youtube, videos.time, players.name as author FROM `videos` LEFT JOIN players ON players.id = videos.author WHERE videos.title LIKE \"%".$string."%\" OR videos.description LIKE \"%".$string."%\" ORDER BY `views` DESC LIMIT ".$page.", ".$config['videoSearchLimit']."")->result_array();
	}
	
	public function searchVideosAmount($string) {
		$this->load->database();
		$string = str_replace(" ", "%", $string);
		return $this->db->query("SELECT videos.id FROM `videos` WHERE videos.title LIKE \"%".$string."%\" OR videos.description LIKE \"%".$string."%\"")->num_rows();
	}
	
	public function getMyVideos() {
		$this->load->database();
		return $this->db->query("SELECT videos.id, videos.title, videos.views, videos.youtube, videos.time, players.name as author FROM `videos` LEFT JOIN players ON players.id = videos.author WHERE players.account_id = '".$_SESSION['account_id']."'")->result_array();
	}
	
	public function addView($id) {
		$this->load->database();
		$this->db->query("UPDATE videos SET views = views+1 WHERE `id` = $id");
	}
	
	public function updateVideo($id, $title, $description) {
		$this->load->database();
		$this->db->query("UPDATE videos SET title = '".$title."', description = '".$description."' WHERE id = '".$id."'");
	}
	
	public function delete($id) {
		$this->load->database();
		$this->db->query("DELETE FROM video_comments WHERE video = '".$id."'");
		$this->db->query("DELETE FROM videos WHERE id = '".$id."'");
	}
}
?>