<?php
//Check the data and check if the data is null.
if(isset($_GET["s"]) && strlen($_GET["s"]) > 0)
{
	?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<link rel="stylesheet" href="assets/css/magicsuggest-min.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>

	<body>
		<h1 class="text-center mb-5 mt-5"><u class="text-primary"><?= $_GET["s"]; ?></u> ile ilgili sonuçlar</h1>
		<div class="container">
			<div class="card-deck">
				<?php
				include_once("api/db.php");

				$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
				$stmt->execute([ "%". ($_GET["s"]=='all'?'':$_GET["s"]) ."%" ]);

				foreach ($stmt as $search)
				{
					?>
					<div class="card">
						<img class="card-img-top" src="assets/uploads/<?= $search['image']; ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?= $search['name']; ?></h5>
							<p class="card-text">Stoktaki Ürün: <?= $search['quantity']; ?></p>
						</div>
						<div class="card-footer">
							<small class="text-muted">Eklenme Tarihi: <?= date("d.m.Y", strtotime($search['created_date'])); ?></small>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</body>
	</html>
	<?php
}
else
{
	echo "Bir Sorun Oluştu.";
}
?>