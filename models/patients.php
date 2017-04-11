<?php

	class Patients
	{
		//Return one patient with doctors
		public static function getDoctors($id)
		{
			$id = intval($id);
			if ($id) {
				$db = Db::getConnection();
				$sql = '
					SELECT id, first_name, last_name, patronymic
					FROM patients
					WHERE patients.id =' . $id;
				$result = $db->query($sql);
				$result->setFetchMode(PDO::FETCH_ASSOC);
				$patientItem = $result->fetch();

				$sql = '
					SELECT  birthday,  
					( 
						(YEAR(CURRENT_DATE) - YEAR(birthday)) -   
                  (DATE_FORMAT(CURRENT_DATE, \'%m%d\') < DATE_FORMAT(birthday, \'%m%d\'))
                ) AS age
					FROM patients
					WHERE patients.id=' . $id;
				$result = $db->query($sql);
				$result->setFetchMode(PDO::FETCH_ASSOC);
				$patientItemAge = $result->fetch();

				$sql = '
					SELECT *
					FROM doctors
					LEFT JOIN doctors_patients 
					ON doctors.id = doctors_patients.doctor_id
					WHERE doctors_patients.patient_id=' . $id;
				$result = $db->query($sql);
				$result->setFetchMode(PDO::FETCH_ASSOC);

				$i = 0;
				while ($row = $result->fetch()) {
					$doctorsList[$i]['id'] = $row['id'];
					$doctorsList[$i]['doc_position'] = $row['doc_position'];
					$doctorsList[$i]['last_name'] = $row['last_name'];
					$doctorsList[$i]['first_name'] = $row['first_name'];
					$doctorsList[$i]['patronymic'] = $row['patronymic'];
					$i++;
				}

			}
			return array($patientItem, $doctorsList, $patientItemAge);
		}

		//Change patient name
		public static function setPatientName($id, $name)
		{
			$db = Db::getConnection();
			$sql = '
				UPDATE `patients` 
				SET `first_name`= "' . $name . '"
				WHERE id=' . $id;
			$result = $db->query($sql);
			if ($result) {
				echo 'Имя успешно изменено. Новое имя:  ' . $name;
			}
		}
	}