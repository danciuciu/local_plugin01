<?php

/**
 * @package   local_plugin01
 * @copyright 2017 onwards SC Elearning & Software SRL  {@link http://elearningsoftware.ro/}
 */

function xmldb_local_plugin01_upgrade($oldversion = 0) {
    global $CFG, $THEME, $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2018041001) {

       // Define field nume to be added to local_plugin01.
       $table = new xmldb_table('local_plugin01');
       $field = new xmldb_field('nume', XMLDB_TYPE_CHAR, '30', null, null, null, null, 'id');

       // Conditionally launch add field nume.
       if (!$dbman->field_exists($table, $field)) {
           $dbman->add_field($table, $field);
       }

       $field = new xmldb_field('prenume', XMLDB_TYPE_CHAR, '30', null, null, null, null, 'nume');

       // Conditionally launch add field prenume.
       if (!$dbman->field_exists($table, $field)) {
           $dbman->add_field($table, $field);
       }

       $field = new xmldb_field('adresa', XMLDB_TYPE_CHAR, '30', null, null, null, null, 'prenume');

      // Conditionally launch add field adresa.
      if (!$dbman->field_exists($table, $field)) {
          $dbman->add_field($table, $field);
      }

      $field = new xmldb_field('email', XMLDB_TYPE_CHAR, '50', null, null, null, null, 'adresa');

        // Conditionally launch add field email.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }


       // Plugin01 savepoint reached.
       upgrade_plugin_savepoint(true, 2018041001, 'local', 'plugin01');
   }



    return true;
}
