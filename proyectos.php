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

//P�gina donde hay botones para poder ver y agregar proyectos.
echo '<form action="ver_proyectos.php" method="post" >
		<input type="submit"   value="Ver Proyectos" /></form><br>
        <form name="boton_agregar" action="agregar_proyectos.php" method="POST">
		<input type="submit"    value="Agregar Proyectos" /></form>';   




// Show the page footer
echo $OUTPUT->footer();
?>