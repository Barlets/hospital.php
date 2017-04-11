<?php

	class Index
	{
		//Return the array of all the doctor items
		public static function getAllDoctors()
		{
			$db = Db::getConnection();
			$doctorsList = array();
			$sql = 'SELECT * FROM doctors';
			$result = $db->query($sql);

			$i = 0;
			while ($row = $result->fetch()) {
				$doctorsList[$i]['id'] = $row['id'];
				$doctorsList[$i]['doc_position'] = $row['doc_position'];
				$doctorsList[$i]['first_name'] = $row['first_name'];
				$doctorsList[$i]['last_name'] = $row['last_name'];
				$doctorsList[$i]['patronymic'] = $row['patronymic'];
				$i++;
			}
			return $doctorsList;
		}

		//Return the array of all the patient items
		public static function getAllPatients()
		{
			$db = Db::getConnection();
			$patientsList = array();
			$sql = 'SELECT * FROM patients';
			$result = $db->query($sql);

			$i = 0;
			while ($row = $result->fetch()) {
				$patientsList[$i]['id'] = $row['id'];
				$patientsList[$i]['last_name'] = $row['last_name'];
				$patientsList[$i]['first_name'] = $row['first_name'];
				$patientsList[$i]['patronymic'] = $row['patronymic'];
				$i++;
			}
			return $patientsList;
		}
	}