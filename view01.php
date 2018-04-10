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


$content='<table style="width:100%">
      <thead>
          <tr>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Adresa</th>
            <th>Email</th>
          </tr>
        </thead>

          ';

$results = $DB->get_records_sql('SELECT * FROM {local_plugin01} ');
foreach($results as $result){

    $content.= '<tr>
                  <td>'.$result->nume.'</td>
                  <td>'.$result->prenume.'</td>
                  <td>'.$result->adresa.'</td>
                  <td>'.$result->email.'</td>
                 <!-- <td><a class="btn btn-default"  href="http://localhost/moodle/local/plugin01/view.php?rowid='.$result->id.'">Delete</a></td> -->
                </tr>';
  //var_dump($result);die();
  }
  $content.= '</table>';


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('plugin01', 'local_plugin01'));
echo $content;
//echo $formular->render();
echo $OUTPUT->footer();
