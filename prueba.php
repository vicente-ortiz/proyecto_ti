<?php
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . '/config.php');
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance ();
$PAGE->set_context ( $context );
// Check that user is logued in the course.
require_login ();
// Page navigation and URL settings.
$PAGE->set_url ( new moodle_url ( '/local/feria/FormularioProyecto.php' ) );
$PAGE->set_pagelayout("incourse");
$PAGE->set_title ( get_string ( "titulo", "local_feria" ) );
// Show the page header
// Here goes the content
echo $OUTPUT->header ();
// Formulario para subir el proyecto
echo '<form action="guardarProyecto.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>' . get_string ( "nombre_proyecto", "local_feria" ) . ': </td><td><input type="text" name="nombre" />*</td></tr>
<tr><td>' . get_string ( "descripcion", "local_feria" ) . ':</td><td><input type="text" name="descripcion" />*</td></tr>
<tr><td>' . get_string ( "categoria", "local_feria" ) . ':</td><td> <select name="categoria"/>
<option value="arte">' . get_string ( "arte", "local_feria" ) . '</option>
<option value="biologia">' . get_string ( "biologia", "local_feria" ) . '</option>
<option value="deporte">' . get_string ( "deporte", "local_feria" ) . '</option>
<option value="fisica">' . get_string ( "fisica", "local_feria" ) . '</option>
<option value="historia">' . get_string ( "historia", "local_feria" ) . '</option>
<option value="matematicas">' . get_string ( "matematicas", "local_feria" ) . '</option>
<option value="medio">' . get_string ( "medio", "local_feria" ) . '</option>
<option value="musica">' . get_string ( "musica", "local_feria" ) . '</option>
<option value="negocios">' . get_string ( "negocios", "local_feria" ) . '</option>
<option value="quimica">' . get_string ( "quimica", "local_feria" ) . '</option>
</select>*</td></tr>
 <tr><td>' . get_string ( "foto", "local_feria" ) . ':</td><td><input TYPE="file" name="foto1" id="foto1" />*</td></tr>
<tr><td></td><td><input TYPE="file" name="foto2" id=”foto2” /></td></tr>
<tr><td></td><td><input TYPE="file" name="foto3" id=”foto3” /></td></tr>
<tr><td></td><td><input TYPE="file" name="foto4" id=”foto4”/></td></tr>
<tr><td>' . get_string ( "archivo", "local_feria" ) . ':  </td><td> <input type="file" name="archivo" id=”archivo” />*</td></tr>
 <tr><td>' . get_string ( "url_video", "local_feria" ) . ':  </td><td><input type="text" name="urlvideo" /></td></tr>
 <tr><td></td><td><p><input name=enviardatos type="submit" value="' . get_string ( "enviar", "local_feria" ) . '" /></p></td><td></td></tr>
<tr><td></td><td> * ' . get_string ( "campos_obligatorios", "local_feria" ) . '</td></tr></table></form> ';
// Show the page footer
echo $OUTPUT->footer ();
?>