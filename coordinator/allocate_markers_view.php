<?php

/*
 * Generate output for allocate markers view for coordinators
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/view.php";


class allocate_markers_view extends bimtwo_base_view {

    /** 
     * Generate some output
     */

    function display() {
        
        global $OUTPUT;

        $this->view_header( "markers" );

        echo $OUTPUT->heading( "Allocate markers" );

        $this->view_footer();
    }
}


?>
