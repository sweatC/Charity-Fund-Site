<?php
/**
 * The template for displaying Comments.
 *
 * @package WPlook
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>

<a name="comments"></a>
<div class="comments">
	<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'Этот пост защищен паролем. Введите пароль для просмотра комментариев.', 'charitas' ); ?></p>
</div>
<!-- #comments -->

<?php return; endif; ?>
<?php if ( have_comments() ) : ?>
	
	<header class="comment-header"><!-- TODO: COMMENTS COUNTER -->
		<h1 class="comment-title"><?php	printf( _n( 'Один комментарий', '%2$s %1$s', get_comments_number(),'charitas' ), get_comments_ending(), number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );	?>, <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Comments RSS', 'charitas'); ?>"><?php _e('RSS', 'charitas'); ?></a></h1>
	</header>
	
	<ul class="commentlist">
		<?php	wp_list_comments( array( 'callback' => 'wplook_comment' ) ); ?>
	</ul>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	
	<nav id="nav-below">
		<div class="nav-previous fleft"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'charitas' ) ); ?>	</div>
		<div class="nav-next fright"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'charitas' ) ); ?></div>
		<div class="clear"></div>
	</nav> <!-- .navigation -->

<?php endif; // check for comment navigation ?>
<?php else : // or, if we don't have comments:
	if ( ! comments_open() ) :
?>

<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>
<?php wplook_comment_form(  ); ?>
</div>
<!-- end #comments -->