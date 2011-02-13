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
//require_once "$CFG->dirroot/lib/tablelib.php";
require_once "$CFG->dirroot/mod/bimtwo/factory/view.php";
//require_once "$CFG->dirroot/mod/bimtwo/lib/student_details_view.php";


class manage_questions_view extends bimtwo_base_view {

    /** 
     * Generate some output
     */

    function display() {
        
        global $OUTPUT;

        $this->view_header( "questions" );

        echo $OUTPUT->heading( "Manage questions" );

        $this->view_footer();
    }
}


?>
