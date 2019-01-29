<?php echo error(validation_errors()); ?>
<?php include("public/js/keyboard.php");?>
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE; ?>/public/css/keyboard.css">
<?php echo form_open('account/create'); ?>
	<label for="name">Account Name</label><input type="text" value="<?php echo set_value('name'); ?>" class="keyboardInput" name="name"/><br>
	<label for="name">E-mail</label><input  type="text" value="<?php echo set_value('email'); ?>" name="email"/><br>
	<label for="name">Password</label><input type="password" class="keyboardInput" name="password"/><br>
	<label for="name">Repeat</label><input type="password" class="keyboardInput" name="repeat"/><br>
	<label></label><?php echo $captcha;?><br />
	<label>Captcha World</label><input type='text' name='captcha'/><br/>
	<input class='sub' type="submit" value="Register"/>
</form>