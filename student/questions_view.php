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

    function display() {
        
global $PAGE;
global $OUTPUT;

$PAGE->set_url('/mod/bimtwo/view.php', array('id' => $this->factory->cm->id));
$PAGE->set_title($this->factory->bimtwo->name);
$PAGE->set_heading($this->factory->course->shortname);
$PAGE->set_button(update_module_button($this->factory->cm->id, $this->factory->course->id,
                get_string('modulename', 'bimtwo')));
echo $OUTPUT->header();
echo $OUTPUT->heading( 'Activity details page for student' );

print '<a href="http://localhost/m2/mod/bimtwo/view.php?id=' . $this->factory->cm->id . '&tab=questions">Show allocated questions</a> | <a href="http://localhost/m2/mod/bimtwo/view.php?id=' . $this->factory->cm->id . '&tab=posts">Show posts</a>';

echo $OUTPUT->footer();
    }

}


?>
