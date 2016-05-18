<html>
<html>
<head>
<title>Proyecto GIR</title>
</head>
<body>

<td><h1>FINANCIA TUS SUENOS E INVIERTE EN EL FUTURO</h1></td>
<table>		
<tr>
<td><h4>Hola, Vicente </h4> </td>

</table>



</body>
</html>
<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software  Foundation, either version 3 of the License, or
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

// Parameter passed from the url.
//$name = required_param('name', PARAM_TEXT);

// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);

// Check that user is logued in the course.
require_login();


$PAGE->set_pagelayout('incourse');


// Show the page header
echo $OUTPUT->header();

//Tabla que muestra las opciones Inicio y Proyectos en la página de Inicio
echo "<tr>
		<td><a href='newfile1.php'>INICIO</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<td><a href='proyectos.php'>PROYECTOS</a></td>
		</tr>";




// Show the page footer
echo $OUTPUT->footer();
?>