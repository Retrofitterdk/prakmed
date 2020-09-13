<?php
/**
* The template for displaying single custom post type prakmed_course.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package PrakMed
*/
$course_folder = get_post_meta( get_the_ID(), 'prakmed_course_folder', true );
$course_launcher = new CourseController();
$course_launcher->course($course_folder);