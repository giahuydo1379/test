<!--Paginator có giới hạn số trang hiển thị -->
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
	$paginator = new Paginator();
	$paginator->totalRecordOnepage = 10;
	$paginator->total = 67;

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
	// $n là tổng sô trang
	$n = $paginator->total / $paginator->totalRecordOnepage;

	if($paginator->total % $paginator->totalRecordOnepage != 0){
		$n++;
	}
	$n = (int)$n;
	echo $paginator->createLink($showPage, $n);

	?>
</body>
</html>