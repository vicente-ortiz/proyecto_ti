<html>
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
// This file is part of Moodle - http://moodle.org/
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


include_once 'config.inc.php';
if (isset($_POST['subir'])) {
	$nombre = $_FILES['archivo']['name'];
	$tipo = $_FILES['archivo']['type'];
	$tamanio = $_FILES['archivo']['size'];
	$ruta = $_FILES['archivo']['tmp_name'];
	$destino = "archivos/" . $nombre;
	if ($nombre != "") {
		if (copy($ruta, $destino)) {
			$titulo= $_POST['titulo'];
			$descri= $_POST['descripcion'];
			$db=new Conect_MySql();
			$sql = "INSERT INTO tbl_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";
			$query = $db->execute($sql);
			if($query){
				echo "Se guardo correctamente";
			}
		} else {
			echo "Error";
		}
	}
}


//Form to add a project, in the form its necessary to complete with the name of the project, phone, quantity of money, details of the project
echo'<form action="aviso_satis.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>Nombre del proyecto: </td><td><input title="Se necesita un nombre" type="text" name="name" required/>*</td></tr>
<tr><td>Categoria: </td><td><select>
  <option value="select" selected="selected">Selecciona la categoria</option>
				<option value="animals">Animales</option>
  <option value="sport">Deportes</option>
  <option value="ambiental">Medioambiente</option>
  <option value="energy">Energia</option>
		<option value="education">Educacion</option>
		<option value="recreation">Recreacion</option>
		<option value="tecnhology">Tecnologia</option>
</select>*</td></tr>
		<tr><td>Telefono del contacto: </td><td><input type="tel" name="telephone" required/>*</td></tr>
		<tr><td>Email: </td><td><input type="text" name="mail" required/>*</td></tr>
		<tr><td>Detalles del proyecto:</td><td>
	<textarea rows="5" cols="40" name="details"></textarea>
<tr><td>Monto requerido: </td><td><input type="text" name="amount" required/>*</td></tr>
	</td>
</tr>
		 <tr><td></td><td><p><input name=sendata type="submit" /></p></td><td></td></tr>
		<tr><td> </td><td> *Campos obligatorios </td></tr>
		
		</table>';
 




// Show the page footer
echo $OUTPUT->footer();
?>