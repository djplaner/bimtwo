<?php

/*
 * Controller for the student user. 
 * Based on input will decide what should be done and then
 * what is presented back to the user.
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class bimtwo_student_controller extends bimtwo_base_controller {

    /** @var array tabs - array of tabs */
    public $tabs;

    public $param;

    function __construct( $factory )  {
        parent::__construct( $factory );

        //$this->view_path .= "/student";
        $this->methods = array(
            "default" => array( "default" => "activity_details" ),
            "activity" => array( "default" => "activity_details" ),
            "questions" => array( "default" => "questions" ),
            "posts" => array( "default" => "posts" )
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
        $detailsurl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'activity' ));
        $rows[] = new tabobject( "details", $detailsurl->out(),
                                 get_string( "student_details", "bimtwo" ) );
        $postsurl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'posts' ));
        $rows[] = new tabobject( "posts", $postsurl->out(),
                                 get_string( "student_posts", "bimtwo" ) );
        $questionsurl = new moodle_url( '/mod/bimtwo/view.php',
                            array( 'id' => $factory->cm->id,
                                   'tab' => 'questions' ));
        $rows[] = new tabobject( "questions", $questionsurl->out(),
                                 get_string( "questions_title", "bimtwo" ) );

        $this->tabs[]=$rows;
    }

    /** 
     * "home" page for students. Displays basic information about
     * the activity (provided by creator) and what if any details
     * are known about the student's contributions.
     * 
     * Slightly different output if the student has/hasn't registered
     * a feed or staff have turned off registration.
     */

    function activity_details() {
        require_once "$this->view_path/student/activity_details.php";
        $this->model = new activity_details( $this );
        $this->model->gather_data();
        require_once "$this->view_path/factory/view.php";
        require_once "$this->view_path/student/activity_details_view.php";
        $this->view = new activity_details_view( $this );
        $this->view->display( $this );
    }

    function questions() {
        require_once "$this->view_path/student/question_details.php";
        $this->model = new question_details( $this );
        $this->model->gather_data();
        require_once "$this->view_path/student/question_details_view.php";
        $this->view = new question_details_view( $this );
        $this->view->display( $this );
    }

    function posts() {
        require_once "$this->view_path/student/posts.php";
        $this->model = new student_posts( $this );
        $this->model->gather_data();
        require_once "$this->view_path/student/posts_view.php";
        $this->view = new student_posts_view( $this );
        $this->view->display( $this );
    }
}


?>
