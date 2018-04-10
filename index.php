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
//$PAGE->requires->css('/local/plugin01/styles.css');


$PAGE->navbar->ignore_active();
$PAGE->navbar->add(get_string('plugin01', 'local_plugin01'));
$content = ' dsadsadsa';

class plugin01_form extends moodleform {

    /**
     * Defines the form
     */
    public function definition() {
        global $USER, $CFG, $DB;

        $mform = $this->_form;

        $mform->addElement('text', 'nume',  get_string('nume', 'local_plugin01'));
        $mform->setType('nume', PARAM_NOTAGS);
        $mform->addRule('nume', get_string('required'), 'required');

        $mform->addElement('text', 'prenume',  get_string('prenume', 'local_plugin01'));
        $mform->setType('prenume', PARAM_NOTAGS);
        $mform->addRule('prenume', get_string('required'), 'required');

        $mform->addElement('text', 'adresa',  get_string('adresa', 'local_plugin01'));
        $mform->setType('adresa', PARAM_NOTAGS);
        $mform->addRule('adresa', get_string('required'), 'required');

        $mform->addElement('text', 'email',  get_string('email', 'local_plugin01'));
        $mform->setType('email', PARAM_NOTAGS);
        $mform->addRule('email', get_string('required'), 'required');



        $buttonarray = array();
        $buttonarray[] = $mform->createElement('submit', 'submit' , get_string('send', 'local_plugin01'));
        $buttonarray[] = $mform->createElement('cancel');

        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
    }


    public function validation($data, $files) {
        $errors = parent::validation($data, $files);


        return $errors;
    }
}

$formular = new plugin01_form();


if ($formular->is_cancelled()) {
    redirect($CFG->wwwroot.'/local/plugin01/index.php');
} else if ($data = $formular->get_data()) {
    //insert in DB
    $dataobject = new \stdClass();
    $dataobject->nume = $data->nume;
    $dataobject->prenume = $data->prenume;
    $dataobject->adresa = $data->adresa;
    $dataobject->email = $data->email;
    $DB->insert_record('local_plugin01', $dataobject);
}


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('plugin01', 'local_plugin01'));
echo $content;
echo $formular->render();
echo $OUTPUT->footer();
