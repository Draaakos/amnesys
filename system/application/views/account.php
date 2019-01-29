<?php 
$GLOBALS['characters'] = $characters;
$ide = new IDE;
try { $ide->loadInjections("account"); } catch(Exception $e) { error($e->getMessage()); }
	echo "<h2>Hello ".ucfirst($loggedUser)."!</h2>";
?>
<script>$(function(){$("#tabs").tabs();});</script>
<?php
echo "<div id='tabs'>";
echo '<ul>
		<li><a href="#characters">Characters</a></li>
		<li><a href="#account">Account</a></li>
		<li><a href="#logout">Logout</a></li>
	</ul>';
	echo "<div id='characters'>";
	echo "<center><a href='".WEBSITE."/index.php/character/create_character'><button class='ide_button' onClick=\"window.location.href='".WEBSITE."/index.php/character/create_character';\">Create Character</button></a></center>";
	echo "<table width='100%'>";
	echo "<tr><td><center><b>Name</b></center></td><td><center><b>Level</b></center></td><td><center><b>Actions</b></center></td></tr>";
	foreach($characters as $row) {
		echo "<tr class='highlight'><td><center><a href=\"".WEBSITE."/index.php/character/view/$row->name\">$row->name</a></center></td><td><center>$row->level</center></td><td><center><a href=\"".WEBSITE."/index.php/account/editcomment/$row->name\" class='tipsy' title='Edit comment'><img src='".WEBSITE."/public/images/edit.gif'/></a> <a href='#' onClick='if(confirm(\"Are you sure you want to delete $row->name?\")) window.location.href=\"".WEBSITE."/index.php/account/deletePlayer/$row->name\"' class='tipsy' title='Delete character'><img src='".WEBSITE."/public/images/false.gif'/></a></center></td></tr>";
	
	}
	echo "</table>";
	echo "</div>";
	echo "<div id='account'>";
	echo "<center><a href='".WEBSITE."/index.php/account/changepassword'><button class='ide_button' onClick=\"window.location.href='".WEBSITE."/index.php/account/changepassword';\">Change password</button></a></center>";
	echo "</div>";
	echo "<div id='logout'>";
		echo "<br /><center><b>Are you sure you want to log out?</b><br /><br /><a href='".WEBSITE."/index.php/account/logout'><button class='ide_button' onClick=\"window.location.href='".WEBSITE."/index.php/account/logout';\">Logout</button></a></center>";
	echo "</div>";
echo "</div>";
?>