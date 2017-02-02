<?php
	if ( post_password_required() )
	return;
?>
<div class="leave-a-replay #comm" id="comm">
<?php
	comment_form(array( 
		"comment_field"=>"<p class='small-txt mt10 ".(is_user_logged_in() ? 'commentlogged' : '')."'><textarea class=\"textarea-a\" name=\"comment\" onblur=\"if(this.value=='') this.value='".__("Add your comment",'creativeMag')."';\" onfocus=\"if(this.value=='".__("Add your comment",'creativeMag')."') this.value='';\">".__("Add your comment",'creativeMag')."</textarea></p>",
		"id_form"=>"commentform",
		"id_submit"=>"btn-leave-comment",
		"comment_notes_after"=>"<br class='clear'/>",
		"logged_in_as"=>"",
		"must_log_in"=>"",
		"title_reply"=>"",
		'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="fields-block"><p class="small-txt mt10">  <input   name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"  class="comment-input input-name" /></p>',
		
		
		'email' => '<p class="small-txt mt10"> <input  name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"    class="comment-input input-mail" /></p>',
		
		
		'url' => '
	<p class="small-txt mt10"> <input   name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="comment-input input-web"   /></p></div>' ) ) 
		
	));
?>
</div> 
 
 
				<div id="comment_area">
                <?php wp_list_comments('type=comment&callback=creativemag_comment'); ?>
				</div>
				 <div class="navigation">
						<?php paginate_comments_links(); ?> 
				 </div>