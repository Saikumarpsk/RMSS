<?php

	
	    if (!$link = mysql_connect('127.0.0.1', 'root', 'root')) 
	    {
		echo 'Could not connect to mysql';
		exit;
	    }

	    if (!mysql_select_db('demo_rmss', $link)) {
		echo 'Could not select database';
		exit;
	    }
?>
