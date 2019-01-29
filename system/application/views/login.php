<?php echo error(validation_errors()); ?>
<?php include("public/js/keyboard.php");?>
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE; ?>/public/css/keyboard.css">
<?php echo form_open('account/login'); ?>
	<label for="name">Account Name</label><input type="password" value="<?php echo set_value('name'); ?>" class="keyboardInput" name="name"/><br>
	<label for="name">Password</label><input  type="password"" value="<?php echo set_value('pass'); ?>" class="keyboardInput" name="pass"/><br>
	<input class='sub' type="submit" value="Login"/>
</form>