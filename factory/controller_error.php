<?php

/*
 * Controller for error...i.e. user doesn't have access.
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class bimtwo_error_controller extends bimtwo_base_controller {

    function process()  {
        $fac = $this->factory;
        /** This stuff will eventually go into the view **/
global $PAGE;
global $OUTPUT;
$PAGE->set_url('/mod/bimtwo/view.php', array('id' => $fac->cm->id));
$PAGE->set_title($fac->bimtwo->name);
$PAGE->set_heading($fac->course->shortname);
$PAGE->set_button(update_module_button($fac->cm->id, $fac->course->id,
                get_string('modulename', 'bimtwo')));
echo $OUTPUT->header();
echo $OUTPUT->heading( 'Error' );
echo "<p>You have no capabilities to access this bim2 activity.</p>" ;

echo $OUTPUT->footer();
    }

}


?>
