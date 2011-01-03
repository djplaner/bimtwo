<?php

/*
 * Generate output for the questions page for students
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/view.php";

class questions_view extends bimtwo_base_view {

    /** 
     * Generate some output
     */

    function display() {
        
        global $OUTPUT;

        $this->view_header();

        echo $OUTPUT->heading( 'Questions page for student' );

print '<a href="http://localhost/m2/mod/bimtwo/view.php?id=' . $this->factory->cm->id . '">Activity details</a> | <a href="http://localhost/m2/mod/bimtwo/view.php?id=' . $this->factory->cm->id . '&tab=posts">Show posts</a>';

        $this->view_footer();
    }

    /**
     * Set up the header, everything up to the main body of the
     * page
     */

    function view_header( ) {
        global $PAGE;
        global $OUTPUT;

        $factory = $this->factory;

        $PAGE->set_url('/mod/bimtwo/view.php',
                        array('id' => $factory->cm->id));
        $PAGE->set_title($factory->bimtwo->name);
        $PAGE->set_heading($factory->course->shortname);
        $PAGE->set_button(update_module_button($factory->cm->id,
                                               $factory->course->id,
                                            get_string('modulename', 'bimtwo')));
       echo $OUTPUT->header();

        /** set up the tabs, initially set up by the controller,
         *  the view modifies which and how the tabs are shown
         */
        //$tabs = array();
        //$rows = array();
        $inactive = array();
        $activated = array();
        $current_tab = 'questions';

        print_tabs( $this->controller->tabs, $current_tab, $inactive,
                    $activated );

    }

    function view_footer() {
        global $OUTPUT;

        echo $OUTPUT->footer();
    }
}


?>
