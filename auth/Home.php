<? session_start();
?>
<html>

	<body>
			 Welcome 
			<?php
			if(isset($_SESSION['user'])!="")
			echo $_SESSION['user'];
			?>
	</body>
</html>