<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/template/css/bootstrap.min.css">
	<title>Список пациентов доктора</title>
</head>
<body>

<?php include_once ROOT . '/views/header.php' ?>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h3>
					<?= $doctorsData[0]['last_name'] ?> <?= $doctorsData[0]['first_name'] ?> <?= $doctorsData[0]['patronymic'] ?>
					&#150; <?= $doctorsData[0]['doc_position'] ?></h3>
			</div>
			<div>

				<form method="post" action="/doctor/update/<?= $doctorsData[0]['id'] ?>">
					<p>
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						Изменить имя врача:
					</p>
					<input type="text" placeholder="Введите новое имя" name="name" id="name">
					<input type="hidden" name="id" value="<?php $doctorsData[0]['id'] ?>">
					<input type="submit" id="submit" name="submit" value="Изменить">
				</form>

			</div>
		</div>
		<div class="row">
			<div class="col-md-16">
				<table class="table table-striped table-hover">
					<caption>Список пациентов</caption>

					<thead>
					<tr>
						<th>Имя</th>
						<th>Фамилия</th>
						<th>Отчество</th>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($doctorsData[1] as $doctorItem) : ?>
						<tr>
							<td><?php echo $doctorItem['last_name']; ?></td>
							<td><?php echo $doctorItem['first_name']; ?></td>
							<td><?php echo $doctorItem['patronymic']; ?></td>
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
