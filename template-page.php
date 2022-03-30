<?php
/**
 * Template used for pages.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<div class="content-margin">
  <section id="content" <?php ( class_exists( 'Avada' ) ? Avada()->layout->add_style( 'content_style' ) : '' ); ?>>
    <?php if ( have_posts() && ! is_search() && ! is_404() && is_archive() && ! ( ! is_front_page() && is_home() ) ) : ?>
      <?php
        $blog_layout = avada_get_blog_layout();
        $post_class = 'fusion-post-' . $blog_layout;
      ?>
      <!--
      <div class="post-content">
        <?php //do_action( 'fusion_template_content' ); ?>
      </div>
      -->
      <?php $test = do_action( 'fusion_template_content' ); print_r($test); ?>
      <?php 
        while (have_posts()) {
          the_post();
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
          <?php 
            $excerpt = fusion_get_post_content_excerpt( $length, false, $post->ID );
            $break_tag_removed = substr($excerpt, 4);
            echo $break_tag_removed;
          ?>
        </div><!-- fusion-post-content-container -->
        <div class="fusion-meta-info">
          <?php echo fusion_render_post_metadata( 'standard' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
          <?php $link_target = ( 'yes' === fusion_get_page_option( 'link_icon_target', $post->ID ) || 'yes' === fusion_get_page_option( 'post_links_target', $post->ID ) ) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>
          <div class="fusion-alignright">
            <a href="<?php echo esc_url_raw( get_permalink() ); ?>" class="fusion-read-more"<?php echo $link_target; // phpcs:ignore WordPress.Security.EscapeOutput ?> aria-label="<?php esc_attr_e( 'More on', 'Avada' ); ?> <?php the_title_attribute(); ?>">
              <?php echo esc_textarea( apply_filters( 'avada_read_more_name', esc_attr__( 'Read more', 'Avada' ) ) ); ?>
            </a>
          </div><!-- fusion-alignright -->
        </div><!-- fusion-meta-info -->
        </div><!-- fusion-post-content -->
      </article>
      <?php } ?>
    <?php endif; ?>
  </section>
</div>
<?php do_action( 'avada_after_content' ); ?>
<?php get_footer(); ?>
