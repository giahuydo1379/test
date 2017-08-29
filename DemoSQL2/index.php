<html>
<head>
	<title>My Webste</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

		?>
                  
		<div class = "panel panel-danger" align="center" style="width: 800px" > 
			<div class = "panel-heading" style="font-size: 3em">LIST </div>

			<table id="t01" border="2px" align="center" class = "table">
				<tr style="font-size: 1.5em">
					<th><span class="label label-success" >ID</span></th>
					<th><span class="label label-success">Name</span></th> 
					<th><span class="label label-success">Image</span></th>
				</tr>
				<?php
				

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "db549595537";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$begin = ($paginator->pageIndex - 1)* $paginator->totalRecordOnepage ;

				$sql = "SELECT COUNT(DISTINCT OC.category_id) total,OC.category_id,`name`,image
				FROM oc_category OC, oc_category_description OD
				WHERE OC.category_id  = OD.category_id";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
			// output data of each row

					while($row = $result->fetch_assoc()) {
						$paginator->total = $row["total"];
					}

				} else {
					echo "0 results";
				}

				$n = $paginator->total / $paginator->totalRecordOnepage;

				if($paginator->total % $paginator->totalRecordOnepage != 0){
					$n++;
				}
				$n = (int)$n;
				if($paginator->pageIndex > $n){
					$paginator->pageIndex = $n;
				}


				$sql1 = "SELECT DISTINCT OC.category_id,`name`,image
				FROM oc_category OC, oc_category_description OD
				WHERE OC.category_id  = OD.category_id
				LIMIT $begin,$paginator->totalRecordOnepage";
				$result = $conn->query($sql1);

				if ($result->num_rows > 0) {
			// output data of each row

					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["category_id"]."</td>";
						echo "<td>".$row["name"]."</td>";
						echo "<td>".$row["image"]."</td>";
						?>
						<td>						
							<form class="navbar-form navbar-left" role="search" action="" method="post">
								<button type="submit" class="btn btn-success" name="update">Update</button>
								<button type="submit" class="btn btn-danger" name="delete">Delete</button>
							</form>
						</td>
						<?php	
						echo "</tr>";		
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			//echo $paginator->createLink($showPage,$n);
				?>
			</table>
		</div>

		<?php echo $paginator->createLink($showPage,$n); ?>
		<form class="navbar-form navbar-left" role="search" action="" method="post">
			<!--	<input type="submit" name = "insert" value="Insert" class="btn btn-info">  -->
			<button type="submit" class="btn btn-info" name="insert">Insert</button>
		</form>
		<?php ?>
</body>
</html>
