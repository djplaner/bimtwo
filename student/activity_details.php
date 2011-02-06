<?php

/*
 * Generate output for the activity details page for students
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/model.php";
require_once "$CFG->dirroot/mod/bimtwo/lib/student_feed.php";

class activity_details extends bimtwo_base_model {

    /**
      * @var bimtwo bimtwo 
      */
    public $bimtwo;

    /**
      * @var stdclass user_details 
      */
    public $user_details;

    /** 
     * Gather the required data
     */

    function gather_data() {
        global $DB;
        $factory = $this->factory;

        // configuration information about the activity
        $this->bimtwo = $this->factory->bimtwo;
        // get the user details
//        $this->user_details = 
 //           $DB->get_record( 'user', array('id'=>$factory->userid), '*', 
  //                           MUST_EXIST );
        // information about the student's feed
        $this->student_feed = new student_feed( $factory->bimtwo,
                                                $factory->userid );
    }

}


?>
