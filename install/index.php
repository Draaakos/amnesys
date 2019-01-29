<?php 
require("../config.php");
if(empty($config['server_name']) or $config['server_name'] != "%SERVER_NAME%") {
	header("Location: ../");
	exit();
}

function is_really_writable($file)
{	
	if (DIRECTORY_SEPARATOR == '/' AND @ini_get("safe_mode") == FALSE)
	{
		return is_writable($file);
	}
	if (is_dir($file))
	{
		$file = rtrim($file, '/').'/'.md5(rand(1,100));
		if (($fp = @fopen($file, FOPEN_WRITE_CREATE)) === FALSE)
		{
			return FALSE;
		}
		fclose($fp);
		@chmod($file, DIR_WRITE_MODE);
		@unlink($file);
		return TRUE;
	}
	elseif (($fp = fopen($file, FOPEN_WRITE_CREATE)) === FALSE)
	{
		return FALSE;
	}
	fclose($fp);
	return TRUE;
}	
	
	if($_POST) {
		$name = $_POST['server_name'];
		$hostname = $_POST['hostname'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$dbtable = $_POST['table'];
		$license = $_POST['license'];
		$website = $_POST['website'];
		$error = "";
		if(empty($hostname) or empty($name) or empty($login) or empty($dbtable) or empty($website))
			$error .= "<li>All fields are required.</li>";
			
		if($license != 1)
			$error .= "<li>You must read and accept license</li>";
			
		if(@!mysql_connect($hostname, $login, $password))
			$error .= "<li>Could not connect to database.</li>";
			
		if(@!mysql_select_db($dbtable))
			$error .= "<li>Could not find your database.</li>";
			
		if(@file_get_contents($website."/API/isValid.php") != 1)
			$error .= "<li>Website address could not be established, tried to connect to <b>$website/API/isValid.php</b> if the link is valid check if this server is allowed to use local API.</li>";
					
		if(empty($error)) {
			$handle = fopen("../config.php", 'r+');
			$size = (filesize("../config.php") == 0) ? 1 : filesize("../config.php");
			$content = fread($handle, $size);
			$content = str_replace("%SERVER_NAME%", $name, $content);
			$content = str_replace("%DB_HOST%", $hostname, $content);
			$content = str_replace("%DB_LOGIN%", $login, $content);
			$content = str_replace("%DB_PASS%", $password, $content);
			$content = str_replace("%DB_NAME%", $dbtable, $content);
			$content = str_replace("%WEBSITE%", $website, $content);
			$handle = fopen("../config.php", 'wb');
			fwrite($handle, $content);
			fclose($handle);
			$db = file_get_contents("dbSCHEMA.txt");
			$queries = explode ( ";", $db ); 
			$i = 0;
			foreach ($queries as $query) 
			{ 
				$i++;
			    @mysql_query ($query); 
			} 
			echo "Changed config.php <br/>";
			echo $i." queries executed.<br />";
			exit("<center>Modern AAC has been installed! You can always change any value in config.php in the main directory, for additional security you can remove the whole install folder. Thank you for choosing this system. You can now view your website <a href='../'>here</a>.</center>");
		}
			
		
	}
	else {
		$_POST['hostname'] = "127.0.0.1";
		$_POST['login'] = "root";
		$_POST['table'] = "name of database";
		$_POST['website'] = "http://".$_SERVER['SERVER_ADDR']."".str_replace("/install/index.php", "", $_SERVER['PHP_SELF']);
		$_POST['server_name'] = "name of server";	
	}
?>
<html>
<head>
<title>Instaling Modern AAC - Powered by IDE Engine</title>
<link REL="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div id="wrapper">
<div id="header"></div>
<div id="content">            		
	<div id="left_stroke"></div>
	<div id="right_stroke"></div>
<center>
<div><?php echo $error;?></div>
<form action='index.php' method='post'>
<fieldset>
<legend>Server info</legend>
<b>Server name</b><br/>
<input type='text' value="<?php echo $_POST['server_name']; ?>" name='server_name'/><br/>
<b>Full website URL</b><br/>
<input type='text' value="<?php echo $_POST['website']; ?>" name='website'/><br/>
</fieldset>
<fieldset>
<legend>Database info</legend>
<b>Hostname</b><br/>
<input type='text' value='<?php echo $_POST['hostname'];?>'name='hostname'/><br/>
<b>Login</b><br/>
<input type='text' value='<?php echo $_POST['login'];?>'name='login'/><br/>
<b>Password</b><br/>
<input type='password' value='<?php echo $_POST['password'];?>'name='password'/><br/>
<b>Database</b><br/>
<input type='text' value='<?php echo $_POST['table'];?>'name='table'/><br/>
</fieldset>
	<br/><div class="field"><?php echo nl2br(file_get_contents("license.txt"));?>
	<br/><br/><input type='checkbox' name='license' value='1'/>I accept to the following license.<br/><br/>
	</div><br/>
	<input type='submit' value='Install'/>
</form>
</center>
</div>
</div>
<div id="footer"></div></div>
</body>
</html>
