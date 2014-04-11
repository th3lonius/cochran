<div id="comments">

          <?php if ( post_password_required() ) : ?>
					<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'svelte' ); ?></p>
          			</div><!-- #comments -->
          <?php
					return;
					endif;
          ?>

          <?php           ?>

          <?php if ( have_comments() ) : ?>

          <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
          			<div class="navigation">
          				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'svelte' ) ); ?></div>
          				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'svelte' ) ); ?></div>
          			</div> <!-- .navigation -->
          <?php endif; // check for comment navigation ?>

          			<ol class="commentlist">
          				<?php
          					/* Loop through and list the comments. Tell wp_list_comments()
          					 * to use svelte_comment() to format the comments.
          					 * If you want to overload this in a child theme then you can
          					 * define svelte_comment() and that will be used instead.
          					 * See svelte_comment() in svelte/functions.php for more.
          					 */
          					wp_list_comments( array( 'callback' => 'svelte_comment' ) );
          				?>
          			</ol>

          <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
          			<div class="navigation">
          				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'svelte' ) ); ?></div>
          				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'svelte' ) ); ?></div>
          			</div><!-- .navigation -->
          <?php endif; // check for comment navigation ?>

          <?php else : // or, if we don't have comments:

          	/* If there are no comments and comments are closed,
          	 * let's leave a little note, shall we?
          	 */
          	if ( ! comments_open() ) :
          ?>
          	<p class="nocomments"><?php _e( 'Comments are closed.', 'svelte' ); ?></p>
          <?php endif; // end ! comments_open() ?>

          <?php endif; // end have_comments() ?>

          <div id="respond">

          <h3 class="separator"><?php comment_form_title( 'Leave a comment' ); ?></h3>

          <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
          <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
          <?php else : ?>
		  
		  <?php if(comments_open()) :  ?>
					<?php include(dirname(__FILE__).'/comment-form.php') ?>
		  <?php else: ?>
					<p><?php _e('Comments Closed') ?></p>
		  <?php endif; ?>

          <?php endif; // If registration required and not logged in ?>
          </div>

</div><!-- #comments -->