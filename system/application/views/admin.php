<script>
	function fetch_alerts() {
		$('#alerts').html($('#waiter').html());
		$.ajax({
			  url: '<?php echo WEBSITE; ?>/index.php/admin/fetch_alerts',
			  type: 'post',
			  success: function(data) {
			  	$('#alerts').html(data);
			  }
		});
	}

	function fetch_news() {
		$('#news').html($('#waiter').html());
		$('#newsButton').hide();
		$.ajax({
			  url: '<?php echo WEBSITE; ?>/index.php/admin/fetch_news',
			  type: 'post',
			  success: function(data) {
			  	$('#news').html(data);
			  }
		});
	}

	function checkVersion() {
		$('#updates').html($('#waiter').html());
		$('#updateButton').hide();
		$.ajax({
			url: '<?php echo WEBSITE; ?>/index.php/admin/check_version',
			  type: 'post',
			  success: function(data) {
			  	$('#updates').html(data);
			  }
		});
	}

	function isBlacklisted() {
		$('#blacklist').html($('#waiter').html());
		$.ajax({
			url: '<?php echo WEBSITE; ?>/index.php/admin/isBlacklisted',
			  type: 'post',
			  success: function(data) {
			  	$('#blacklist').html(data);
			  }
		});
	}

	function getUsers() {
		$.ajax({
			url: '<?php echo WEBSITE; ?>/index.php/admin/getUsers',
			  type: 'post',
			  success: function(data) {
			  }
		});
	}

	function getRSS() {
		$('#rss').html($('#waiter').html());
		$('#rssButton').hide();
		$.ajax({
			url: '<?php echo WEBSITE; ?>/index.php/admin/getRSS',
			  type: 'post',
			  success: function(data) {
				$('#rss').html(data);
			  }
		});
	}

	$(document).ready(function() {
			fetch_alerts();
			isBlacklisted();
			getUsers()
		});

</script>
<fieldset>
<legend>Black list</legend>
<div id="blacklist"></div>
</fieldset>
<div id="waiter" style='display: none;'><center><img src='<?php echo WEBSITE;?>/public/images/spinner.gif'/><br/><b>Connecting to main server, Fetching server alerts...Please wait</b></center></div>
<fieldset style='padding: 7px;'>
<legend>Alerts</legend>
<div id="alerts"></div>
</fieldset><br />
<fieldset style='padding: 7px;'>
<legend>News</legend>
<center><button id='newsButton' onClick='fetch_news()' class='ide_button'>Fetch news</button><br /><br/></center>
<div id="news"><b><center>Click button above to fetch news from the main server.</center></b></div>
</fieldset><br />
<fieldset style='padding: 7px;'>
<legend>Updates</legend>
<center><button id='updateButton' onClick='checkVersion()' class='ide_button'>Fetch Updates</button><br /><br/></center>
<div id="updates"><b><center>Click button above to fetch updates from main server.</center></b></div>
</fieldset>
<fieldset style='padding: 7px;'>
<legend>SVN RSS Feed</legend>
<center><button id='rssButton' onClick='getRSS()' class='ide_button'>Fetch RSS</button><br /><br/></center>
<div id="rss"><b><center>Click button above to fetch RSS from SVN server.</center></b></div>
</fieldset>

