<?php

	
	    if (!$link = mysql_connect('127.0.0.1', 'root', 'K@#L&*!)%')) 
	    {
		echo 'Could not connect to mysql';
		exit;
	    }

	    if (!mysql_select_db('demo_saran', $link)) {
		echo 'Could not select database';
		exit;
	    }
?>
