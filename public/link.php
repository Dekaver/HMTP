<html>
<body>
	<form method="POST" action="">
		<input type="text" name="target" placeholder="Target"><br>
		<input type="text" name="shortcut" placeholder="Shortcut"><br>
		<input type="submit" name="submit" value="submit">
	</form>

	<?php
	
	  echo exec("ln -s /home/hmtn9461/public_html/storage/app/public /home/hmtn9461/public_html/public/storage");
	?>
</body>
</html>