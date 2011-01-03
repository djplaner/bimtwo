<?php

/*
 * Enable retrieval and manipulation of data about all questions
 * for a given bim2 activity
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class bimtwo_questions {

    /** @var stdclass bimtwo - data record id for bimtwo */
    public $bimtwo;

    /** @var bool emptry - true iff no record found */
    private $empty;

    function __construct( $bimtwo ) {
        global $DB;

        $this->bimtwo = $bimtwo;

        // get the user details
        $this->DATA = 
            $DB->get_recordset( 'bimtwo_questions', 
                             array('bimtwo'=>$this->bimtwo->id ));
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
