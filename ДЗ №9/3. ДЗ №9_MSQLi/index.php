<?php
	if (file_exists('data_connection.php')) {
            header('Location: dz9.php');
	} else {
            header('Location: install.php');
	}