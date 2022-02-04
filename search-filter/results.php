<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() )
{
  $blog_layout = avada_get_blog_layout();
  $post_class = 'fusion-post-' . $blog_layout;
	?>
	
<!--
  Overriding default behavior
	Found <?php //echo $query->found_posts; ?> Results<br />
	Page <?php //echo $query->query['paged']; ?> of <?php //echo $query->max_num_pages; ?><br />
	
	<div class="pagination">
		
		<div class="nav-previous"><?php //next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php //previous_posts_link( 'Newer posts' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
      /*
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
      */
		?>
	</div>
	
-->

<!-- Adding new results markup -->

<div class="fusion-blog-shortcode fusion-blog-shortcode-1 fusion-blog-archive fusion-blog-layout-large fusion-blog-no fusion-blog-no-images factfinder-list">
  <div class="fusion-posts-container fusion-posts-container-no">
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		<article <?php post_class( $post_class ); ?>>
      <div class="fusion-post-content post-content">
      <?php // Get use Avada to get the title ?>
      <?php echo avada_render_post_title( $post->ID ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		  <div class="fusion-post-content-container">	
      <?php 
        // Use the Avada class to get the excerpt from UI settings,
        // then use a fusion function to render the excerpt output,
        // allowing html markup (2nd param false)
      ?>
      <?php
        $length = 50;
        if ( ! is_null( Avada()->settings->get( 'excerpt_length_blog' ) ) ) {
          $length = Avada()->settings->get( 'excerpt_length_blog' );
        }
      ?>
	    <?php echo fusion_get_post_content_excerpt( $length, false, $post->ID ) ?>
			<?php 
      /*
				if ( has_post_thumbnail() ) {
					echo '<p>';
					the_post_thumbnail("small");
					echo '</p>';
				}
        */
			?>
			<p><?php the_category(); ?></p>
			<p><?php the_tags(); ?></p>
			<p><small><?php the_date(); ?></small></p>
			
        </div><!-- fusion-post-content-container -->
      </div><!-- fusion-post-content -->
		</article>
		
		<hr />
		<?php
	}
	?>
  <!--
	Page <?php //echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br />
	
      <div class="pagination">
        
        <div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
        <div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
        <?php
          /* example code for using the wp_pagenavi plugin */
          if (function_exists('wp_pagenavi'))
          {
            echo "<br />";
            wp_pagenavi( array( 'query' => $query ) );
          }
        ?>
      </div>
  -->
    </div><!--fusion-posts-container -->
  </div><!--fusion-blog-shortcode -->
	<?php
}
else
{
	echo "No Results Found";
}
?>
