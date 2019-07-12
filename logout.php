<?php
	session_start();
	session_unset();
	session_destroy();
	echo "<script>location.replace('index.html');</script>";
	exit;
?>