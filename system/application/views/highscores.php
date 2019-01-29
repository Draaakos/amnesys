<?php
require("config.php");
$ide = new IDE;
try {$ide->loadInjections("highscores");} catch(Exception $e) {error($e->getMessage()); }
echo form_open('highscores');
if(empty($_POST['skill'])) $_POST['skill'] = 1;

	if(count($config['worlds']) > 1) {
		echo "<b>World</b>&nbsp;&nbsp;";
		echo "<select name='world'>";
		foreach($config['worlds'] as $id=>$name) {
			if($_POST['world'] == $id)
			echo "<option selected='true' value='$id'>$name</option>";
			else
			echo "<option value='$id'>$name</option>";
		}
		echo "</select>";
	}
	
	echo "&nbsp;&nbsp;<b>Rank of</b>&nbsp;&nbsp;";
	echo "<select name='skill'>";
	echo "<option class='skill' ".set_select('skill', 1, true)." value='1'>Experience</option>";
	echo "<option class='skill' ".set_select('skill', 2)." value='2'>Fist fighting</option>";
	echo "<option class='skill' ".set_select('skill', 3)." value='3'>Club fighting</option>";
	echo "<option class='skill' ".set_select('skill', 4)." value='4'>Sword fighting</option>";
	echo "<option class='skill' ".set_select('skill', 5)." value='5'>Axe fighting</option>";
	echo "<option class='skill' ".set_select('skill', 6)." value='6'>Distance fighting</option>";
	echo "<option class='skill' ".set_select('skill', 7)." value='7'>Shield fighting</option>";
	echo "<option class='skill' ".set_select('skill', 8)." value='8'>Fishing fighting</option>";
	echo "<option class='skill' ".set_select('skill', 9)." value='9'>Magic level</option>";
	echo "</select>";
	echo " <input type='submit' value='Show'>";

echo "</form>";
	echo "<h2><center>Ranking of $type on ".$config['worlds'][$world]."</center></h2>";
	if(empty($_REQUEST['skill']) or empty($_REQUEST['skill'])) {
		echo "<table width='100%'>";
		echo "<tr><td width='5%'><b><center>*</center></b></td><td width='40%'><center><b>Name</b></center></td><td width='10%'><center><b>Exp</b></center></td><td width='5%'><center><b>Level</b></center></td></tr>";
		$i = 0;
		foreach($players as $player) {
			$i++;
			if(in_array($player['name'], $config['newchar_vocations'][0])) { $i-- ;continue;}
			$name = ($player['online'] == 0) ? "<a href=\"".WEBSITE."/index.php/character/view/".$player['name']."\"><font color='red'>".$player['name']."</font></a>" : "<a href='".WEBSITE."/index.php/character/view/".$player['name']."'><font color='green'>".$player['name']."</font></a>";
			echo "<tr><td width='5%'><center>$i</center></td><td width='40%'><center>$name</center></td><td width='10%'><center>".$player['experience']."</center></td><td width='5%'><center>".$player['level']."</center></td></tr>";	
		}
		echo "</table>";
	}
	else if($_REQUEST['skill'] == 1) {
		echo "<table width='100%'>";
		echo "<tr><td width='5%'><b><center>*</center></b></td><td width='40%'><center><b>Name</b></center></td><td width='10%'><center><b>Exp</b></center></td><td width='5%'><center><b>Level</b></center></td></tr>";
		$i = 0;
		foreach($players as $player) {
			$i++;
		if(in_array($player['name'], $config['newchar_vocations'][0])) { $i-- ;continue;}
			$name = ($player['online'] == 0) ? "<a href=\"".WEBSITE."/index.php/character/view/".$player['name']."\"><font color='red'>".$player['name']."</font></a>" : "<a href='".WEBSITE."/index.php/character/view/".$player['name']."'><font color='green'>".$player['name']."</font></a>";
			echo "<tr><td width='5%'><center>$i</center></td><td width='40%'><center>$name</center></td><td width='10%'><center>".$player['experience']."</center></td><td width='5%'><center>".$player['level']."</center></td></tr>";	
		}
		echo "</table>";
	}
	else if($_REQUEST['skill'] == 2 or $_REQUEST['skill'] == 3 or $_REQUEST['skill'] == 4 or $_REQUEST['skill'] == 5 or $_REQUEST['skill'] == 6 or $_REQUEST['skill'] == 7 or $_REQUEST['skill'] == 8) {
		echo "<table width='100%'>";
		echo "<tr><td width='5%'><b><center>*</center></b></td><td width='40%'><center><b>Name</b></center></td><td width='10%'><center><b>Skill</b></center></td></tr>";
		$i = 0;
		foreach($players as $player) {
			$i++;
			if(in_array($player['name'], $config['newchar_vocations'][0])) { $i-- ;continue;}
			$name = ($player['online'] == 0) ? "<a href=\"".WEBSITE."/index.php/character/view/".$player['name']."\"><font color='red'>".$player['name']."</font></a>" : "<a href='".WEBSITE."/index.php/character/view/".$player['name']."'><font color='green'>".$player['name']."</font></a>";
			echo "<tr><td width='5%'><center>$i</center></td><td width='40%'><center>$name</center></td><td width='10%'><center>".$player['value']."</center></td></tr>";	
		}
		echo "</table>";
	}
	else if($_REQUEST['skill'] == 9) {
		echo "<table width='100%'>";
		echo "<tr><td width='5%'><b><center>*</center></b></td><td width='40%'><center><b>Name</b></center></td><td width='5%'><center><b>Level</b></center></td></tr>";
		$i = 0;
		foreach($players as $player) {
			$i++;	
			if(in_array($player['name'], $config['newchar_vocations'][0])) { $i-- ;continue;}
			$name = ($player['online'] == 0) ? "<a href=\"".WEBSITE."/index.php/character/view/".$player['name']."\"><font color='red'>".$player['name']."</font></a>" : "<a href='".WEBSITE."/index.php/character/view/".$player['name']."'><font color='green'>".$player['name']."</font></a>";
			echo "<tr><td width='5%'><center>$i</center></td><td width='40%'><center>$name</center></td><td width='5%'><center>".$player['maglevel']."</center></td></tr>";	
		}
		echo "</table>";
	
	}