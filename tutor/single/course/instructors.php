<?php
/**
 * Template for displaying course instructors/ instructor
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

do_action('tutor_course/single/enrolled/before/instructors');

$instructor_id = IP_Tutor_Public::get_current_course_instructor_post_id( get_the_ID() );
$profile_url = get_post( $instructor_id )->guid;
$profile_name = IP_Tutor_Public::get_current_course_instructor_name( get_the_ID() );
$short_biography = IP_Tutor_Public::get_current_course_instructor_bio( get_the_ID() );
$job_title = IP_Tutor_Public::get_current_course_instructor_job_title( get_the_ID() );

$instructors = tutor_utils()->get_instructors_by_course();
	
?>
<h4 class="tutor-segment-title"><?php _e('About the instructor', 'tutor'); ?></h4>

<div class="tutor-course-instructors-wrap tutor-single-course-segment" id="single-course-ratings">
	<div class="single-instructor-wrap">
		<div class="single-instructor-top">
			<div class="tutor-instructor-left">
				<div class="instructor-avatar">
					<a href="<?php echo $profile_url; ?>">
						<?php echo get_the_post_thumbnail( $instructor_id, 'tutor-text-avatar' ); ?>
					</a>
				</div>

				<div class="instructor-name">
						<h3>
							<a href="<?php echo $profile_url; ?>"><?php echo $profile_name; ?></a>
						</h3>
						<?php
						if ( ! empty( $job_title ) ) {
								echo "<h4>{$job_title}</h4>";
						} else {
							echo "<h4>NIL</h4>";
						}
						?>
				</div>
			</div>
			<div class="instructor-bio">
				<?php 
				if ( ! empty( $short_biography ) ) {
					echo $short_biography;
				} else {
					echo "NIL";
				}
				?>
			</div>

		</div>
	</div>
</div>

<?php
do_action('tutor_course/single/enrolled/after/instructors');
?>


