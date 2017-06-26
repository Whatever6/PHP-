<?php
session_start();

?>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DSR";

// Create connection
$conn =new  mysqli($servername, $username, $password, $dbname);

// Check connection
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

		if(isset($_POST['izbrisi'])){
			$idd=$_POST['id'];
			$neki="DELETE FROM Dogodki WHERE ID_Dogodki='$idd'";

		//	$zbrisi=$conn->query($neki);
			if ($conn->query($neki) === TRUE) {
				echo "Record deleted successfully";
			} else {
					echo "Error deleting record: " . $conn->error;
			}
}

//$conn->close();
?>
<p>
<a href="osebe.php">Osebe</a>
</p></br>
<h1>Koledar:</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<table>
<tr>
	<th>Ime dogodka:</th>
	<th>Datum dogodka:</th>
	<th>Kraj dogodka:</th>
	
</tr>
<tr>
	<td><input type="text" name="ime"></td>
	<td><input type="date" name="datum" value="<?php echo date('d-m-Y'); ?>" /></td>
	<td><input type="text" name="kraj"></td>	
	<td><input type="submit" name="naprej" value="Dodaj" ></td>
<tr>
</table>
</form>

<?php

if(isset($_POST['naprej'])){
$ime=mysqli_real_escape_string($conn,$_POST['ime']);
//$datum = date('d-m-Y', strtotime($_POST['datum']));
$datum=mysqli_real_escape_string($conn,$_POST['datum']);

$kraj = mysqli_real_escape_string($conn,$_POST['kraj']);
/*if (mysqli_query($conn,"INSERT into Dogodki (ime_dogodka, datum, lokacija) VALUES ('$ime', '$datum', '$kraj')")) {
    printf("%d Row inserted.\n", mysqli_affected_rows($conn));
}*/

/*if($ime && $datum && $kraj){
	$preglej=$conn->query("SELECT * FROM Dogodki WHERE ime_dogodka='$ime'AND datum='$datum', lokacija='$kraj'");
	$stvrst=mysqli_num_rows($preglej);
	if ($stvtrst>0){	
		
*/
		$vstavi= "INSERT into Dogodki (ime_dogodka, datum, lokacija) VALUES ('$ime', '$datum', '$kraj')";
	


if ($conn->query( $vstavi) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $vstavi . "<br>" . $conn->error;
}
}
$sql = "SELECT * FROM Dogodki";
$result = $conn->query($sql);


?> 

<table>
<tr>
	<th> ID:</th>
	<th> Ime dogodka: </th>
	<th> Datum dogodka </th>
	<th> Lokacija dogodka:</th>
</tr>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?> 
		<tr>
			<td><?php echo $row["ID_Dogodki"]?>
			<td><?php echo $row["ime_dogodka"]?>
			<td><?php echo $row["datum"]?>
			<td><?php echo $row["lokacija"]?>
		</tr>
		<?php
		//"id: " . $row["id"]. " - Ime dogodka: " . $row["ime_dogodka"]. " " . $row["lastname"]. "<br>";

	}
	?> </table><?php
} else {
    echo "0 results";
}

?>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

<input type="text" name="id">
<input type="submit" name="izbrisi" value="Izbrisi" ></td>

</form>
<?php

$conn->close();



?>
</body>
<!--
$vstavi = "INSERT INTO Dogodki (ime_dogodka, datum, lokacija)
VALUES (?,?,?)";
		$stmt = mysqli_prepare($conn, $vstavi);
		mysqli_stmt_bind_param($stmt, 'sss', $ime, $datum, $kraj);
		mysqli_stmt_execute($stmt);

echo($_POST['ime']);
echo($_POST['kraj']);

echo $datum;
		// preverjanje rezultatov .... (kaj vrne PB ob vstavljanju)
		if (mysqli_stmt_affected_rows($stmt) == 1) {
			echo '<p>The artist has been added.</p>';
			$_POST = array();
		} else { // izpis v primeru napak
			$error = 'The new artist could not be added to the database!';
		}
		// zapiranje - optimizacija
		mysqli_stmt_close($stmt);
		mysqli_close($conn); -->
</html>
