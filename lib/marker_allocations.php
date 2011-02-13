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
            $DB->get_records( 'bimtwo_questions', 
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

    // add up the maximum possible marks that can be awarded
    function calculate_maximum_mark() {
        $max = 0;
        foreach ( $this->DATA as $question ) {
            $max += $question->max_mark;
        }
        return $max;
    }

    // given a array of records from bim_questions generate
    // a new entry response_stats indicating the number of
    // responses for each student in each status in bim_marking
    function add_question_response_stats() {
        global $DB;

        // if no questions
        if ( empty($this->DATA)) return NULL;

        foreach ( $this->DATA as $question ) {
            // get count of student posts in each status for this question
            $sql = "select status,count(id) as x from {bimtwo_marking} where 
                    question=? and status!='Unallocated' group by status";
            $marking_details = $DB->get_records_sql( $sql, 
                                        array( $question->id) );

            // get ready to update $question->status with information
            $question->status = array();
            $status = array( "Unallocated", "Submitted", "Released", "Marked",
                     "Suspended" );

            foreach ( $status as $field ) {
                // if there was a post in that status, update $question->status
                if ( isset( $marking_details[$field] ) ) {
                    $question->status[$field] = $marking_details[$field]->x;
                } else {
                    $question->status[$field] = 0;
                }
            }
        }
    }
}


?>
