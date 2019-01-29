<?php
/* 
+I.D.E ENGINE+
Controller of Account for Modern AAC - Powered by IDE Engine.
A lot of new functionality and variables can be hard-coded here.
If you do NOT understand the code, do NOT change anything in here.
*/
	
	class Account extends Controller {
	
		/* Main index of Account controllers, also work as a __construct(); It is called by engine as a default. */
		function index($action = 0) {
			if($action == 1) success("Your new character has been created!");
			$this->load->model("Account_model");
			if(empty($_SESSION['account_id'])) $_SESSION['account_id'] = $this->Account_model->getAccountID();
			$ide = new IDE;
			$ide->requireLogin();
			$data = array();
			$data['loggedUser'] = $_SESSION['name'];
			$data['characters'] = $this->Account_model->getCharacters();
			$ots = POT::getInstance();
			$ots->connect(POT::DB_MYSQL, connection());
			$account = $ots->createObject('Account');
			$account->find($_SESSION['name']);
			$data['account'] = $account;
			$recovery_key = $this->Account_model->getRecoveryKey($_SESSION['name']);
			if($recovery_key == 0) alert("You don't have recovery key set up. Click <a href='".WEBSITE."/index.php/account/generate_recovery_key'><b>here</b></a> to create one. We strongly recommend to create one now for security reasons.");
			/* Load view of account page and send data to it. */
			$this->load->view('account', $data);
		}
		
		/*
		Function to check if account with this name already exists, it is used by create controller as a callaback in form validation. 
		It should be made as an abstract class of database in Model, but I don't think there is point of it.
		*/
		function _account_exists($name) {
			$ots = POT::getInstance();
			$ots->connect(POT::DB_MYSQL, connection());
			$account = new OTS_Account();
			$account->find($name);
			if($account->isLoaded()) { $this->form_validation->set_message('_account_exists', 'Account with this name already exists.');return false;} else return true;
		}
		
		function _checkCaptcha($word) {
			if(strtolower($word) == strtolower($_SESSION['captcha']) && !empty($_SESSION['captcha'])) {
				return true;
			}
			else {
				$this->form_validation->set_message('_checkCaptcha', 'Captcha word is incorrect.');
				return false;
			}
		}

		/* Controller of creating new account. New values can be hard-coded here. (only experienced users) */
		function create() {
			$ide = new IDE;
			if($ide->isLogged()) $ide->redirect('../account');
			$this->load->plugin('captcha');
			$this->load->helper('form');
			
			$vals = array(
					'word'		 => '',
					'img_path'	 => 'system/captcha/',
					'img_url'	 => WEBSITE.'/system/captcha/',
					'font_path'	 => WEBSITE.'/system/fonts/texb.ttf',
					'img_width'	 => '156',
					'img_height' => 30,
					'expiration' => 120
				);
			if(!$_POST) {
				$cap = create_captcha($vals);	
			}
			if($_POST) {
				$this->load->library('form_validation');
				$this->form_validation->set_rules('name', 'Account Name', 'required|min_length[4]|max_length[32]|callback__account_exists|alpha_numeric');
				$this->form_validation->set_rules('password', 'Password', 'required|matches[repeat]|min_length[4]|max_length[255]');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback__checkCaptcha');
				if($this->form_validation->run() == TRUE) {
					require(APPPATH.'config/ide_default.php');
					$ots = POT::getInstance();
					$ots->connect(POT::DB_MYSQL, connection());
					$account = new OTS_Account();
					$name = $account->createNamed($_POST['name']);
					$account->setPassword(sha1($_POST['password']));
					$account->setEmail($_POST['email']);
					$account->setCustomField('premdays', PREMDAYS);
					try {
						$account->save();
						$_SESSION['logged'] = 1;
						$_SESSION['name'] = $_POST['name'];
						$ide->redirect('../account');
					}
					catch(Exception $e) {
						error($e->getMessage());
					}
				}
				else {
					$cap = create_captcha($vals);
				}
			}
			$_SESSION['captcha'] = $cap['word'];
			$data['captcha'] = $cap['image'];
			#Load view of creating account
			$this->load->view('create', $data);
		}
		
		/* Function to check if passed login and password are correct, it uses abstract database model. */
		function _check_login() {
			$this->load->model("Account_model");
			if($this->Account_model->check_login() == false) {
				$this->form_validation->set_message("_check_login", "Account name or password are incorrect.");
				return false;
			}
			else
				return true;
		}
		
		/* Login controller  */
		function login($action = 0) {
			if((int) $action == 1) success("You have been logged out.");
			$ide = new IDE;
			$this->load->helper("form");
			$this->load->library("form_validation");
			if($_POST) {
				$this->form_validation->set_rules('name', 'Account Name', 'required|callback__check_login');
				$this->form_validation->set_rules('pass', 'Password', 'required');
				if($this->form_validation->run() == true) {
					$_SESSION['logged'] = 1;
					$_SESSION['name'] = $_POST['name'];
					if(!empty($_SESSION['forward'])) {
						$forward = $_SESSION['forward'];
						$_SESSION['forward'] = "";
						$ide->redirect($forward);
					}
					else 
					$ide->redirect(WEBSITE.'/index.php/account');
					
				}
			}
			/* Load view of login page. */
			$this->load->view("login");
			
		}
		/* Function to logout from account. */
		function logout() {
			$ide = new IDE;
			$_SESSION['logged'] = '';
			$_SESSION['account_id'] = '';
			$_SESSION['name'] = '';
			$_SESSION['admin'] = 0;
			$_SESSION['forward'] = "";
			$ide->redirect('login/1');
		}
		
		/* Controller to generate random recovery key and save it, accessed by user, only once per account. */
		function generate_recovery_key() {
			$this->load->helper("form");
			$ide = new IDE;
			$ide->requireLogin();
			$this->load->model("Account_model");
			if($this->Account_model->getRecoveryKey($_SESSION['name']) != 0) $ide->redirect('../account');
			if($_POST) {
				$data['info'] = '';
				$key = $this->Account_model->generateKey($_SESSION['name']);
				success("<center><font size='4'>$key</font></center>");
				alert("<b>Save this recovery key, you see this key only once! You will never see it again, don't refresh or move away from this website until you save it!</b>");
			}
			else
			$data['info'] = '<center id=\'info\'><b>Press this button to generate your unique recovery key. <br>Remember! You can do this only once! Your recovery key will be shown only once! Write it down, for security reasons we recommend to not save it on computers hard drive!</b></center><br><center><input type=\'submit\' value=\'Generate\' name=\'submit\'></center>';
			/* Load view of generating new recovery key. */
			$this->load->view('generate_recovery_key', $data);
		
		}
		
		function _checkCurrentPassword($pass) {
			$this->load->model("account_model");
			if($this->account_model->checkPassword($pass)) 
				return true;
			else {
				$this->form_validation->set_message("_checkCurrentPassword", "Current password is incorrect.");
				return false;
			}
		}
		
		function changepassword() {
			$ide = new IDE;
			$ide->requireLogin();
			$this->load->helper("form_helper");
			if($_POST) {
				$this->load->library("form_validation");
				$this->form_validation->set_rules('current', 'Current Password', 'required|callback__checkCurrentPassword');
				$this->form_validation->set_rules('password', 'Password', 'required|matches[repeat]|min_length[4]|max_length[255]');
				if($this->form_validation->run() == true) {
					$this->load->model("account_model");
					$this->account_model->changePassword($_POST['password'], $_SESSION['name']);
					success("Your password has been changed.");
					$ide->redirect(WEBSITE."/index.php/account", 2);
				}
			}
			$this->load->view("changepassword");
		}
		
		function editcomment($id) {
			$ide = new IDE;
			$ide->requireLogin();
			if(empty($id)) $ide->redirect(WEBSITE."/index.php/account");
			$this->load->model("account_model");
			if(!$this->account_model->isUserPlayer($id)) $ide->redirect(WEBSITE."/index.php/account");
			$data['id'] = $id;
			$data['comment'] = $this->account_model->getPlayerComment($id);
				if($_POST && $_POST['comment'] != $data['comment'][0]['comment']) {
					$this->load->library("form_validation");
						$this->form_validation->set_rules('comment', 'Comment', 'max_length[255]|alpha_ide');
					if($this->form_validation->run() == true) {
						$this->account_model->changeComment($id, $_POST['comment']);
						success("Your comment has been changed.");
						$ide->redirect(WEBSITE."/index.php/account", 2);
					}
				}
			$this->load->helper("form_helper");
			$this->load->view("edit_comment", $data);
		}
		
		function deletePlayer($id) {
			$ide = new IDE;
			$ide->requireLogin();
			if(empty($id)) $ide->redirect(WEBSITE."/index.php/account");
			$this->load->model("account_model");
			if(!$this->account_model->isUserPlayer($id)) $ide->redirect(WEBSITE."/index.php/account");
			$this->account_model->deletePlayer($id);
			$ide->redirect(WEBSITE."/index.php/account");
		}
		
	}

?>