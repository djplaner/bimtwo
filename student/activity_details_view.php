<?php

/*
 * Generate output for the activity details page for students
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class activity_details_view extends bimtwo_base_view {

    /** 
     * Generate some output
     */

    function display( $controller) {
        
        $this->controller = $controller;
        
global $PAGE;
global $OUTPUT;

$PAGE->set_url('/mod/bimtwo/view.php', array('id' => $this->cm->id));
$PAGE->set_title($this->bimtwo->name);
$PAGE->set_heading($this->course->shortname);
$PAGE->set_button(update_module_button($this->cm->id, $this->course->id,
                get_string('modulename', 'bimtwo')));
echo $OUTPUT->header();
echo $OUTPUT->heading( 'Activity details page for students' );

print_object( $this->controller->factory );
echo $OUTPUT->footer();
    }

}


?>
