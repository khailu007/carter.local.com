<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package agriox
 */

get_header();
?>

<!--Blog Sidebar Start-->
<section class="news-details">
	<div class="container">
		<div class="row">
			<?php $agriox_content_class = (is_active_sidebar('sidebar-1')) ? "col-xl-8 col-lg-7" : "col-xl-12 col-lg-12" ?>
			<div class="<?php echo esc_attr($agriox_content_class); ?>">
				<div class="news-details__left">
					<div id="primary" class="site-main">

						<?php
						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content', get_post_type());


							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</div><!-- #main -->
				</div>
			</div>
			<?php if (is_active_sidebar('sidebar-1')) : ?>
				<div class="col-xl-4 col-lg-5 <?php echo esc_attr(agriox_blog_layout()); ?>">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<!--Blog Sidebar End-->

		<div class="container">
			<h3 class="heading-section"> Bài viết liên quan</h3>
	            <div class="row">
					<?php
					    $categories = get_the_category(get_the_ID());
					    if ($categories) 
					    {
					        $category_ids = array();
					        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
					 
					        $args=array(
					        'category__in' => $category_ids, //Set category hiện tại
					        'post__not_in' => array(get_the_ID()), //Set bài viết đang được hiện tại để loại trừ khi hiển thị bài viết liên quan
					        'showposts'=> 3, // Số bài viết bạn muốn hiển thị.
					        'ignore_sticky_posts'=>1
					        );
					        $my_query = new wp_query($args);
					        if( $my_query->have_posts() ) 
					        {
					            //echo '<h3>Bài viết liên quan</h3><ul class="list-news">';
					            while ($my_query->have_posts())
					            {
					                $my_query->the_post();
					                ?>
				                		<div class="related-post col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
						                	<div class="new-img">
						                		<a href="<?php the_permalink(); ?>">
						                			<?php the_post_thumbnail(array(370, 233)); ?>
						                		</a>
						                	</div>
						                	<div class="item-list">
						                		<h4><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						                		<p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
						                	</div>
						                </div>
			                	<?php
				            }
				            //echo '</ul>';
				        }
				    }
				?>
				</div>
		</div>
<?php
get_footer();
