<?php

/**
 * @package   local_plugin01
 * @copyright 2017 onwards SC Elearning & Software SRL  {@link http://elearningsoftware.ro/}
 */

defined('MOODLE_INTERNAL') || die();

require_once $CFG->dirroot.'/local/plugin01/lib.php';

function xmldb_local_plugin01_install() {
    global $CFG, $DB;

    $dbman = $DB->get_manager();
    // admin/tool/xmldb/index.php

    return true;
}
