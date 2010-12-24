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
$string['bimfieldset'] = 'BIM settings';
$string['intro'] = 'About BIM activity';
$string['intro_help'] = 'Describes the purpose of this particular BIM activity and will be displayed to students when they register and view details about their blog/feed.';

$string['name'] = 'Name of BIM activity';
$string['name_help'] = '<p>This becomes the name users will click on from the course page to access the bim2 activity.</p>';

$string['bim_submit'] = 'Submit';
$string['bim_cancel'] = 'Cancel';

$string['bim_error_updating'] = 'Error updating database';

// bim2 specific

$string['register_feed'] = 'Allow registration?';
$string['register_feed_help'] = '<p>Typically students have to register a Web feed for their blog or other service before BIM can start doing anything useful.</p> <p>To allow them to register their feed, select this option.</p> <p>If you do not want students to register their feed, do not select it.</p>';
$string['mirror_feed'] = 'Enable mirroring?';
$string['mirror_feed_help'] = '<p>BIM creates a mirror of the feed for each student blog or resource. A mirror is a local up-to-date copy of the feed.</p> <p>While this option is selected the feeds registered for this course will be mirrored. De-select and the mirror process will cease.</p> <p>Typically the mirror process is only left on while the course is being offered.</p> <p>The mirror process is run once when the student first registers their feed. It is then run every hour on all student feeds to see if any changes have occured.</p>';

$string['grade_feed'] = 'Enable grading?';
$string['grade_feed_help'] = '<p>If this option is selected then a new field will appear in the gradebook for this course.  The name of the field will match the name of this BIM activity.</p> <p>When you release students\' marked posts the mark will appear in that field in the gradebook. The final result for each student in the gradebook will be the total of all the student\'s released posts added together.</p>';

