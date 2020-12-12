<!DOCTYPE HTML>
<html>

<head>
	<link rel="stylesheet" href="assets/css/magicsuggest-min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
	<h1 class="text-center">JQuery ile Autocomplate</h1>
	<hr class="mb-5">
	<center>
		<div class="w-50">
			<div id="magicsuggest"></div>
		</div>
	</center>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="assets/js/magicsuggest-min.js"></script>

<script>
	$(function() {
		$('#magicsuggest').magicSuggest({
			data: 'api/transactions.php',
			allowDuplicates: false,
			allowFreeEntries: false,
			maxSuggestions: 3,
			minChars: 3,
			noSuggestionText: "Eşleşen Sonuç Bulunamadı.",
			placeholder: "Bir Ürün Arayın...",
			method: "post",
			renderer: function(data) {
				return '<div class="result">' +
				'<div class="name" style="width: calc(100% - 102px); float: left; height: 50px;"><img src="assets/uploads/' + data.image + '" class="result_image"/>' + data.name + '</div>' +
				'<div class="wishlist" style="display: inline-block; font-size: 11px; float: right; height: 50px; text-align: center; line-height: 50px;color: #d1d1d1"></div>' +
				'<div style="clear:both;"></div>' +
				'<div style="clear:both; border-bottom: 1px solid #f5f5f5"></div>' +
				'</div>';

				data = "";
			}
		});

	});
</script>
</html>