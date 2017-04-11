<?php

	class Doctors
	{
		//Return all patients of the doctor
		public static function getPatients($id)
		{
			$id = intval($id);
			if ($id) {
				$db = Db::getConnection();
				$sql = '
					SELECT * 
					FROM doctors
					WHERE doctors.id =' . $id;
				$result = $db->query($sql);
				$result->setFetchMode(PDO::FETCH_ASSOC);
				$doctorItem = $result->fetch();

				$sql = '
					SELECT *
					FROM patients
					LEFT JOIN doctors_patients 
					ON patients.id = doctors_patients.patient_id
					WHERE doctors_patients.doctor_id=' . $id;
				$result = $db->query($sql);
				$result->setFetchMode(PDO::FETCH_ASSOC);

				$i = 0;
				while ($row = $result->fetch()) {
					$patientsList[$i]['id'] = $row['id'];
					$patientsList[$i]['first_name'] = $row['first_name'];
					$patientsList[$i]['last_name'] = $row['last_name'];
					$patientsList[$i]['patronymic'] = $row['patronymic'];
					$i++;
				}
			}
			return array($doctorItem, $patientsList);
		}

		//Change doctors name
		public static function setDoctorName($id, $name)
		{
			$db = Db::getConnection();
			$sql = '
				UPDATE `doctors` 
				SET `first_name`= "' . $name . '"
				WHERE id=' . $id;
			$result = $db->query($sql);
			if ($result) {
				echo 'Имя успешно изменено. Новое имя:  ' . $name;
			}
		}
	}