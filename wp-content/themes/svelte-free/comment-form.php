<form action="<?php echo  site_url() ?>/wp-comments-post.php" method="post" id="commentform" autocomplete="off"  >

	<?php if ( $user_ID ) : ?>
	
	<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
	
	<?php else : ?>
	
	<div class="comment-fields">
	  
		<input type="text" name="author" id="com-author" onfocus="if(this.value == 'Name') { this.value = ''; }" value="Name" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		
		<input type="text" name="email" id="com-email" onfocus="if(this.value == 'Email') { this.value = ''; }" value="Email" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		
		<div class="clear"></div>
		
	</div><!-- /.comment-fields -->
	
	<?php endif; ?>
	
	<div class="comment-field-message">
	<textarea name="comment" id="com-comment" rows="10" onfocus="if(this.value == 'Comment') { this.value = ''; }" tabindex="4">Comment</textarea>
	</div>
	
	<div class="comment-bottom">	
	  
	  <input type="text" name="url" id="com-url" onfocus="if(this.value == 'Website (optional)') { this.value = ''; }" value="Website (optional)" size="22" tabindex="3" />

	  <input name="submit" type="submit" id="com-submit" tabindex="5" value="Post Comment" class="submit" />
	
	<div class="clear"></div>
		
	</div><!-- /.comment-bottom -->
	
	<?php comment_id_fields(); ?>
	
	<?php do_action('comment_form', $post->ID); ?>

</form> 