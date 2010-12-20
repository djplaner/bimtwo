<?php

/**
 * Prints a particular instance of bimtwo
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package   mod_bimtwo
 * @copyright 2010 Your Name
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/// (Replace bimtwo with the name of your module and remove this line)

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

require_once( $CFG->dirroot.'/mod/bimtwo/factory/controllerFactory.php' );

$factory = new bimtwo_ControllerFactory( $DB, $OUTPUT );
if ( $factory !== NULL ) {
    $factory->process();
}

