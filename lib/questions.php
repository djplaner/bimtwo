<?php

/*
 * Generate output for the activity details page for students
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class student_feed {

    /** @var stdclass bimtwo - data record id for bimtwo */
    public $bimtwo;

    /** @var int userid - id of user feed to retrieve */
    public $userid;

    /** @var bool emptry - true iff no record found */
    private $empty;

    function __construct( $bimtwo, $userid ) {
        global $DB;

        $this->bimtwo = $bimtwo;
        $this->userid = $userid;

        // get the user details
        $this->DATA = 
            $DB->get_record( 'bimtwo_student_feeds', 
                             array('bimtwo'=>$this->bimtwo->id,
                                   'userid'=>$this->userid) );
        if ( ! $this->DATA ) {
            $this->empty = true;
        } else {
            $this->empty = false;
        }
    }

    function isempty() { 
        return $this->empty;
    }
}


?>
