<?php

include_once("db.php");

$sql = $pdo->prepare("SELECT name, image FROM products WHERE name LIKE ?");
$sql->execute([ "%".$_POST["query"]."%" ]);

$data = [];

foreach ($sql as $s) {
	array_push($data, $s);
}

echo json_encode( $data );

?>