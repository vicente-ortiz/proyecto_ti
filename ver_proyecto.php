<html>
<head>
<title>Proyecto GIR</title>
</head>
<body background="portada4.png">

<tr>

		<td><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		CROWDFUNDING PARA PROYECTOS</h1></td>
		
		<td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</h4>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<a href='inicio.php'>INICIO</a></td>

		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='proyectos.php'>PROYECTOS</a></td>
</tr>



</body>
</html>
<?php
// This file is pa rt of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package local
 * @subpackage crowfounding
 * @copyright 2012-onwards Vicente Ortiz <vortiz@alumnos.uai.cl>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// Minimum for Moodle to work, the basic libraries
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');



// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);

// Check that user is logued in the course.
require_login();

// Page navigation and URL settings.
$PAGE->set_pagelayout('incourse');


// Show the page header
echo $OUTPUT->header();
if(empty($_GET['id'])==true){
$id=$_POST['id'];
}else{
	$id = $_GET['id'];
}
//Conection to DataBase
$ServerName="localhost";
$UserName="root";
$Password="";
$DBname="moodle";
$Conn = new mysqli($ServerName,$UserName,$Password,$DBname);
$Sql1="SELECT `name`,`content`,`needmoney`,`gatheredmoney` FROM `mdl_add_project` WHERE `id` = $id";
$Result1= $Conn->query($Sql1);
while($Row = $Result1->fetch_assoc()){
	$content= $Row["content"];
	$name = $Row["name"];
	$money_needed = $Row["needmoney"];
	$money_gathered = $Row["gatheredmoney"];
}
if(empty($_POST['support'])==true){
	$support = 0;
}else{
	$support = $_POST['support'];
	$money_supported = $support + $money_gathered;
	$Sql3="UPDATE `mdl_add_project` SET `gatheredmoney`= $money_supported WHERE `id` = $id";
	$Result3= $Conn->query($Sql3);
}
$percentage = 100*(($support + $money_gathered)/$money_needed);
//Page where are buttons to view and add projects.
	echo "<!DOCTYPE html>
<html lang='en'>
<meta charset='utf-8'>
<meta name='viewport'' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<div class='col-md-8'>
		<center><h2>$name</h2></center><br>
		<p>$content</p>
</div>
<div class='col-md-4'>
<br><br><br>
<h5>Progreso Monetario del proyecto:</h5>
<br>
<div class='progress'>
  <div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: $percentage%;'>
    <center>$percentage%</center>
  </div>
</div>
<form action='ver_proyecto.php' method='POST' enctype='multipart/form-data'>
<table>
<tr><td><select name='support'>
  <option value='select' >Seleccione el monto</option>
				<option value='5000'>5.000</option>
  <option value='10000'>10.000</option>
  <option value='50000'>50.000</option>
  <option value='100000'>100.000</option>
		<option value='200000'>200.000</option>
		<option value='250000'>250.000</option>
		<option value='300000'>300.000</option>
</select>*</td></tr>
	 <tr><td><button type='submit' class='btn btn-WARNING'>Aportar</button></td></tr>
		</table>
		<input type='hidden' name='id' value='$id'/> 
		</form>
</div>
<form action='contacto.php' method='POST'>
<button type='submit' class='btn btn-danger'>Contactar</button>
<input type='hidden' name='id' value='$id'/>
</form>
</html>";
// Show the page footer
echo $OUTPUT->footer();
?>