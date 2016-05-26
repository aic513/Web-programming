<?php
	if (file_exists('data_connection.php')) {
            header('Location: controller.php');
	} else {
            header('Location: install.php');
	}