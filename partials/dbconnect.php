<?php
	$dsn = "mysql:host=localhost;dbname=wanderdb;port=3306";
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$base = new PDO($dsn, 'root', 'root', $opt);