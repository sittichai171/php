
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    //$( "#datepicker" ).datepicker();
	$( ".datepicker2" ).datepicker();
  } );
  </script>
</head>
<body>
 <form method="post" action="selectDate.php">
<p>Date: <input type="text" class="datepicker2" name="txtdate" id="datepicker"></p>
<p>Date: <input type="text" class="datepicker2" name="txtdate2" id="datepicker2"></p>
<input type="submit" value="OK">
</form>
 
 <?php
 if(isset($_POST["txtdate"])){
	 
$dateget = $_POST["txtdate"];
$dateget2 = $_POST["txtdate2"];
//echo $wdate = str_replace("/","-",$dateget);
$date = $dateget;
list($month, $day, $year) = split('[/.-]', $date);
$wdate = "$year-$month-$day";
list($month2, $day2, $year2) = split('[/.-]', $dateget2);
$wdate2 = "$year2-$month2-$day2";
	 
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM date WHERE date_data between '$wdate 22:00:00' and '$wdate2 23:59:59'";
//$sql = "SELECT * FROM date WHERE date_data >= '2016-09-05 22:04:56' AND date_data <= '2016-09-05 22:06:37'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["date_data"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
 }
?>
</body>
</html>
