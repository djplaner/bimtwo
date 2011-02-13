<?php

/*
 * Generate output for the posts page for students
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/view.php";

class manage_marking_view extends bimtwo_base_view {

    /** 
     * Generate some output
     */

    function display() {
        
        global $OUTPUT;

        $this->view_header( "marking" );

        echo $OUTPUT->heading( "Manage marking" );

        $this->view_footer();
    }
}


?>
