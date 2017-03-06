<!doctype HTML>

<?php include "retrieve.php" ?>

<!-- Coder Nilkamal Gotarne -->

<html>
	<head>
		<title>View Data</title>

		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  
		  

		  <script
			  src="https://code.jquery.com/jquery-3.1.1.min.js"
			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			  crossorigin="anonymous" >
		  </script>

		  <style>
		  
		  	h1  {
		  		text-align: center;
		  	}

		  	span  {
		  		color: red;
		  	}

		  	h3  {
		  		margin-left: 40px;
		  	}

		  	thead  {
		  		text-align: center;
		  	}

		  	td  {
		  		text-align: center;
		  	}

		  	span {
		  		text-decoration: underline;
		  		cursor: pointer;
		  	}
		  	
		  </style>

		  <script>
		  	$(document).ready(function() {
		  		$(".delete").click(function() {
		  			var id = this.id;
		  			// alert(id);
		  			$.ajax({
		  				type: "GET",
		  				url: "delete.php",
		  				data: {'id':id },
		  				success: function(data)
								           {
								               alert(data); // show response from the php script.
								           		// alert("hola");
								           		location.reload();
								           },
		  				// error: alert("Delete Error")

		  			})

		  		});

		  		$(".edit").click(function()  {
		  			var id = this.id;
		  			// alert(id);
		  			var url = 'index.php';
					var form = $('<form action="' + url + '" method="post">' +
					  '<input type="integer" name="id" value="' + id + '" />' +
					  '</form>');
					$('body').append(form);
					form.submit();
		  		});
		  	});
		  </script>
		  

		  </head>
	<body>
		<h3><u> Answer No: 1 </u></h3>
		<?php include "nav.php" ?>

		<div class="container">
		
		<h1>Registered Users</h1>
		<br>
		<div class="container">
			<table class="table table-striped" style="color:#3b009f">
				<thead>
					<tr style="background-color:#3b009f;color:white;">
						<td>First Name</td>
						<td>Last Name</td>
						<td>Email</td> 
						<td>Phone No.</td>
						<td>Location</td>
						<td></td>
					</tr>
				</thead>
				<?php
					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo 	"<tr>
					        			<td>".$row['firstname']."</td>
					        			<td>".$row['lastname']."</td>
					        			<td>".$row['email']."</td>
					        			<td>".$row['phone']."</td>
					        			<td>".$row['location']."</td>
					        			<td>
					        			<span id=".$row['ID']." class='edit' style='color:#3b009f' > Edit</span> |
					        			<span id=".$row['ID']." class='delete' style='color:#3b009f'> Delete</span></td>
					        		</tr>";
					    }
					} else {
					    echo "<tr> 0 results <tr>";
					}
				?>
			</table>
		</div>



			</table>
		</div>
		<?php $conn->close(); ?>
	</body>
</html>