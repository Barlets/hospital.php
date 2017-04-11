<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/template/css/bootstrap.min.css">
	<title>Сайт больницы</title>
</head>
<body>

<?php include_once ROOT . '/views/header.php'?>

<section class="content">
	<div class="container">
		<div class="row">

			<div class="col-md-6">

				<table class="table table-striped table-hover" id='sort_1'>
					<caption>Список Докторов</caption>

					<thead>
					<tr>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Пациенты</th>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($doctorsList as $doctorItem) : ?>
						<tr>
							<td><?php echo $doctorItem['last_name']; ?></td>
							<td><?php echo $doctorItem['first_name']; ?></td>
							<td><?php echo $doctorItem['patronymic']; ?></td>
							<td><a class="btn" href="/doctor/<?= $doctorItem['id']; ?>">Подробнее</td>
						</tr>
					</a>
					<?php endforeach; ?>

					</tbody>
				</table>


			</div>

			<div class="col-md-6">
				<table class="table table-striped table-hover" id='sort_2'>
					<caption>Список пациентов</caption>

					<thead>
					<tr>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Доктора</th>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($patientsList as $patientItem) : ?>
						<tr>
							<td><?php echo $patientItem['last_name']; ?></td>
							<td><?php echo $patientItem['first_name']; ?></td>
							<td><?php echo $patientItem['patronymic']; ?></td>
							<td><a class="btn" href="/patient/<?= $patientItem['id']; ?>" >Подробнее</a></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<hr>
	</div>
</section>

<footer>

</footer>

<script src="/template/js/jquery-3.1.1.min.js"></script>
<script src="/template/js/jquery.tablesorter.js"></script>
<script src="/template/js/js.js"></script>

</body>
</html>
