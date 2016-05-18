<html>
<html>
<head>
<title>Proyecto GIR</title>
</head>
<body>

<h1>FINANCIA TUS SUENOS E INVIERTE EN EL FUTURO</h1> 




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

//Formulario para agregar un proyecto
echo'<form action="aviso_satis.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>Nombre del proyecto: </td><td><input type="text" name="nombre" />*</td></tr>
<tr><td>Categoria: </td><td><select>
  <option value="animales">Animales</option>
  <option value="deporte">Deportes</option>
  <option value="medioambiente">Medioambiente</option>
  <option value="energia">Energia</option>
		<option value="educación">Educacion</option>
		<option value="recreación">Recreacion</option>
		<option value="tecnología">Tecnologia</option>
</select>*</td></tr>
		<tr><td>Telefono del contacto: </td><td><input type="text" name="telefono" />*</td></tr>
		<tr><td>Monto requerido: </td><td><input type="text" name="monto" />*</td></tr>
		<tr><td>Detalles del proyecto:</td><td>
	<textarea rows="3" name="detalles_proyecto"></textarea>

	</td>
</tr>
		 <tr><td></td><td><p><input name=enviardatos type="submit" /></p></td><td></td></tr>
		<tr><td> </td><td> *Campos obligatorios </td></tr>
		
		</table>';

// Show the page footer
echo $OUTPUT->footer();
?>