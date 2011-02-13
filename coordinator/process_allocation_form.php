<?php

/*
 * Used to process data from the manage question form for the 
 * coordinator
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class bimtwo_process_question_form {

    //** arrays that contain details of changes from processing form */
    public $deleted_questions;
    public $changed_questions;
    public $new_question;
 
    // Constructor takes the form_data from Moodle and also
    // a list of the questions as currently in the database

    function __construct( $form_data, $questions, $bimtwo )  {
        $this->form_data = $form_data;
        $this->questions = $questions;
        $this->bimtwo = $bimtwo;

//        $this->deleted_questions = new array();
 //       $this->changed_questions = new array();
    }

    // process the form
    // - check if a new question has been added
    // - loop through all the questions
    function process() {

        $addition = $this->check_new_question();

        $change = $this->check_deleting_questions();

        $this->check_modified_questions();
    }

    // check the form data for the addition of a new question
    function check_new_question() {
        global $DB;

        if ( $this->form_data->title_new!="" || $this->form_data->max_new!=0 ||
             $this->form_data->min_new!=0 || $this->form_data->body_new!="" ) {
            // create new record
            $this->new_question = new stdClass();
            $this->new_question->title = $this->form_data->title_new;
            $this->new_question->min_mark = $this->form_data->min_new;
            $this->new_question->max_mark = $this->form_data->max_new;
            $this->new_question->body = addslashes(
               preg_replace( '/^ /', '', $this->form_data->body_new ) );
            $this->new_question->bimtwo = $this->bimtwo->id;
            $this->new_question->id = '';
            // insert it
            $this->new_question->id = $DB->insert_record( 'bimtwo_questions', 
                                            $this->new_question );
        }
        return false;
    }

    // loop through existing questions and see if the form contains
    // any changes
    function check_deleting_questions() {
        global $DB;

        if ( ! empty( $this->questions )) {
            foreach ( $this->questions as $question ) {
                // get "names" of form data that matches the question
                $qid = $question->id;
                $title = "title_".$qid;
                $min = "min_".$qid;
                $max = "max_".$qid;
                $body = "body_".$qid;
                $delete = "delete_".$qid;

                // is the current question being deleted?
                if ( isset( $this->form_data->$delete ) ) {

                    if ( ! $DB->delete_records("bimtwo_questions", 
                                array("id"=>$qid ))) {
                        // print_string( "error_delete", "bimtwo", $title );
                    } else {
                        $this->deleted_questions[$qid] = $question;
                    }
                }
            }
        }
    }


    function check_modified_questions() {
                // KLUDGE: for some reason body has a space at the start
                // after being passed back from the form.  Don't want that.
/*                $this->form_data->$body = preg_replace( '/^ /', '', 
                                                    $this->form_data->$body );
*/
        global $DB;

        if ( ! empty( $this->questions )) {
            foreach ( $this->questions as $question ) {
                // get "names" of form data that matches the question
                $qid = $question->id;
                $title = "title_".$qid;
                $min = "min_".$qid;
                $max = "max_".$qid;
                $body = "body_".$qid;
                $delete = "delete_".$qid;

                // can't change something we've already deleted
                if ( ! isset( $this->form_data->$delete )) {
                    // has there been a change?
                    if ( $this->form_data->$title != $question->title  ||
                        $this->form_data->$min != $question->min_mark ||
                        $this->form_data->$max != $question->max_mark ||
                        $this->form_data->$body != $question->body ) {
                        $question->title = $this->form_data->$title;
                        $question->min_mark = $this->form_data->$min;
                        $question->max_mark = $this->form_data->$max;
                        $question->body = $this->form_data->$body;
    
                        // get rid of status, before updating
                        $change = clone $question;
                        unset( $change->status );
                        $DB->update_record( 'bimtwo_questions', $change ); 
                        $this->changed_questions[$qid] = $change;
                    }
                }
            }
        }
    }

}


?>
