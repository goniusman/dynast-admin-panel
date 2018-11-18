<?php
/**
 * Dynast admin widget
 * @package Dynast
 */

add_action('widgets_init', function(){
	register_widget('dynast_admin_widget');
});

/**
 * Dynast admin widget
 */
class dynast_admin_widget extends WP_Widget
{
	
	public function __construct()
	{
		$my_widget = array(
			'classname'   => 'dynast_admin_widget',
			'description' => 'dynast admin widget display your identity and socil link',
			'customize_selective_refresh' => true,
		);
		parent::__construct('dynast_admin_widget', 'Dynast Admin Widget', $my_widget );

	}

	

	public function widget($args, $instance)
	{
		$title = $instance['title'] ? $instance['title'] : "Author Information";

		echo $args['before_widget'];
		echo $args['before_title'].$title.$args['after_title'];

		$picture = esc_attr(get_option( 'profile_picture' ) );
		$fname = esc_attr(get_option('fname'));
		$lname = esc_attr(get_option('lname'));
		$description = esc_attr(get_option('description'));
		$address = esc_attr(get_option('address'));
		$facebook = esc_attr(get_option('facebook'));
		$twitter = esc_attr(get_option('twitter'));
		$linkedin = esc_attr(get_option('linkedin'));
		$youtube = esc_attr(get_option('youtube'));
		$contact = esc_attr(get_option('contact'));
		$address = esc_attr(get_option('address'));
?>
			<div class="admin-extro">
				<div class="admin-intro" style="border: 3px solid azure;margin: 20px;background: #b0c7ea4d;">
				
						<div class="pro-pictur">
							<div class="img">
								<img src="<?php echo $picture; ?>" style="width:100%;height: auto;padding: 20px;" alt="">
							</div>
						</div>
				
					<div class="bio">
						<div class="name">
							<h3 style="text-align: center;text-transform: capitalize;font-weight: 3;font-size: 27px;color: #aeaeae;"><?php echo $fname; ?> <?php echo $lname; ?></h3>
						</div>
						<div class="description">
							<p style="padding: 10px;margin: 0px 10px;color: #00000080;text-align: center;text-transform: lowercase;font-style: italic;"><?php echo $description; ?></p>
						</div>
					</div>
					<div class="dynast-footer">
						<address style="padding: 10px 20px;">
							<abbr><strong>ADDRESS :</strong> <?php echo $address; ?></abbr><br> <br>
							<abbr><b>CONTACT US :</b> <?php echo $contact; ?> </abbr>
						</address>
					</div>
					<div class="sociallink" style="text-align: center;">
						<ul style="display: inline-flex;">
							<li><a style="padding: 10px;color: #687443;" href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
							<li><a style="padding: 10px;color: #687443;" href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
							<li><a style="padding: 10px;color: #687443;" href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
							<li><a style="padding: 10px;color: #687443;" href="<?php echo $youtube; ?>"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
					
				</div>
			</div>

<?php
		echo $args['after_widget'];
	}

public function update($new_text, $old_text)
	{
		$instance = array();
		$instance['title'] = (!empty($new_text['title']) ? $new_text['title'] : " ");
	}

public function form($instance)
	{
		
		$title = $instance['title'] ? $instance['title'] : "Author Information";
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label>
				<input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>">
			</p>
			
		<?php
	}
	





}








