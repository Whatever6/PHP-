

<!DOCTYPE html> 
<html> 
    <head> 
        <script src="lib/js/jquery.min.js"></script> 
        <script src="lib/js/chartphp.js"></script> 
        <link rel="stylesheet" href="lib/js/chartphp.css">
		<script src="lib/js/jquery.min.js"></script>
<script src="lib/js/chartphp.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="lib/js/chartphp.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
	$opombe =$conn->prepare("SELECT* FROM Osebe WHERE opombe=''");
	$opombe->execute();
	$opombe->store_result();
	$opombeSt=$opombe->num_rows;

	
	$opombeNe =$conn->prepare("SELECT* FROM Osebe WHERE opombe!=''");
	$opombeNe->execute();
	$opombeNe->store_result();
	$opombeNeSt=$opombeNe->num_rows;

/** 
 * Charts 4 PHP 
 * 
 * @author Shani <support@chartphp.com> - http://www.chartphp.com
 * @version 1.2.3 
 * @license: see license.txt included in package
 */ 
include("lib/inc/chartphp_dist.php");

$p = new chartphp(); 
$p->data = array(array(array("Nimamo opomb",$opombeNeSt),array("Imamo opombe",$opombeSt)));
//$p->data = array(array("Nimamo opomb",$opombeNe),array("Imamo opombe",$opombe));
$p->chart_type = "pie"; 

// Common Options 
$p->title = "Za koliko ljudi imamo opombe"; 


$out = $p->render('c1'); 
?> 
    </head> 
    <body> 
        <div style="width:40%; min-width:450px;"> 
            <?php echo $out; ?> 
        </div> 
    </body> 
</html> 