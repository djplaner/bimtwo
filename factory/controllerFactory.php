<?php

/*
 * FILE:    factory/controllerFactory.php
 * AIM:     Provide factory class to construct controllers based on
 *          input from Moodle
 */

class bimtwo_ControllerFactory {

    public function __construct( $DB, $OUTPUT ) {
        $this->DB = $DB;
        $this->OUTPUT = $OUTPUT;
        // following is adapted/copied from NEWMODULE
        $id = optional_param('id', 0, PARAM_INT); // course_module ID, or
        $n  = optional_param('n', 0, PARAM_INT);  // bimtwo instance ID 

        if ( $id ) {
            $this->cm = get_coursemodule_from_id('bimtwo', $id, 0, 
                                                    false, MUST_EXIST); 
            $this->course = $this->DB->get_record('course', 
                                            array('id' => $this->cm->course),
                                            '*', MUST_EXIST);    
            $this->bimtwo  = $this->DB->get_record('bimtwo', 
                                             array('id' => $this->cm->instance), 
                                             '*', MUST_EXIST);
        } elseif ($n) {
            $this->bimtwo = $DB->get_record('bimtwo', array('id' => $n), '*', 
                                        MUST_EXIST);
            $this->course = $DB->get_record('course', array('id' => 
                                                    $this->bimtwo->course), 
                                            '*', MUST_EXIST);
            $this->cm = get_coursemodule_from_instance('bimtwo', 
                                                       $this->bimtwo->id, 
                                                       $this->course->id, 
                                                       false, MUST_EXIST);
        } else {
            error('You must specify a course_module ID or an instance ID');
        }

        require_login($this->course, true, $this->cm);

        add_to_log($this->course->id, 'bimtwo', 'view', 
                   "view.php?id=" . $this->cm->id, $this->bimtwo->name, 
                   $this->cm->id);
        return $this;
    }


    public function process()  {
/** This stuff will eventually go into the view **/
global $PAGE;

$PAGE->set_url('/mod/bimtwo/view.php', array('id' => $this->cm->id));
$PAGE->set_title($this->bimtwo->name);
$PAGE->set_heading($this->course->shortname);
$PAGE->set_button(update_module_button($this->cm->id, $this->course->id, 
                get_string('modulename', 'bimtwo')));
echo $this->OUTPUT->header();
echo $this->OUTPUT->heading( 'It works!' );

/*** this is where the main body goes for now**/

        $this->context = get_context_instance( CONTEXT_MODULE, $this->cm->id );

//        print_object( $context );
        if ( has_capability( 'moodle/legacy:editingteacher', $this->context ) ){
            echo $this->OUTPUT->p( "This is a editing teacher" );
        }
        

echo $this->OUTPUT->footer();
    }
}

    
?>
