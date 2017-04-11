<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/template/css/bootstrap.min.css">
	<title>Список докторов пациента</title>
</head>
<body>

<?php include_once ROOT . '/views/header.php' ?>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h3>
					<?= $patientsData[0]['last_name'] ?> <?= $patientsData[0]['first_name'] ?> <?= $patientsData[0]['patronymic'] ?>
					&#150;
					<?= $patientsData[2]['age'] ?> лет</h3>
			</div>
			<div>

				<form method="post" action="/patient/update/<?= $patientsData[0]['id'] ?>">
					<p>
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						Изменить имя пациента:
					</p>
					<input type="text" placeholder="Введите новое имя" name="name" id="name">
					<input type="hidden" name="id" value="<?php $patientsData[0]['id'] ?>">
					<input type="submit" id="submit" name="submit" value="Изменить">
				</form>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-hover">
					<caption>Список лечащих врачей</caption>

					<thead>
					<tr>
						<th>Должность</th>
						<th>Имя</th>
						<th>Фамилия</th>
						<th>Отчество</th>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($patientsData[1] as $patientItem) : ?>
						<tr>
							<td><?php echo $patientItem['doc_position']; ?></td>
							<td><?php echo $patientItem['last_name']; ?></td>
							<td><?php echo $patientItem['first_name']; ?></td>
							<td><?php echo $patientItem['patronymic']; ?></td>
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
</body>
</html>
