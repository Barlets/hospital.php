<?php

	include_once ROOT . '/models/index.php';

	class indexController
	{
		public function actionView()
		{
			//echo '<br><br>Список всех докторов';

			$doctorsList = array();
			$doctorsList = Index::getAllDoctors();

			//echo '<pre>';
			//print_r($doctorsList);
			//echo '</pre>';

			//echo '<br><br>Список всех пациентов';

			$patientsList = array();
			$patientsList = Index::getAllPatients();

			//echo '<pre>';
			//print_r($patientsList);
			//echo '</pre>';

			require_once(ROOT . '/views/index.php');

			return true;
		}
	}