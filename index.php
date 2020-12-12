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
	$base_url = window.location.origin + "/autocomplate/"; //Base URL. E.g https://hasanberkm.com/autocomplate
	$ms = ""; //For MagicSuggest

	//Starting Magicsuggest Plugin
	//The search bar will be automatically added to Magicsuggest
	$(function() {
		$ms = $('#magicsuggest').magicSuggest({
			data: 'api/transactions.php', //API URL
			method: "post", //Method
			allowDuplicates: false, //Disallow re-enter the same entry multiple times.
			allowFreeEntries: false, //Don't let the user enter a value other than the recommended values
			maxSuggestions: 2, //How many values at most should be displayed in the textarea?
			noSuggestionText: "Eşleşen Sonuç Bulunamadı.", //Use this attribute to show a message when there are no suggestions.
			placeholder: "Bir Ürün Arayın...", //Use this attribute to show a placeholder in MagicSuggest textarea.
			minChars: 2, //Minimum number of characters to enter

			//Sets the helper message for input that is too short of the minChars attribute.
			minCharsRenderer: function(v){
				return 'Lütfen en az ' + v + " karakter daha girin.";
			},
			
			//Render the plugin.
			//'data' variable in the function holds the result.
			renderer: function(data) {
				return '<a href="' + $base_url + 'result.php?s=' + data.name + '"><div class="result">' +
				'<div class="name" style="width: calc(100% - 102px); float: left; height: 50px;"><img src="assets/uploads/' + data.image + '" class="result_image"/>' + data.name + '</div>' +
				'<div class="wishlist" style="display: inline-block; font-size: 11px; float: right; height: 50px; text-align: center; line-height: 50px;color: #d1d1d1"></div>' +
				'<div style="clear:both;"></div>' +
				'<div style="clear:both; border-bottom: 1px solid #f5f5f5"></div>' +
				'</div></a>';

				data = "";
			}
		});

		//Redirect to Result Page with the searched word when ENTER key is pressed.
		$($ms).on('selectionchange', function(){
			window.location.href = $base_url +  'result.php?s=' + $ms.getData()[0].name;
		});
	});
</script>
</html>