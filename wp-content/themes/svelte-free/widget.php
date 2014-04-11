<?php
/**
 * Adds svelte_Widget widget.
 */
class svelte_social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'svelte_social_widget', // Base ID
			'Svelte Social Icons', // Name
			array( 'description' => __( 'Add your social icons that you set in theme options.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		echo __( 'Svelte', 'text_domain' );
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class svelte_Widget

class svelte_twitter_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'svelte_twitter_widget', // Base ID
			'Svelte Twitter Status', // Name
			array( 'description' => __( 'Add you latest Twitter status update.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['twitterUserName'] );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
			?>
            <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/twitterfeed.js"></script>
			<script>
            $(document).ready(function () {
	var displaylimit = 1;
    var twitterprofile = "<?php echo $title;?>";
    var screenname = "<?php echo $title;?>";
    var showdirecttweets = false;
    var showretweets = true;
    var showtweetlinks = true;
    var showprofilepic = true;
 
    var headerHTML = '';
    var loadingHTML = '';
    //headerHTML += '<a href="https://twitter.com/" ></a>';
    //headerHTML += '<h1>'+screenname+' <span style="font-size:13px"><a href="https://twitter.com/'+twitterprofile+'" >@'+twitterprofile+'</a></span></h1>';
    loadingHTML += '<div id="loading-container"></div>';
 
    $('#twitter-feed').html(headerHTML + loadingHTML);
 
    $.getJSON('<?php echo get_template_directory_uri();?>/incl/json.php?twitterId='+twitterprofile,
        function(feeds) {            
            var feedHTML = '';
            var displayCounter = 1;
            for (var i=0; i<feeds.length; i++) {
                var tweetscreenname = feeds[i].user.name;				
                var tweetusername = feeds[i].user.screen_name;
                var profileimage = feeds[i].user.profile_image_url_https;
                var status = feeds[i].text;
                var isaretweet = false;
                var isdirect = false;
                var tweetid = feeds[i].id_str;
 
                //If the tweet has been retweeted, get the profile pic of the tweeter
                if(typeof feeds[i].retweeted_status != 'undefined'){
                   profileimage = feeds[i].retweeted_status.user.profile_image_url_https;
                   tweetscreenname = feeds[i].retweeted_status.user.name;
                   tweetusername = feeds[i].retweeted_status.user.screen_name;
                   tweetid = feeds[i].retweeted_status.id_str
                   isaretweet = true;
                 };
 
                 //Check to see if the tweet is a direct message
                 if (feeds[i].text.substr(0,1) == "@") {
                     isdirect = true;
                 }
 
                //console.log(feeds[i]);
                  
                    if ((feeds[i].text.length > 1) && (displayCounter <= displaylimit)) {
                        if (showtweetlinks == true) {
                            status = addlinks(status);
                        }
 
                        if (displayCounter == 1) {
                            feedHTML += headerHTML;
                        }
 
                        feedHTML += '<div class="twitter-article">';
                        feedHTML += '<div class="twitter-pic"><a href="https://twitter.com/'+tweetusername+'" ><img src="'+profileimage+'"images/twitter-feed-icon.png" width="60" height="60" alt="Twitter Profile Image" /></a></div>';
                        feedHTML += '<div class="twitter-text"><p><span class="tweetprofilelink"><a href="https://twitter.com/'+tweetusername+'" >@'+tweetusername+'</a></span><span class="tweet-time"><a href="https://twitter.com/'+tweetusername+'/status/'+tweetid+'">'+relative_time(feeds[i].created_at)+' ago</a></span><br/>'+status+'</p></div>';
                        feedHTML += '</div>';						
                        displayCounter++;
                 }
            }			
			$('#twitter-feed').html(feedHTML);
    });
 
    //Function modified from Stack Overflow<img src="http://demo.themecobra.com/svelte/wp-content/uploads/sites/7/2013/07/ad1.png" alt="ad" />
    function addlinks(data) {
        //Add link to all http:// links within tweets
        data = data.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
            return '<a href="'+url+'" >'+url+'</a>';
        });
 
        //Add link to @usernames used within tweets
        data = data.replace(/\B@([_a-z0-9]+)/ig, function(reply) {
            return '<a href="http://twitter.com/'+reply.substring(1)+'" style="font-weight:lighter;" >'+reply.charAt(0)+reply.substring(1)+'</a>';
        });
        return data;
    }
 
    function relative_time(time_value) {
      var values = time_value.split(" ");
      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
      var parsed_date = Date.parse(time_value);
      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
      var shortdate = time_value.substr(4,2) + " " + time_value.substr(0,3);
      delta = delta + (relative_to.getTimezoneOffset() * 60);
 
      if (delta < 60) {
        return '1m';
      } else if(delta < 120) {
        return '1m';
      } else if(delta < (60*60)) {
        return (parseInt(delta / 60)).toString() + 'm';
      } else if(delta < (120*60)) {
        return '1h';
      } else if(delta < (24*60*60)) {
        return (parseInt(delta / 3600)).toString() + 'h';
      } else if(delta < (48*60*60)) {
        //return '1 day';
        return shortdate;
      } else {
        return shortdate;
      }
    }
 });
			</script>
            <div id="twitter-feed"></div>
            <?php
		//echo __( 'Svelte', 'text_domain' );
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {		
		if ( isset( $instance[ 'twitterUserName' ] ) ) {
			$title = $instance[ 'twitterUserName' ];
		}
		else {
			$title = __( 'Twitter User Name', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'twitterUserName' ); ?>"><?php _e( 'Twitter User Name:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitterUserName' ); ?>" name="<?php echo $this->get_field_name( 'twitterUserName' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['twitterUserName'] = ( !empty( $new_instance['twitterUserName'] ) ) ? strip_tags( $new_instance['twitterUserName'] ) : '';

		return $instance;
	}

}

class svelte_instagram_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'svelte_instagram_widget', // Base ID
			'Svelte Instagram Feed', // Name
			array( 'description' => __( 'Add you latest Instagram images.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$instagram_user = apply_filters( 'widget_title', $instance['instagram_user'] );
		$instagramPosts = apply_filters( 'widget_title', $instance['instagramPosts'] );
		$access_token = "432480487.5b9e1e6.de7702498472411bbb8b7e0ffb6d5001";
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
        <span class="footer-widget-title">Instagram Feed</span>
        <div class="instagram"></div>
		<script>
        $(function() {
            $.ajax({
                type: "GET",
                dataType: "jsonp",
                cache: false,
                url: "https://api.instagram.com/v1/users/<?=$instagram_user?>/media/recent/?access_token=<?=$access_token?>",
                success: function(data) {
                    for (var i = 0; i < <?=$instagramPosts?>; i++) {
                $(".instagram").append("<div class='instagram-placeholder' style='float:left;padding-right:5px;'><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' style='position:relative;' /></a></div>");   
                    }     
                                    
                }
            });
        });
        </script>
        <?php
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'instagram_user' ] ) ) {
			$title = $instance[ 'instagram_user' ];
		}
		else {
			$title = __( 'Instagram User Id', 'text_domain' );
		}
		if ( isset( $instance[ 'instagramPosts' ] ) ) {
			$instagramPosts = $instance[ 'instagramPosts' ];
		}
		else {
			$instagramPosts = __( 'Number Of Images', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'Instagram User Id' ); ?>"><?php _e( 'Instagram User Name:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_user' ); ?>" name="<?php echo $this->get_field_name( 'instagram_user' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_name( 'Number Of Images' ); ?>"><?php _e( 'Number of Images:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'instagramPosts' ); ?>" name="<?php echo $this->get_field_name( 'instagramPosts' ); ?>" type="text" value="<?php echo esc_attr( $instagramPosts ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['instagram_user'] = ( !empty( $new_instance['instagram_user'] ) ) ? strip_tags( $new_instance['instagram_user'] ) : '';
		$instance['instagramPosts'] = ( !empty( $new_instance['instagramPosts'] ) ) ? strip_tags( $new_instance['instagramPosts'] ) : '';
		return $instance;
	}

}