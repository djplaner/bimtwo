<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * English strings for bimtwo
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package   mod_bimtwo
 * @copyright 2010 Your Name
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['modulename'] = 'bimtwo';
$string['modulenameplural'] = 'bimtwos';
$string['bimtwofieldset'] = 'Custom example fieldset';
$string['bimtwoname'] = 'bimtwo name';
$string['bimtwoname_help'] = 'This is the content of the help tooltip associated with the bimtwoname field. Markdown syntax is supported.';
$string['bimtwo'] = 'bimtwo';
$string['pluginadministration'] = 'bimtwo administration';
$string['pluginname'] = 'bimtwo';

/*
 * Configuration FORM
 */

// General settings
$string['bimfieldset'] = 'bim2 settings';
$string['intro'] = 'About bim2 activity';
$string['form_intro'] = 'About the activity';
$string['form_intro_help'] = 'Expected to describe the purpose of the activity. Is displayed to students when they register and view details about their blog/feed.';

$string['name'] = 'Name of bim2 activity';
$string['form_name'] = 'bim2 activity name';
$string['form_name_help'] = 'The name is what student and staff will see on the course page. It is what they will click onto access the activity.';

$string['bim_submit'] = 'Submit';
$string['bim_cancel'] = 'Cancel';

$string['bim_error_updating'] = 'Error updating database';

// bim2 specific

$string['register_feed'] = 'Allow registration?';
$string['form_register'] = 'About registration';
$string['form_register_help'] = 'Students must register their feed before the activity can start tracking what they post. If registration is turned off, students cannot register. Typically this is because activity configuration is not complete. It may also be due to wanting to prevent students from registering after a set date.</p> <p>To allow students to register their feed, select this option.</p> <p>If you do not want students to register their feed, do not select it.</p>';
$string['mirror_feed'] = 'Enable mirroring?';
$string['form_mirror'] = 'About mirroring.';
$string['form_mirror_help'] = '<p>BIM creates a mirror of the feed for each student blog or resource. A mirror is a local up-to-date copy of the feed.</p> <p>While this option is selected the feeds registered for this course will be mirrored. De-select and the mirror process will cease.</p> <p>Typically the mirror process is only left on while the course is being offered.</p> <p>The mirror process is run once when the student first registers their feed. It is then run every hour on all student feeds to see if any changes have occured.</p>';

$string['grade_feed'] = 'Enable grading?';
$string['form_grade'] = 'About grading';
$string['form_grade_help'] = '<p>If this option is selected then a new field will appear in the gradebook for this course.  The name of the field will match the name of this BIM activity.</p> <p>When you release students\' marked posts the mark will appear in that field in the gradebook. The final result for each student in the gradebook will be the total of all the student\'s released posts added together.</p>';


/**
 * Student activity details view
 */

$string['student_details'] = 'Activity Details';
$string['questions_title'] = 'Questions';
$string['student_posts'] = 'Your posts';

/**
 * Show details tab
 */

$string['show_details_about_heading'] = 'Activity details ({$a})';
$string['show_details_activity'] = 'Activity configuration';
$string['show_details_regok_heading'] = 'Successful registration';
$string['show_details_regok_body'] = '<p>Your feed has been succesfully registered. Details of what was found appears below.</p><p>You can also click on the "Your posts" tab above to see a complete list of the posts that have been mirrored by the activity.</p>';

$string['show_details_help_heading'] = 'Help';
$string['show_details_help'] = '<p>Use the three tabs above to view different information about this activity, including:</p><ul><li><strong>Activity details</strong>;<br />Summary information about your participation in this activity (this page).</li><li> <strong>Questions</strong>;<br />View the list of questions you need to respond to for this activity.</li><li><strong>Your posts</strong>.<br />View what is known about the posts you have made to this activity.</li></ol>';

$string['show_details_student'] = 'Student:';
$string['show_details_blog'] = 'Your blog:';
$string['show_details_mirrored'] = 'Number of posts mirrored:';
$string['show_details_given'] = 'Number of answers given/Number of answers required:';
$string['show_details_released'] = 'Number released/Number marked:';
$string['show_details_progress'] = 'Progress result:';

$string['show_details_blog_help'] = 'This is the location of the blog/feed you have registered with the activity. This is where the activity expects you to be posting your answers to the questions. Click on the URL shown to be taken to the registered blog/feed';
$string['show_details_mirrored_help'] = 'The activity keeps a copy (mirrors) the posts you make on your blog/feed. The number of posts currently mirrored is shown.';
$string['show_details_given_help'] = 'After your posts are mirrored by the activity they are allocated to questions, if they match. This shows the number of answers you are required to give (the total number of questions for the activity) and the number of your posts that have been allocated. e.g. 0 / 3 suggests that none of your posts have been allocated as an answer to a question and that you need to answer 3 questions.';
$string['show_details_released_help'] = 'Eventually someone will mark your answers. You will not be able to see the mark and comments until they are released. This shows the total number of your answers that have been marked and the number released. e.g. 1 / 3 suggests that 1 of your answers has been released out of 3 that have been marked.';
$string['show_details_progress_help'] = 'For each answer that is marked you will probably be awarded a mark. This shows the total number of marks you have recieved so far and the maximum overall mark you could achieve. e.g. 5/10 suggests you have recieved 5 marks so far, and the best mark anyone could achieve is 10.';

/**
 * Student details, not registered, can't register
 */

$string['not_registered_no_register_heading'] = 'Unable to register';
$string['not_registered_no_register_desc'] = '<p>In order to contribute to this activity, you must register your blog or feed. To do this, the teaching staff must turn on registration for this activity. They have not done this yet.</p><p>Until registration is turned on, you will not be able to contribute to this activity.</p><p>Once you have registered your blog/feed, the <em>Questions</em> and <em>Your posts</em> tabs above will operate.</p><p>The rest of this page shows what is known about the activity.</p>';

/**
 * Student show questions tab
 */

$string['student_show_qs_heading'] = 'Questions for this activity';
$string['student_show_qs_descrip'] = '<p>This activity currently has {$a} questions. These are shown in the following table.</p><p><strong>IMPORTANT:</strong> When you answer a question, please make sure that the title of your answer contains the title of the question.</p><p>For example, if the question title is <strong>Week 12</strong> try to include <strong>Week 12</strong> in the title of your post. This allows your answer to be automatically allocated to the question and saves you some time.</p>';
$string['show_qs_title'] = 'Title';
$string['show_qs_description'] = 'Description';

/**
 * Student show posts tabe
 */

$string['show_posts_details'] = 'Details';
$string['show_posts_post'] = 'Post';

$string['show_posts_markers_comment'] = 'Marker\'s comment';
$string['show_posts_question_alloc'] = 'Allocated to:';

/**
 * Help on status
 */

$string['status_Unallocated'] = 'status set to "Unalloacted". This means that the post has been copied onto the Moodle server but has **not** been automatically matched to one of the questions that have been set for this activity. It is possible that the post may be manually matched to one of the set questions by a marker.';
// It complains if the following isn't there, but it is not used??
$string['status_Unallocated_help'] = '';
$string['status_Allocated'] = 'status set to "Allocated"<br />This means that the post has been matched to one of the set questions for the activity. However, the post has not been marked yet.';
$string['status_Allocated_help'] = '';
$string['status_Marked'] = "status set to \"Marked\". 

This means that an initial mark has been given for your post. However, this mark has to be moderated and then released before you can see the details.";
$string['status_Marked_help'] = '';
$string['status_Released'] = 'status set to "Released". This means that the post has been marked, moderated and then released for you to see the results.';
$string['status_Released_help'] = '';

/**
 * bim_details_view
 */

$string['student_details_title'] = 'Your details';
$string['register_feed_config' ] = 'Option';
$string['register_feed_value' ] = 'Value';
$string['register_feed_name' ] = 'Activity name';
$string['register_feed_status' ] = 'Registration allowed?';
$string['register_feed_status_help' ] = 'If turned on, students are able to register their blogs/feeds';
$string['register_feed_on'] = 'Yes';
$string['register_feed_off'] = 'No';
$string['mirror_feed_status' ] = 'Mirroring on?';
$string['mirror_feed_status_help' ] = 'If turned on, the activity will be trying to regularly make copies of student posts.';
$string['mirror_feed_on'] = 'Yes';
$string['mirror_feed_off'] = 'No';
$string['grade_feed_status' ] = 'Grading on?';
$string['grade_feed_status_help' ] = 'If turned on, your marks for this activity will be recorded in the course gradebook.';
$string['grade_feed_on'] = 'Yes';
$string['grade_feed_off'] = 'No';

$string['bim_details_title'] = 'Activity description';
$string['bim_details_none'] = '<em>No description provided for this activity.</em>';

/**
 * student posts tab
 **/

$string['student_posts_title'] = 'Your posts';
$string['student_posts_list_title'] = 'All your posts';
$string['student_posts_list_desc'] = '<p>The following table shows details for all of your posts known about by this activity in the order they were first published.</p>';

/**
 * Registration form
 */

$string['bim_please_register_heading'] = 'Please register your blog';
$string['bim_please_register_description'] = '<p>Copy the URL of your blog/feed into the box below and hit the <em>Register your blog</em> button. At this stage BIM will:</p><ol><li>Check your URL for any problems.<p>If there are any problems it will tell you what they are and ask you to register the correct URL.</p></li><li>Make a copy (mirror) any existing posts on your blog into this system.<p><strong>Warning:</strong> This may take a little while, please be patient.</p></li><li>Display details of what it found.<p>This is how you can check what BIM knows about your blog. Once you register your blog, BIM will only ever show  you the details.</p></li></ol>';
$string['bim_please_register_blogurl'] = 'Blog URL';
$string['bim_register'] = 'Register your blog';

// error messages on registering url
//$string['bad_url_heading'] = 'Badly formed URL for blog';
//$string['bad_url_desc'] = '<p>The URL for the blog you entered</p><blockquote>{$a->url}</blockquote><p>is not a valid url. A typical blog url will look something like</p><blockquote>http://davidtjones.wordpress.com</blockquote>';

// Errors when attempting to mirror student blog
$string['new_feed_error_title'] = 'Error retrieving the URL - {$a}';
$string['new_feed_nofound_error'] = '<p class="warning">Unable to find the feed that is necessary to keep a copy of your posts.</p><p>This may be because there is no feed associated with the URL you provided.</p>';
$string['new_feed_timeout_error'] = '<p class="warning">Unable to retrieve the URL you provided. The connection timed out. This might mean that the network connection between Moodle and your URL is having problems, or that there is a problem with your URL.</p>';
$string['new_feed_noretrieve_error'] = '<p class="warning">Unable to access the URL you provided.</p>';
$string['new_feed_tryagain'] = '<p>You will need to try again. Before doing so, please try to visit the URL you are trying to register with your own Web-browser. Does the URL work? Is it the site you wish to register?</p>';
$string['new_feed_wordpress'] = '<p>The URL you tried to register is not for your individual blog. Instead it is general page on the Wordpress.com site. Your individual blog URL will look something like<blockquote>http://davidtjones.wordpress.com/</blockquote>Where the <em>davidtjones</em> is replaced with the name you gave your blog.</p>';

/****************************
 * Coordinator
 */

//** Tabs

$string['coordinator_configure'] = 'Configure bim2';
$string['coordinator_questions'] = 'Manage Questions';
$string['coordinator_markers'] = 'Allocate Markers';
$string['coordinator_marking'] = 'Manage Marking';
$string['coordinator_find'] = 'Find Student';
$string['coordinator_students'] = 'Your Students';

//** Configure screen

$string['configure_direction'] = '<p>The initial configuration of BIM (and any changes to that configuration) should be done using the <a href="{$a->wwwroot}/course/modedit.php?update={$a->cmid}&return=1">standard activity configure interface</a>.</p><p>Some basic advice on the steps to configure a BIM activity are <a href="#steps">provided below</a>.</p>';
$string['configure_steps_header'] = '<a name="#steps"></a>General steps for configuring a bim2 activity';
$string['configure_steps'] = '<p>Configuring a bim2 activity will normally include these steps:</p><ul><li>General configuration;<br />Using the <a href="{$a->wwwroot}/course/modedit.php?update={$a->cmid}&return=1">standard activity configure interface</a> provivde the title and description of the activity as well as other settings such as whether it should be graded, start mirroring posts or allow students to register.</li><li>Manage questions; and,<br />Using the <em>Manage questions</em> tab above specify a set of questions students will be expected to answer on their blog.</li><li>Allocate markers<br />Using the <em>Allocate markers</em> tab above allocate groups of students to specific markers. <strong>Important:</strong> This needs to be done before staff can see student details.</li></ul>';


?>
