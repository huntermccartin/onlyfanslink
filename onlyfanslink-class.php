<?php
/**
 * Adds OnlyFans_Link widget.
 */
class OnlyFans_Link_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'onlyfanslink_widget', // Base ID
			esc_html__( 'OnlyFans Link', 'ofl_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display OnlyFans link and icon', 'ofl_domain' ), ) // Args
		);
	}
//*
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; //What to display before Widget <div>, etc

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

    // Widget Content Output
		echo '<a href="'.$instance['link'].'"><img src="https://blog.onlyfans.com/wp-content/uploads/sb-instagram-feed-images/onlyfansofficial.jpg" alt="OnlyFans.com" style="width:50px;border-radius:75px"><a>';

    //wide onlyfans logo link https://upload.wikimedia.org/wikipedia/en/thumb/c/cc/OnlyFans_logo.svg/1024px-OnlyFans_logo.svg.png
    //lock only image address https://blog.onlyfans.com/wp-content/uploads/sb-instagram-feed-images/onlyfansofficial.jpg
		echo $args['after_widget']; //whatever you want to display after widget </div>, etc
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Follow me on OnlyFans', 'ofl_domain' );
    $link = ! empty( $instance['link'] ) ? $instance['link'] : esc_html__( 'OnlyFans link', 'ofl_domain' );
    ?>
    <!-- title -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
          <?php esc_attr_e( 'Title:', 'ofl_domain' ); ?>
        </label>
		    <input
          class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
          name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
          type="text"
          value="<?php echo esc_attr( $title ); ?>">
		</p>

    <!-- Link -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>">
          <?php esc_attr_e( 'Link:', 'ofl_domain' ); ?>
        </label>
		    <input
          class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"
          name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>"
          type="text"
          value="<?php echo esc_attr( $link ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? sanitize_text_field( $new_instance['link'] ) : '';
		return $instance;
	}

}
