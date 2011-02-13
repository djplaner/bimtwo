<?php

/*
 * Generate output for the your students view for coordinators
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/view.php";


class your_students_view extends bimtwo_base_view {

    /** 
     * Generate some output
     */

    function display() {
        
        global $OUTPUT;

        $this->view_header( "students" );

        echo $OUTPUT->heading( "Your students" );

        $this->view_footer();
    }
}


?>
