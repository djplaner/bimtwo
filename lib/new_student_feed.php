<?php

/*
 * O/R object holding information for a student and their feed
 * Includes
 * - feed: the summary of the student feed
 * - details: the moodle user information for the student
 * - posts: all of the posts for the student in the system
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/lib/posts.php";
require_once "$CFG->dirroot/mod/bimtwo/lib/questions.php";

class student_feed {

    /** @var stdclass bimtwo - data record id for bimtwo */
    public $bimtwo;

    /** @var int userid - id of user feed to retrieve */
    public $userid;

    /** @var bool emptry - true iff no record found */
    private $empty;

    /** @var stdclass feed - summary of studnet_feed table */
    public $feed;

    /** @var stdclass details - user information for the student */
    public $details;

    /** @var bimtwo_posts posts - all posts for student */
    public $posts;

    /** @var bimtwo_questions questions - all questions for bimtwo */
    public $questions;

    function __construct( $bimtwo, $userid ) {
        global $DB;

        $this->bimtwo = $bimtwo;
        $this->userid = $userid;

        // get the user details
        $this->details =
            $DB->get_record( 'user', array('id'=>$userid), '*',
                             MUST_EXIST );

        // get the feed details
        $this->feed = 
            $DB->get_record( 'bimtwo_student_feeds', 
                             array('bimtwo'=>$this->bimtwo->id,
                                   'userid'=>$this->userid) );
        $this->empty = false;
        if ( ! $this->feed ) {
            $this->empty = true;
            return;
        }
        // get posts
        $this->posts = new bimtwo_posts( $bimtwo );

        // get the questions
        $this->questions = new bimtwo_questions( $bimtwo );
    }

    function isempty() { 
        return $this->empty;
    }
}


?>
