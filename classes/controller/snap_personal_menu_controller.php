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

namespace theme_snap\controller;

defined('MOODLE_INTERNAL') || die();

/**
 * Deadlines Controller.
 * Handles requests regarding user deadlines and other CTAs.
 *
 * @package   theme_snap
 * @copyright Copyright (c) 2015 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class snap_personal_menu_controller extends controller_abstract {
    /**
     * Do any security checks needed for the passed action
     *
     * @param string $action
     */
    public function require_capability($action) {
    }

    /**
     * Get the user's deadlines.
     *
     * @return string
     */
    public function get_deadlines_action() {
        return json_encode(array(
            'html' => \theme_snap\local::deadlines()
        ));
    }

    /**
     * Get the user's graded work.
     *
     * @return string
     */
    public function get_graded_action() {
        return json_encode(array(
            'html' => \theme_snap\local::graded()
        ));
    }

    /**
     * Get the user's messages.
     *
     * @return string
     */
    public function get_messages_action() {
        return json_encode(array(
            'html' => \theme_snap\local::messages()
        ));
    }

    /**
     * Get the user's grading from courses they teach.
     *
     * @return string
     */
    public function get_grading_action() {
        return json_encode(array(
            'html' => \theme_snap\local::grading()
        ));
    }

    /**
     * Get course information - progress / grades, etc
     *
     * @return string
     */
    public function get_courseinfo_action() {
        $courseids = optional_param('courseids', false, PARAM_SEQUENCE);
        if (!empty($courseids)) {
            $courseids = explode(',', $courseids);
        }
        $courseinfo = \theme_snap\local::courseinfo($courseids);
        return json_encode(array(
            'info' => $courseinfo
        ));
    }
}
