<!doctype HTML>

<html>
	<head>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  
		  
	<script
	  src="https://code.jquery.com/jquery-3.1.1.min.js"
	  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	  crossorigin="anonymous" >
	</script>

	<style>
		h3  {
			text-align: center;
		}

		.btn  {
			display: flex;
			margin: 0 auto;
		}

		#ans  {
			font-size: 30px;
			background-color: black;
			color: red;
			text-align: center;
			margin-top:50px;
			display: block;
		}

		.butns  {
			display: flex;
		}
	</style>

	<script>
		// $(document).ready(function()  {	
		// 	$('#check').click(function(e)  {
		// 		alert('hola');
		// 		e.prevent

		// 		$.ajax({
		// 						           type: "GET",
		// 						           data: $("#formData").serialize(), // serializes the form's elements.
		// 						           success: function(data)
		// 							           {
		// 							               alert(data); // show response from the php script.
		// 							           		// alert("hola");
		// 							           }
		// 						});
		// 	})
		// });
	</script>

	</head>

	<body>
		<?php include "nav.php" ?>

		<div class="container">
			<h1><u>Answer 2 : </u></h1>
			<h3>Count Max Number of words in a paragraph</h3>
			<br><br><br><br>
			<form id="formData" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
				<label for="textinput">Enter Text : </label>
				<textarea type="text" id="textinput" name="textinput" class="form-control"  placeholder="Enter Text"> </textarea><br>

				<div class="butns">
					<button id="check" class="btn btn-default" type="submit">Submit </button>
					<button id="checks" class="btn btn-default" type="reset">Reset </button>
				</div>
			</form>
				<?php

				if(isset($_GET['textinput']))  {
					// echo "lola";
					function multiexplode ($delimiters,$string) {
	    			    $ready = str_replace($delimiters, $delimiters[0], $string);
					    $launch = explode($delimiters[0], $ready);
					    return  $launch;
					}

					$string = $_GET['textinput'];
					$exploded = multiexplode(array("?","!","."),$string);
					// print_r($exploded);

					$arr = []; 
					$i = 0;
					foreach ($exploded as $value) {
						// echo substr_count($value, " ");
						$arr[$i] = substr_count($value, " ");
						// var_dump($arr);
						// echo "<br>";
						$i++;
					}
					$arr[0] = $arr[0]+1;
					// echo $arr[0];

					echo '<span id="ans">Max Number of words : '.max($arr);

				}

			 ?>
							</span>
	</body>
</html>