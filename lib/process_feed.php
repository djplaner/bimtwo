<?php

/*
 * Used to process a new student feed, will
 * - check that it's a valid URL
 * - attempt to process/mirror it
 * - provide some advice/errors about why it didn't work
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/lib/posts.php";
require_once "$CFG->dirroot/mod/bimtwo/lib/questions.php";
require_once "$CFG->dirroot/lib/simplepie/moodle_simplepie.php";

class bimtwo_new_student_feed {

    /** @var stdclass bimtwo - data record id for bimtwo */
    public $bimtwo;

    /** @var int userid - id of user feed to retrieve */
    public $userid;

    /** @var ?? blogurl - url of the blog home page */
    public $blogurl;

    /** @var ?? feedurl - the url for the RSS/ATOM feed */
    public $feedurl;

    /** @var moodle_simplepie simplepie - object used to manip rss feed */
    public $simplepie;

    /** @var int feedid - id of the entry in bimtwo_student_feeds */
    public $feedid;

    /** @var char error - string explaining error for mistaken */
    public $ERROR;

    // needs the url of blog,
    function __construct( $blogurl, $bimtwo, $userid ) {

        $this->blogurl = $blogurl;
        $this->bimtwo = $bimtwo;
        $this->userid = $userid;

        $this->auto_discover();
    }

    // return TRUE iff the blogurl is valid
    function isvalid() {
        if ( $this->simplepie->error() ) {
        //    print "error is " . $this->simplepie->error() . "<br />";
            return false;
        }
        return true;
    }

    // return TRUE iff the blogurl is a "mistaken" url
    // e.g. Students often mistakenly register the wordpress.com
    // home page, rather than their blog
    function ismistaken() {
        if ( preg_match( '!http://en.blog.wordpress.com!i', $this->blogurl ) ||
             preg_match( '!http://en.wordpress.com!i', $this->blogurl )) {
            $this->ERROR = 'wordpress';
            return true;
        }

        return false;
    }

    // store details about the feed into the student_feeds table
    function save_feed() {
        global $DB;

        $feed = new stdClass();
        $feed->bimtwo = $this->bimtwo;
        $feed->userid = $this->userid;
        $feed->numentries = 0;
        $feed->lastpost = 0;
        $feed->blogurl = $this->blogurl;
        $feed->feedurl = $this->feedurl;
 
        $this->feedid = $DB->insert_record( 'bimtwo_student_feeds', $feed );
    }

    // once feed is identified, compare posts against questions
    // update database ** MAY DO WITHOUT THIS ONE
    function process_feed() {
    }

    // translate the simplepie error into something a bit more palatable
    // (if possible)
    // Yes, I'm quite aware this breaks the damn MVC structure, but frankly,
    // I don't give a damn
    function show_error() {
        if ( $this->ERROR == 'wordpress' ) {
            print_string( 'new_feed_wordpress', 'bimtwo' );
        }

        // make sure there is an error
        if ( ! $this->simplepie->error() ) {
            return;
        }

        $error = $this->simplepie->error();

        // simplepie couldn't find a feed
        if ( preg_match( "!^A feed could not be found at !", $error )) {
            print_string( "new_feed_nofound_error", 'bimtwo' );
        } else if ( preg_match( "!time out after!", $error )) {
            print_string( "new_feed_timeout_error", 'bimtwo' );
        } else {
            print_string( "new_feed_noretrieve_error", 'bimtwo' );
        }
    }

    // With blogurl set, try and use simplepie's auto discover to
    // find the feed.  Code lifted from the rss_client block
    function auto_discover() {
        $this->simplepie =  new moodle_simplepie();
        $this->simplepie->set_feed_url( $this->blogurl );
        // set timeout for longer than normal to try and grab the feed
        $this->simplepie->set_timeout(20);
        $this->simplepie->set_autodiscovery_level(SIMPLEPIE_LOCATOR_ALL);
        $this->simplepie->init();

        $this->feedurl = $this->simplepie->subscribe_url();
        // following updates blogurl, if original link was directly to feed
        $this->blogurl = $this->simplepie->get_permalink();
    }
}


?>
