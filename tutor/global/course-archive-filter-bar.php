<?php
/**
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

    $sort_by = '';
    isset($_GET["tutor_course_filter"]) ? $sort_by = $_GET["tutor_course_filter"] : 0;
    isset($_POST["tutor_course_filter"]) ? $sort_by = $_POST["tutor_course_filter"] : 0;
?>


