<!DOCTYPE html>
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
	<?php
	require('./model/Paginator.php');
	use util\Paginator; 
	if(isset($_POST['update'])){
		?>
		<form class="navbar-form navbar-left" role="search" action="" method="post">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="ID" name = "idUpdate" ><br><br>
				<input type="text" class="form-control" placeholder="Name" name = "nameUpdate" ><br><br>
				<input type="text" class="form-control" placeholder="Image" name = "imageUpdate" ><br>
			</div>
			<br>
			<button type="submit" class="btn btn-info">Submit</button>
		</form>
		<?php
	}
	else if(isset($_POST['insert'])){
		?>
		<form class="navbar-form navbar-left" role="search" action="" method="post">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="ID" name = "idInsert" ><br><br>
				<input type="text" class="form-control" placeholder="Name" name = "nameInsert" ><br><br>
				<input type="text" class="form-control" placeholder="Image" name = "imageInsert" ><br>
			</div>
			<br>
			<button type="submit" class="btn btn-info">Submit</button>
		</form>
		<?php
	}
	else if(isset($_POST['idInsert']) && isset($_POST['nameInsert'])  && isset($_POST['imageInsert'])){
		if($_POST['idInsert'] == $_POST['nameInsert']  && $_POST['nameInsert'] == $_POST['imageInsert']){
			echo '<h2><span class="label label-success">Insert successful</span></h2>';		
		}
		else {
			echo '<h2><span class="label label-danger">Insert unsuccessful</span></h2>';
		}
	}
	else if(isset($_POST['idUpdate']) && isset($_POST['nameUpdate'])  && isset($_POST['imageUpdate'])){
		if($_POST['idUpdate'] == $_POST['nameUpdate']  && $_POST['nameUpdate'] == $_POST['imageUpdate']){
			echo '<h2><span class="label label-success">Update successful</span></h2>';		
		}
		else {
			echo '<h2><span class="label label-danger">Update unsuccessful</span></h2>';
		}
	}
	else{
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
				$paginator = new Paginator();
				$paginator->totalRecordOnepage = 5;
				if(isset($_GET['page'])){
					$paginator->pageIndex = $_GET['page'];		
				}
				else{
					$paginator->pageIndex = 1;
				}

				if(isset($_GET['show'])){
					$showPage = $_GET['show'];		
				}
				else{
					$showPage = 5;
				}

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
		<?php } ?>
	</body>
	</html>

