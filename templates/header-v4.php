<?php
/**
 * Header-v4 template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<div class="fusion-header-sticky-height"></div>
<div class="fusion-sticky-header-wrapper"> <!-- start fusion sticky header wrapper -->
	<div class="factfinder-header fusion-header">
    <?php if ( 'flyout' === Avada()->settings->get( 'mobile_menu_design' ) ) : ?>
      <div class="fusion-header-has-flyout-menu-content">
    <?php endif; ?>
		<div class="fusion-flex-container">
      <div class="fusion-row fusion-flex-justify-content-space-between">
        <div class="fusion-flex-column">
          <?php avada_logo(); ?>
        </div>
        <?php if ( is_active_sidebar( 'header-inst-logo' ) ) : ?>
          <div class="fusion-flex-column">
            <div class="header-inst-logo-wrapper">
              <?php dynamic_sidebar( 'header-inst-logo' ); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if ( 'flyout' === Avada()->settings->get( 'mobile_menu_design' ) ) : ?>
      <?php get_template_part( 'templates/menu-mobile-flyout' ); ?>
    <?php else : ?>
      <?php get_template_part( 'templates/menu-mobile-modern' ); ?>
    <?php endif; ?>
    <?php if ( 'flyout' === Avada()->settings->get( 'mobile_menu_design' ) ) : ?>
    <?php endif; ?>
		</div>
	</div>
