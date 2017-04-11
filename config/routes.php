<?php

	return array(

		 'doctor/([0-9]+)'         => 'doctor/view/$1',
		 'doctor/update/([0-9]+)'  => 'doctor/update/$1',
		 'patient/([0-9]+)'        => 'patient/view/$1',
		 'patient/update/([0-9]+)' => 'patient/update/$1',
		 ''                        => 'index/view',
	);