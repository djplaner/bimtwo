<?php

/*
 * Controller for the coordinator user. 
 * Based on input will decide what should be done and then
 * what is presented back to the user.
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class bimtwo_coordinator_controller extends bimtwo_base_controller {

    function process()  {
        /** This stuff will eventually go into the view **/
global $PAGE;
global $OUTPUT;

$PAGE->set_url('/mod/bimtwo/view.php', array('id' => $this->cm->id));
$PAGE->set_title($this->bimtwo->name);
$PAGE->set_heading($this->course->shortname);
$PAGE->set_button(update_module_button($this->cm->id, $this->course->id,
                get_string('modulename', 'bimtwo')));
echo $OUTPUT->header();
echo $OUTPUT->heading( 'Coordinator model' );


echo $OUTPUT->footer();
    }

}


?>
