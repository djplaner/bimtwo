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

    /** @var array tabs - array of tabs */
    public $tabs;

    public $param;

    function __construct( $factory )  {
        parent::__construct( $factory );

        //$this->view_path .= "/student";
        $this->methods = array(
            "default" => array( "default" => "configure" ),
            "configure" => array( "default" => "configure" ),
            "questions" => array( "default" => "manage_questions" ),
            "markers" => array( "default" => "allocate_markers" ),
            "marking" => array( "default" => "manage_marking" ),
            "find" => array( "default" => "find_student" ),
            "students" => array( "default" => "your_students" ),
        );

        $this->construct_tabs();
    }

    /** Construct the tabs interface students can use to interact
      * with the various pages they have access to 
      * There are three possible tabs each one matching one of the
      * (non-default) keys in the methods hash above
      *     activity, questions and posts
      * The tabs are added as a data member and made available to 
      * the individual views which are responsible for figuring out
      * how to display them.
      */

    function construct_tabs() {
        $this->tabs = array();
        $rows = array();

        $factory = $this->factory;
        $configureurl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'configure' ));
        $rows[] = new tabobject( "configure", $configureurl->out(),
                            get_string( "coordinator_configure", "bimtwo" ) );

        $questionsurl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'questions' ));
        $rows[] = new tabobject( "questions", $questionsurl->out(),
                                 get_string( "coordinator_questions", "bimtwo" ) );

        $markersurl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'markers' ));
        $rows[] = new tabobject( "markers", $markersurl->out(),
                                 get_string( "coordinator_markers", "bimtwo" ) );

        $markingurl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'marking' ));
        $rows[] = new tabobject( "marking", $markingurl->out(),
                                 get_string( "coordinator_marking", "bimtwo" ) );

        $studenturl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'students' ));
        $rows[] = new tabobject( "students", $studenturl->out(),
                                 get_string( "coordinator_students", "bimtwo" ) );
        $this->tabs[]=$rows;
    }

    // Present a simple description of current configuration with
    // some pointers
    function configure() {
        require_once "$this->view_path/coordinator/configure_view.php";
        $this->view = new configure_view( $this );
        $this->view->display();

    }

    // Present (and manage) a form that allows addition and modification
    // of questions assigned for students to answer
    function manage_questions() {
        require_once "$this->view_path/coordinator/manage_questions.php";
        $this->model = new manage_questions( $this );
        $this->model->gather_data();

        require_once "$this->view_path/coordinator/manage_questions_view.php";
        $this->view = new manage_questions_view( $this );
        $this->view->display();

        print "<h1> Manage questions </h1>";
/*        require_once "$this->view_path/student/question_details.php";
        $this->model = new question_details( $this );
        $this->model->gather_data();
        require_once "$this->view_path/student/question_details_view.php";
        $this->view = new question_details_view( $this );
        $this->view->display( $this ); */
    }

    function allocate_markers() {
        require_once "$this->view_path/coordinator/allocate_markers_view.php";
        $this->view = new allocate_markers_view( $this );
        $this->view->display();
        print "<h1>Allocate markers </h1>";
    }

    function manage_marking() {
        require_once "$this->view_path/coordinator/manage_marking_view.php";
        $this->view = new manage_marking_view( $this );
        $this->view->display();
        print "<h1>Manage marking </h1>";
    }

    function find_student() {
        require_once "$this->view_path/coordinator/manage_questions_view.php";
        $this->view = new manage_questions_view( $this );
        $this->view->display();
        print "<h1>Find student </h1>";
    }

    function your_students() {
        require_once "$this->view_path/coordinator/your_students_view.php";
        $this->view = new your_students_view( $this );
        $this->view->display();
        print "<h1>Your students </h1>";
    }
}


?>
