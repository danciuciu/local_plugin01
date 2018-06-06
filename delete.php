<?php

/**
 * @package   local_plugin01
 * @copyright 2017 onwards SC Elearning & Software SRL  {@link http://elearningsoftware.ro/}
 */

require_once '../../config.php';
require_once $CFG->dirroot.'/local/plugin01/lib.php';
require_once($CFG->libdir.'/formslib.php');
require_once($CFG->dirroot.'/repository/lib.php');


$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/plugin01/index.php');

$PAGE->set_title(get_string('plugin01', 'local_plugin01'));
$PAGE->set_heading(get_string('plugin01', 'local_plugin01'));
$PAGE->set_pagelayout('base');


$content = '<h3>Do u wanna delete record?</h3>';

$content.= '<a href="http://localhost/moodle/local/plugin01/delete.php?rowid='.$_GET["rowid"].'&confirm=1" class="btn btn-default">Yes</a>';
$content.= '<a href="http://localhost/moodle/local/plugin01/view02.php" class="btn btn-default">Return</a>';

if(isset($_GET["rowid"]) && isset($_GET["confirm"])){
    $DB->delete_records('local_plugin01', array('id'=>$_GET["rowid"]));
    redirect($CFG->wwwroot.'/local/plugin01/view02.php');
}


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('plugin01', 'local_plugin01'));
echo $content;
//echo $formular->render();
echo $OUTPUT->footer();
