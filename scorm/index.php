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
 * Displays different views of the SCORM report.
 *
 * @package    report_scorm
 * @copyright  2017 Monir Bhuiyan ACME
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->dirroot.'/mod/scorm/locallib.php');
require_once($CFG->dirroot.'/mod/scorm/reportsettings_form.php');
require_once($CFG->dirroot.'/mod/scorm/report/reportlib.php');
require_once($CFG->libdir.'/formslib.php');
require_once($CFG->libdir . '/csvlib.class.php');

$url = new moodle_url('/report/scorm/index.php');

$PAGE->set_url($url);

// Open the Scorm report and display it.
$classname = "scormreport";
$legacyclassname = "scormreport";
$report = class_exists($classname) ? new $classname() : new $legacyclassname();
$report->display($cm, $course, $download); // Run the report!
$report->filterform($scorm, $cm, $course, $download); // display fiter form!

// Print footer.

if (empty($noheader)) {
    echo $OUTPUT->footer();
}
