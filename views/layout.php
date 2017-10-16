<!DOCTYPE html>
<html>
<head>
	<title>php_mvc_blog</title>
</head>
<body>
	<header>
		<a href="/php_mvc_blog">Home</a>
		<a href="?controller=posts&action=index">Posts</a>
	</header>
	<?php require_once('routes.php') ?>

	<footer>
		Copyright Fahmi Irfan
	</footer>
</body>
</html>