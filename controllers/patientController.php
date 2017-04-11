<?php

	include_once ROOT . '/models/patients.php';

	class patientController
	{
		public function actionView($id)
		{
			//echo '<br><br>Информация о пациенте';

			if ($id) {
				$patientsData = Patients::getDoctors($id);

//				echo '<pre>';
//				print_r($patientItem);
//				echo '</pre>';

				require_once(ROOT . '/views/patient.php');
			}
			return true;
		}

		public function actionUpdate($id)
		{
			//echo __METHOD__;
			if ($id) {
				$name = $_POST['name'];
				$patientsName = Patients::setPatientName($id, $name);

				$this->actionView($id);
			}
			return true;
		}
	}