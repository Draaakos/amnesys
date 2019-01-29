<?php 
error(validation_errors());
echo form_open("account/editcomment/".$id);
if(empty($_POST['comment'])) $_POST['comment'] = $comment[0]['comment'];
echo "<b>Editing ".$id." comment.";
	echo "<textarea name='comment'>".$_POST['comment']."</textarea><br/>";
	echo "<input type='submit' value='Edit'/>";
echo "</form>";

?>