<?php /* Template Name: About page 
 *
 * @package OffKey
 */

get_header(); ?>
            <section class="about-hero">
                <h1><?php the_title(); ?></h1>
            </section>
            <div class= "about-text">
                <?php
                $props=CFS()->get_field_info('our_story');
                ?>
                <?php echo CFS()->get( 'our_story'); ?>
            </div>

	</div><!-- #primary -->
<?php get_footer();  ?>