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

$instructor = IP_Tutor_Public::get_ip_tutor_instructor_data( get_the_ID() );
$profile_url = $instructor['profile_url'];
$profile_picture_url = $instructor['profile_picture_url'];
$name = $instructor['name'];
$short_biography = $instructor['bio'];
$job_title = $instructor['job_title'];
	
?>
<h4 class="tutor-segment-title"><?php _e('About the instructor', 'tutor'); ?></h4>

<div class="tutor-course-instructors-wrap tutor-single-course-segment" id="single-course-ratings">
	<div class="single-instructor-wrap">
		<div class="single-instructor-top">
			<div class="tutor-instructor-left">
				<div class="instructor-avatar">
					<a href="<?php echo $profile_url; ?>">
            <img src="<?php echo $profile_picture_url; ?>">
					</a>
				</div>

				<div class="instructor-name">
          <h3>
            <a href="<?php echo $profile_url; ?>"><?php echo $name; ?></a>
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


