<?php

	$data = $_POST;

	if (isset($data['submit'])) {
		$errors = array();

		if (trim($data['name'])) {
			$errors[] = 'Введите имя';
		}

		if (empty($errors)) {
			$id = $data['id'];
			$name = $data['name'];
		}
	}
