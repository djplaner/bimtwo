<?php

/*
 * Factory class for controllers, responsible for creating the
 * the appropriate controller for the type of user and starting
 * it processing the request
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/*
 * All controllers extend this base class
 */

abstract class bimtwo_base_controller {
    
    /** @var bimtwo_factory factory producing controller **/
    /*  - provides access to $cm, $course, $context, $bimtwo objects */
    public $factory;

    /** @var string tab drawn from optional param of same name */
    public $tab;

    /** @var string op drawn from optional param of same name */
    public $op;

    function __construct( $factory ) {
        // set up the path for where the views will be
        global $CFG;
        $this->view_path = $CFG->dirroot."/mod/bimtwo";

        // point back to the object that created this controller
        // Useful for getting established data structures/services
        $this->factory = $factory;

        // pre-assign the tab and op variables which indicate
        // what the user is trying to do
        $this->tab = optional_param( 'tab', '', PARAM_ALPHA ) ;
        if ( $this->tab == "" ) {
            $this->tab = "default";
        }
        $this->op  = optional_param( 'op',  '', PARAM_ALPHA );
        if ( $this->op == "" ) {
            $this->op = "default";
        }


    }

    /*
     * This is the main function that each extending class needs
     * to implement. It should handle all necessary input/output
     * for the class of user
     */
    function process() {
        if ( isset( $this->methods[$this->tab][$this->op] )) {
            $function = $this->methods[$this->tab][$this->op];
            $this->$function();
        } 
    }
}

/*
 * The factory class that creates the appropriate controller object
 */

class bimtwo_controller_factory {

    /** @var stdclass course module record **/
    public $cm;

    /** @var stdclass course record **/
    public $course;

    /** @var stdclass context object */
    public $context;

    /** @var stdclass bimtwo recrod */
    public $bimtwo;

    /**
     * Get the coursemodule, course and bimtwo records and other
     * information necessary to identify what type of capabilities
     * for bimtwo the user making the request has.
     * Based on their capability create the appropriate controller
     **/

    public function __construct() {
        global $DB;

        // following is adapted/copied from NEWMODULE
        $id = optional_param('id', 0, PARAM_INT); // course_module ID, or
        $n  = optional_param('n', 0, PARAM_INT);  // bimtwo instance ID 

        if ( $id ) {
            $this->cm = get_coursemodule_from_id('bimtwo', $id, 0, 
                                                    false, MUST_EXIST); 
            $this->course = $DB->get_record('course', 
                                            array('id' => $this->cm->course),
                                            '*', MUST_EXIST);    
            $this->bimtwo  = $DB->get_record('bimtwo', 
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
            throw new moodle_exception('Need either a course_module ID or a bim2 instance ID');
        }

        require_login($this->course, true, $this->cm);

        add_to_log($this->course->id, 'bimtwo', 'view', 
                   "view.php?id=" . $this->cm->id, $this->bimtwo->name, 
                   $this->cm->id);
        $this->context = get_context_instance( CONTEXT_MODULE, $this->cm->id );
    }

    /*
     * actually produce the appropriate controller
     */

    public function produce() {

        global $CFG;
        $path = $CFG->dirroot."/mod/bimtwo";

        if ( has_capability( 'mod/bimtwo:coordinator', $this->context)) {
            // administrator can the configure stuff
            require_once "$path/coordinator/controller.php";
            return new bimtwo_coordinator_controller( $this );
        } else if (has_capability('mod/bimtwo:student', $this->context)) {
            // student can see details of their registered blog
            require_once "$path/student/controller.php";
            return new bimtwo_student_controller( $this );

        } else if ( has_capability( 'mod/bimtwo:marker', $this->context )) {
            // marker can manage their allocated group of students
            require_once "$path/marker/controller.php";
            return new bimtwo_marker_controller( $this );
        } else {
            // everyone else gets an error message
            require_once "$path/factory/controller_error.php";
            return new bimtwo_error_controller( $this );
        }
    }
}

    
?>
