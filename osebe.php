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
			$neki="DELETE FROM osebe WHERE ID_Osebe='$idd'";

		//	$zbrisi=$conn->query($neki);
			if ($conn->query($neki) === TRUE) {
				echo "Record deleted successfully";
			} else {
					echo "Error deleting record: " . $conn->error;
			}
}
$file='glasba.mp3';?>
<embed src="<?php echo $file?>" autostart="true" loop="true"
width="2" height="0">
</embed><?php
echo "";
//$conn->close();
?>
<p>
<a href="koledar.php">Dogodki</a>
<h1>Imenik oseb:</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<table>
<tr>
	<th>Ime:</th>
	<th>Priimek:</th>
	<th>Naslov:</th>
	<th>Telefon:</th>
	<th>Email:</th>
	<th>Datum rojstva:</th>
	<th>Facebook:</th>
	<th>Opombe:</th>
	
	
</tr>
<tr>
	<td><input type="text" name="ime"></td>
	<td><input type="text" name="priimek"></td>
	<td><input type="text" name="naslov"></td>
	<td><input type="text" name="tel"></td>
	<td><input type="email" name="mail"></td>
	<td><input type="date" name="datum" value="<?php echo date('d-m-Y'); ?>" /></td>
	<td><input type="url" name="fb"></td>	
	<td><input type="text" name="opombe"></td>	
	<td><input type="submit" name="naprej" value="Dodaj" ></td>
	<td><input type="submit" name="iskanje" value="Isci" ></td>
<tr>
</table>
</form>

<?php

if(isset($_POST['naprej'])){
$ime=mysqli_real_escape_string($conn,$_POST['ime']);
$priimek=mysqli_real_escape_string($conn,$_POST['priimek']);
$naslov=mysqli_real_escape_string($conn,$_POST['naslov']);
$tel=mysqli_real_escape_string($conn,$_POST['tel']);
$mail=mysqli_real_escape_string($conn,$_POST['mail']);
$datum=mysqli_real_escape_string($conn,$_POST['datum']);
$fb=mysqli_real_escape_string($conn,$_POST['fb']);
$opombe=mysqli_real_escape_string($conn,$_POST['opombe']);
//$datum = date('d-m-Y', strtotime($_POST['datum']));
$vstavi= "INSERT into osebe (ime,priimek,naslov,telefonska,email,rojstni_datum,facebook,opombe) 
VALUES ('$ime', '$priimek', '$naslov','$tel', '$mail', '$datum', '$fb', '$opombe')";
	if ($conn->query( $vstavi) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $vstavi . "<br>" . $conn->error;
}
}
if(isset($_POST['iskanje'])){
	$ime=mysqli_real_escape_string($conn,$_POST['ime']);
$priimek=mysqli_real_escape_string($conn,$_POST['priimek']);
$naslov=mysqli_real_escape_string($conn,$_POST['naslov']);
$tel=mysqli_real_escape_string($conn,$_POST['tel']);
$mail=mysqli_real_escape_string($conn,$_POST['mail']);
$datum=mysqli_real_escape_string($conn,$_POST['datum']);
$fb=mysqli_real_escape_string($conn,$_POST['fb']);
$opombe=mysqli_real_escape_string($conn,$_POST['opombe']);
	$iskano="SELECT * FROM osebe WHERE ime='$ime' OR priimek='$priimek' OR naslov='$naslov' OR telefonska='$tel' OR email='$mail' OR rojstni_datum='$datum' OR facebook='$fb' OR opombe='$opombe'";
	$rezultatIskanja= $conn->query($iskano);
	?> 
	<h3> Iskana oseba: </h3>
	<table>
	<tr>
	<th>ID:</th>
	<th>Ime:</th>
	<th>Priimek:</th>
	<th>Naslov:</th>
	<th>Telefon:</th>
	<th>Email:</th>
	<th>Datum rojstva:</th>
	<th>Facebook:</th>
	<th>Opombe:</th>
	
	
</tr>
	<?php
	if ($rezultatIskanja->num_rows > 0) {
    // output data of each row
    while($row = $rezultatIskanja->fetch_assoc()) {
        ?> 
		<tr>
			<td><?php echo $row["ID_Osebe"]?></td>
			<td><?php echo $row["ime"]?></td>
			<td><?php echo $row["priimek"]?></td>
			<td><?php echo $row["naslov"]?></td>
			<td><?php echo $row["telefonska"]?></td>
			<td><?php echo $row["email"]?></td>
			<td><?php echo $row["rojstni_datum"]?></td>
			<td><a href="<?php echo $row["facebook"]?>"><?php echo $row["ime"];echo " ";echo $row["priimek"]?></a></td>
			<td><?php echo $row["opombe"]?></td>
		</tr>
		<?php
		//"id: " . $row["id"]. " - Ime dogodka: " . $row["ime_dogodka"]. " " . $row["lastname"]. "<br>";
    }
	?> </table></br></br></br><?php
} else {
    echo "0 results";
}
}
$sql = "SELECT * FROM osebe";
$result = $conn->query($sql);
?> 
<table>
<h3> Vse osebe: </h3>
<tr>
	<th>ID:</th>
	<th>Ime:</th>
	<th>Priimek:</th>
	<th>Naslov:</th>
	<th>Telefon:</th>
	<th>Email:</th>
	<th>Datum rojstva:</th>
	<th>Facebook:</th>
	<th>Opombe:</th>
</tr>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?> 
		<tr>
			<td><?php echo $row["ID_Osebe"]?></td>
			<td><?php echo $row["ime"]?></td>
			<td><?php echo $row["priimek"]?></td>
			<td><?php echo $row["naslov"]?></td>
			<td><?php echo $row["telefonska"]?></td>
			<td><?php echo $row["email"]?></td>
			<td><?php echo $row["rojstni_datum"]?></td>
			<td><a href="<?php echo $row["facebook"]?>"><?php echo $row["ime"];echo " ";echo $row["priimek"]?></a></td>
			<td><?php echo $row["opombe"]?></td>
		</tr>
		<?php
		//"id: " . $row["id"]. " - Ime dogodka: " . $row["ime_dogodka"]. " " . $row["lastname"]. "<br>";
    }
	?> </table><?php
} else {
    echo "0 results";
}

?>
Vpisite id osebe ki jo zelite izbrisati
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

<input type="text" name="id">
<input type="submit" name="izbrisi" value="Izbrisi" ></td>

</form>

<?php

require("graf.php");
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
