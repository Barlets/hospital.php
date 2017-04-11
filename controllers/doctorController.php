<?php

	include_once ROOT . '/models/doctors.php';

	class doctorController
	{
		public function actionView($id)
		{
			//echo __METHOD__;
//			echo '<br><br>Информация о пациентах доктора';

			if ($id) {
				$doctorsData = Doctors::getPatients($id);
//
//				echo '<pre>';
//				print_r($doctorsData);
//				echo '</pre>';

				require_once(ROOT . '/views/doctor.php');
			}
			return true;
		}

		public function actionUpdate($id)
		{
			//echo __METHOD__;
			if ($id) {
				$name = $_POST['name'];
				$doctorsName = Doctors::setDoctorName($id, $name);

				$this->actionView($id);
			}
			return true;
		}

	}