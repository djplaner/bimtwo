<?php

/*
 * Generate table showing details of the activity
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/view.php";
require_once "$CFG->dirroot/lib/tablelib.php";

class activity_details_view extends bimtwo_base_view {

    /*
     * @var stdclass $bimtwo - model for this view
     */
    public $bimtwo;

    function __construct( $bimtwo ) {
        $this->bimtwo = $bimtwo;
    }

    /** 
     * Generate some output
     */

    function display() {
        
        global $OUTPUT;

        $table = new flexible_table('mod-bimtwo-activity-details');
       
        $tablecolumns = array( 'name', 'value' );
        $tableheaders = array( 'Configuration', 'Value' );

        $table->define_columns( $tablecolumns);
        $table->define_headers( $tableheaders);
        $table->define_baseurl( "****HELLO****" );

        $table->set_attribute( 'cellspacing', '0' );
        $table->set_attribute( 'cellpadding', '2' );
        $table->set_attribute( 'class', 'generaltable generalbox' );
        $table->set_attribute( 'align', 'centre' );

        $table->setup();

        // Regisration allowed?
        if ( $bimtwo->register_feed == 1 ) {
            $register_feed = get_string( 'register_feed_on', 'bimtwo' );
        } else {
            $register_feed = get_string( 'register_feed_off', 'bimtwo' );
        }
        $table->add_data_keyed( 
            array( name => get_string( 'register_feed_status', 'bimtwo' ),
                   value => $register_feed ) );
        // Mirroring on?

        // Grading on?

//        $blog = '<a href="' . $feed->blogurl . '">' . $feed->blogurl . '</a>';
 //       $helpicon = $OUTPUT->help_icon( 'show_details_blog', 'bimtwo' );
  //      $table->add_data_keyed(
   //         array( 'name' => get_string('show_details_blog','bimtwo') . $helpicon, 
    //                    'value' => $blog ) );

        $output = $table->print_html();

        return $output;
    }
}


?>
