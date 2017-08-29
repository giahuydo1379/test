<html>
    <head>
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


//$totalItemPage=3;
//$page=1;


        $sql = "SELECT DISTINCT OC.category_id,`name`,image
				FROM oc_category OC, oc_category_description OD
				WHERE OC.category_id  = OD.category_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo " <table class=\"table\" style=\"width:100%\">";
            //  echo "<table style=\"width:100%\">";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th> ";
            echo "<th>Image</th> ";
            echo " </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["category_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["image"] . "</td>";
                echo "</tr>";
                //   echo "id: " . $row["category_id"] . " - Image: " . $row["image"] . "<br>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $paginator = new Paginator();
        $paginator->total = 20;
        $paginator->page = 1;
        $paginator->limit = 5;
        echo $paginator->createLinks(2, 'pagination pagination-sm');
        $conn->close();
        ?>
    </body>

</html>
