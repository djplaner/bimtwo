<?php

/*
 * Generate output for the posts page for students
 *
 * @package     mod
 * @subpackage  bimtwo
 * @copyright   2010 David Jones <davidthomjones@gmail.com>
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG;
require_once "$CFG->dirroot/mod/bimtwo/factory/view.php";
require_once "$CFG->dirroot/lib/tablelib.php";


class student_posts_view extends bimtwo_base_view {

    /** 
     * Generate some output
     */

    function display() {
        
        global $OUTPUT;

        $this->view_header();

        echo $OUTPUT->heading( 'Posts page for student' );

        /** all posts in a table...maybe just the start of the posts **/
        $this->show_posts();

        $this->view_footer();
    }

    /**
     * Set up the header, everything up to the main body of the
     * page
     */

    function view_header( ) {
        global $PAGE;
        global $OUTPUT;

        $factory = $this->factory;

        $PAGE->set_url('/mod/bimtwo/view.php',
                        array('id' => $factory->cm->id));
        $PAGE->set_title($factory->bimtwo->name);
        $PAGE->set_heading($factory->course->shortname);
        $PAGE->set_button(update_module_button($factory->cm->id,
                                               $factory->course->id,
                                            get_string('modulename', 'bimtwo')));
       echo $OUTPUT->header();

        /** set up the tabs, initially set up by the controller,
         *  the view modifies which and how the tabs are shown
         */
        $inactive = array();
        $activated = array();
        $current_tab = 'posts';

        print_tabs( $this->controller->tabs, $current_tab, $inactive,
                    $activated );
    }

    /*
     * Initial function to show all posts
     * will have split this out somehow for different types of posts
     */
    function show_posts() {
       global $OUTPUT;
 
        $p_table = new flexible_table('mod-bimtwo-posts');
       
        $tablecolumns = array( 'details', 'post' );
        $tableheaders = array( get_string('show_posts_details', 'bimtwo' ),
                               get_string('show_posts_post', 'bimtwo' ) );

        $p_table->define_columns( $tablecolumns);
        $p_table->define_headers( $tableheaders);
        $p_table->define_baseurl( "****HELLO****" );

        $p_table->set_attribute( 'cellspacing', '0' );
        $p_table->set_attribute( 'class', 'generaltable generalbox' );
        $p_table->set_attribute( 'align', 'centre' );

        $p_table->setup();

        foreach ( $this->model->posts->DATA as $post ) {
            // details_table is in left column, summarises range of details
            $details = "<table width=\"100$\" cellspacing=\"0\">";

            $details .= "<tr><th valign=\"top\">Published: </th><td><small>" .
                            date( 'H:i:s D, d/M/Y', $post->timepublished ) .
                        "</small></td></tr>";

            $helpicon = $OUTPUT->help_icon( "status_" . $post->status , 
                                            "bimtwo" );

            $details .="<tr><th>Status: $helpicon</th><td>$post->status</td></tr>";

            if ( $post->status == "Marked" ) {
                $details .= "<tr><th valign=\"top\">Marked:</th><td><small>" .
                            date( 'H:i:s D, d/M/Y', $post->timemarked ) .
                            "</small></td></tr>";
                $details .= "<tr><th>Mark:</th><td> not available </td></tr>";
            } else if ( $post->status == "Released" ) {
                $details .= "<tr><th>Released:</th><td><small>" .
                            date( 'H:i:s D, d/M/Y', $post->timereleased ) . 
                            "</small></td></tr>";
                $details .= "<tr><th>Mark:</th><td>$post->mark</td></tr>";
            }
        
            $details .= "</table>";
            $post->details = $details;

            $post->post = '<small><a href="'.$post->link.'">Original post</a><br />' . 
                          '<h3>'.$post->title . '</h3>' . $post->post;
            $p_table->add_data_keyed( $post );
        }
        $p_table->print_html();
    }
}


?>
