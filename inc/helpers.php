<?php

/**
 * @param $filename
 * @return string
 */
function mmtheme_asset_path($filename)
{
   return get_template_directory_uri() . $filename;
}

/**
 * Site Branding
 */
function mmtheme_site_branding() {
  if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
  ?>
    <span class="site-branding">
		  <?php the_custom_logo(); ?>  
    </span>
  <?php
	}
  else {
  ?>
  <a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    <?php if ( is_front_page() && is_home() ) : ?>
      <h1 class="title"><?php bloginfo( 'name' ); ?></h1>
    <?php else : ?>
      <span class="title"><?php bloginfo( 'name' ); ?></span>
    <?php endif; ?>
  </a>
  <?php
  }
}

/**
 * Page titles
 * @return string
 */
function mmtheme_title()
{
    if (is_home()) {
        if ($home = get_option('page_for_posts', true)) {
            return get_the_title($home);
        }
        return ''; //__('Latest Posts', 'mmtheme')
    }
    if (is_archive()) {
        return get_the_archive_title();
    }
    if (is_search()) {
        return sprintf(__('Search Results for %s', 'mmtheme'), get_search_query());
    }
    if (is_404()) {
        return __('Not Found', 'mmtheme');
    }
    return get_the_title();
}

/**
 * Comments
 */
function mmtheme_comment($comment, $args, $depth) {
  if ( 'div' === $args['style'] ) {
      $tag       = 'div';
      $add_below = 'comment';
  } else {
      $tag       = 'li';
      $add_below = 'div-comment';
  }
  ?>
  <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
      <div id="div-comment-<?php comment_ID() ?>" class="section">
  <?php endif; ?>
  
  <div class="media media-left">
    <div class="thumbnail thumbnail-small thumbnail-rounded">
      <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <div class="media-body">
      <div class="comment-author vcard">
          <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
          <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
      <?php endif; ?>

      <div class="comment-meta entry-meta text-small commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
          <?php
          /* translators: 1: date, 2: time */
          printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
          ?>
      </div>

      <div class="comment-body">
        <?php comment_text(); ?>
      </div>

      <div class="reply entry-meta">
          <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div>      
    </div>
  </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif; ?>
  <?php
}