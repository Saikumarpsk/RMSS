<?php

	
	    if (!$link = mysql_connect('localhost', 'root', 'root123')) 
	    {
		echo 'Could not connect to mysql';
		exit;
	    }

	    if (!mysql_select_db('demo_suneel1', $link)) {
		echo 'Could not select database';
		exit;
	    }
?>
