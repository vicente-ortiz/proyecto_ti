<?php
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

echo '<br><br><br><br><center><h2>¡Gracias por tu aporte!</h2></center>
<center><p><input name=volver type="button" value="Volver" /></p></center>
		<center><p><input name=volver type="button" value="Volver" /></p></center>
		'
;



// Here goes the content
//echo 'Hello world';

// Show the page footer
echo $OUTPUT->footer();
?>