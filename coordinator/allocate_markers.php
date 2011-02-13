<?php

/*
 * Model to show all questions
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/model.php";
require_once "$CFG->dirroot/mod/bimtwo/lib/questions.php";

class manage_questions extends bimtwo_base_model {

    /**
      * @var bimtwo bimtwo 
      */
    public $bimtwo;

    /**
      * @var bimtwo_questions questions
      */
    public $questions;

    /** 
     * Gather the required data
     */

    function gather_data() {
        global $DB;
        $factory = $this->factory;

        // configuration information about the activity
        $this->bimtwo = $this->factory->bimtwo;
        $this->questions = new bimtwo_questions( $factory->bimtwo );
        $this->questions->add_question_response_stats();
    }

}


?>
