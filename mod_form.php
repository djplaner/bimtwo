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
 * The main bimtwo configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package   mod_bimtwo
 * @copyright 2010 David Jones
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_bimtwo_mod_form extends moodleform_mod {

    function definition() {

        global $COURSE;
        $mform =& $this->_form;

//-------------------------------------------------------------------------------
    /// Adding the "general" fieldset, where all the common settings are showed        $mform->addElement('header', 'general', get_string('general', 'form'));

    /// Adding the standard "name" field
        $mform->addElement('text', 'name', get_string('name', 'bimtwo'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength',
 255, 'client');
        $mform->addHelpButton( 'name', 'form_name', 'bimtwo' ); 

    /// Adding the required "intro" field to hold the description of the instance
/*        $editor_settings = array( 'canUseHtmlEditor'=>'detect',
                   'rows' => 20, 'cols' => 40, 'width' => 0,
                   'height' => 0, 'course' => 0 );
        $mform->addElement('htmleditor', 'intro', get_string('intro', 'bimtwo'),
                          $editor_settings); 
        $mform->setType('intro', PARAM_RAW);
        $mform->addRule('intro', get_string('required'), 'required', null, 'clien
t');*/
        $this->add_intro_editor( true, get_string('intro','bimtwo'));
        $mform->addHelpButton( 'intro', 'form_intro', 'bimtwo' );

    /// Adding "introformat" field
//        $mform->addElement('format', 'introformat', get_string('format'));
//-------------------------------------------------------------------------------
    /// Adding the rest of bim settings, spreeading all them into this fieldset
    /// or adding more fieldsets ('header' elements) if needed for better logic


        $mform->addElement('header', 'bimfieldset', get_string('bimfieldset', 'bimtwo'));
        $mform->addElement('advcheckbox', 'register_feed',
                    get_string('register_feed', 'bimtwo'), '' );
//        $mform->addElement('advcheckbox', 'change_feed', 
 //                   get_string('change_feed', 'bimtwo'), '' ); 
        $mform->addElement('advcheckbox', 'mirror_feed',
                    get_string('mirror_feed', 'bimtwo'), '' );
        $mform->addElement('advcheckbox', 'grade_feed',
                    get_string('grade_feed', 'bimtwo'), '' );

        $mform->addHelpButton( 'register_feed', 'form_register', 'bimtwo' );
        $mform->addHelpButton( 'mirror_feed', 'form_mirror', 'bimtwo' );
        $mform->addHelpButton( 'grade_feed','form_grade', 'bimtwo' );

//-------------------------------------------------------------------------------
        // add standard elements, common to all modules
        $features = new stdClass;
        $features->groups = false;
        $this->standard_coursemodule_elements( $features);
//-------------------------------------------------------------------------------
        // add standard buttons, common to all modules
        $this->add_action_buttons();

    }
}
