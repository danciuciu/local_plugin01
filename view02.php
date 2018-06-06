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


$content='<table class="tableview02" style="width:100%;">

          <tr>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Adresa</th>
            <th>Email</th>
            <th>Edit / Delete</th>
          </tr>


          ';

$results = $DB->get_records_sql('SELECT * FROM {local_plugin01} ');
foreach($results as $result){

    $content.= '<tr>
                  <td>'.$result->nume.'</td>
                  <td>'.$result->prenume.'</td>
                  <td>'.$result->adresa.'</td>
                  <td>'.$result->email.'</td>
                  <td><a href="http://localhost/moodle/local/plugin01/edit.php?rowid='.$result->id.'"<i  title = "Edit" class="fa fa-edit" style="padding:10px;"></a>
                  <a href="http://localhost/moodle/local/plugin01/delete.php?rowid='.$result->id.'"<i  title = "Delete" class="fa fa-trash" style="padding:10px;"></a></td>
                </tr>';
  //var_dump($result);die();
  }
  $content.= '</table>';


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('plugin01', 'local_plugin01'));
echo $content;
//echo $formular->render();
echo $OUTPUT->footer();
