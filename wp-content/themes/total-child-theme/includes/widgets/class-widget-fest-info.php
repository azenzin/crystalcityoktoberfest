<?php
/**
 * Widget API: Widget_Fest_Info class
 *
 */
if ( class_exists( 'WP_Widget' ) && ! class_exists( 'Widget_Fest_Info' ) ) {

	class Widget_Fest_Info extends WP_Widget {

		/**
		 * Sets up a new Festival Info widget instance.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'                   => 'widget-fest-info',
				'description'                 => __( 'General information about the Festival', 'total-child' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'widget-fest-info', __( 'Festival Info', 'total-child' ), $widget_ops );
		}

		/**
		 * Outputs the content for the Festival Info widget instance.
		 *
		 * @param array $args Display arguments including 'before_title', 'after_title',
		 *                        'before_widget', and 'after_widget'.
		 * @param array $instance Settings for the Festival Info widget instance.
		 */
		public function widget( $args, $instance ) {

			// Define output variable
			$output = $widget_start = $widget_end = $title_class = $location_class = $period_class = '';

			$extra_class = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
			if ( ! empty( $extra_class ) ) {
				$widget_start = '<div class="' . $extra_class . '-widget">';
				$widget_end = '</div>';
				$title_class = ' class="' . $extra_class . '-title"';
				$location_class = ' class="' . $extra_class . '-location"';
				$period_class = ' class="' . $extra_class . '-period"';
			}

			if ( ! empty( $instance['title_tag'] ) ) {
				$title_tag_start = '<' . $instance['title_tag'] . $title_class . '>';
				$title_tag_end = '</' . $instance['title_tag'] . '>';
			} else {
				$title_tag_start = $title_tag_end = '';
			}
			$title = ! empty( $instance['title'] ) ? $title_tag_start . $instance['title'] . $title_tag_end : '';

			if ( ! empty( $instance['location_tag'] ) ) {
				$location_tag_start = '<' . $instance['location_tag'] . $location_class . '>';
				$location_tag_end   = '</' . $instance['location_tag'] . '>';
			} else {
				$location_tag_start = $location_tag_end = '';
			}
			$location = ! empty( $instance['location'] ) ? $location_tag_start . $instance['location'] . $location_tag_end : '';

			if ( ! empty( $instance['period_tag'] ) ) {
				$period_tag_start = '<' . $instance['period_tag'] . $period_class . '>';
				$period_tag_end   = '</' . $instance['period_tag'] . '>';
			} else {
				$period_tag_start = $period_tag_end = '';
			}
			$period = ! empty( $instance['period'] ) ? $period_tag_start . $instance['period'] . $period_tag_end : '';

//			$description = ! empty( $instance['description'] ) ? $instance['description'] : '';

			// Before widget hook
			$output .= $args['before_widget'];

			$output .= $widget_start;
			$output .= $title;
			$output .= $location;
			$output .= $period;
//			$output .= $description;
			$output .= $widget_end;

			// After widget hook
			$output .= $args['after_widget'];

			// Echo output
			echo $output;
		}

		/**
		 * Handles updating settings for the current Festival Info widget instance.
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            WP_Widget::form().
		 * @param array $old_instance Old settings for this instance.
		 *
		 * @return array Updated settings to save.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance          = $old_instance;

			if ( in_array( $new_instance['title_tag'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'p', 'span' ) ) ) {
				$instance['title_tag'] = $new_instance['title_tag'];
			} else {
				$instance['title_tag'] = 'h1';
			}
			$instance['title'] = sanitize_text_field( $new_instance['title'] );

			if ( in_array( $new_instance['location_tag'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'p', 'span' ) ) ) {
				$instance['location_tag'] = $new_instance['location_tag'];
			} else {
				$instance['location_tag'] = 'h2';
			}
			$instance['location'] = sanitize_text_field( $new_instance['location'] );

			if ( in_array( $new_instance['period_tag'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'p', 'span' ) ) ) {
				$instance['period_tag'] = $new_instance['period_tag'];
			} else {
				$instance['period_tag'] = 'h1';
			}
			$instance['period'] = sanitize_text_field( $new_instance['period'] );

			$instance['extra_class'] = sanitize_text_field( $new_instance['extra_class'] );

//			$instance['description'] = wp_kses_post( $new_instance['description'] );

			return $instance;
		}

		/**
		 * Outputs the settings form for the Festival Info widget.
		 *
		 * @param array $instance Current settings.
		 */
		public function form( $instance ) {
			//Defaults
			$instance = wp_parse_args(
				(array) $instance,
				array(
					'title_tag' => 'h1',
					'title' => '',
					'location_tag' => 'h2',
					'location'     => '',
					'period_tag' => 'h2',
					'period'     => '',
					'extra_class' => '',
//					'description' => ''
				)
			);
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title_tag' ) ); ?>">
					<?php _e( 'Wrap Festival Name with tag:', 'total-child' ); ?>
				</label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'title_tag' ) ); ?>"
				        id="<?php echo esc_attr( $this->get_field_id( 'title_tag' ) ); ?>" class="widefat">
					<?php for ( $i = 1; $i <=6; $i++ ) { ?>
						<option value="<?php echo "h$i"; ?>" <?php selected( $instance['title_tag'], "h$i" ); ?>><?php echo "h$i"; ?></option>
					<?php } ?>
					<option value="div" <?php selected( $instance['title_tag'], 'div' ); ?>><?php echo 'div'; ?></option>
					<option value="p" <?php selected( $instance['title_tag'], 'p' ); ?>><?php echo 'p'; ?></option>
					<option value="span" <?php selected( $instance['title_tag'], 'span' ); ?>><?php echo 'span'; ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php _e( 'Festival Name:', 'total-child' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
				       value="<?php echo esc_attr( $instance['title'] ); ?>"/>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'location_tag' ) ); ?>">
					<?php _e( 'Wrap Festival Location with tag:', 'total-child' ); ?>
				</label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'location_tag' ) ); ?>"
				        id="<?php echo esc_attr( $this->get_field_id( 'location_tag' ) ); ?>" class="widefat">
					<?php for ( $i = 1; $i <= 6; $i ++ ) { ?>
						<option value="<?php echo "h$i"; ?>" <?php selected( $instance['location_tag'], "h$i" ); ?>><?php echo "h$i"; ?></option>
					<?php } ?>
					<option value="div" <?php selected( $instance['location_tag'], 'div' ); ?>><?php echo 'div'; ?></option>
					<option value="p" <?php selected( $instance['location_tag'], 'p' ); ?>><?php echo 'p'; ?></option>
					<option value="span" <?php selected( $instance['location_tag'], 'span' ); ?>><?php echo 'span'; ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'location' ) ); ?>">
					<?php _e( 'Festival Location:', 'total-child' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'location' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'location' ) ); ?>" type="text"
				       value="<?php echo esc_attr( $instance['location'] ); ?>"/>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'period_tag' ) ); ?>">
					<?php _e( 'Wrap Festival Period with tag:', 'total-child' ); ?>
				</label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'period_tag' ) ); ?>"
				        id="<?php echo esc_attr( $this->get_field_id( 'period_tag' ) ); ?>" class="widefat">
					<?php for ( $i = 1; $i <= 6; $i ++ ) { ?>
						<option value="<?php echo "h$i"; ?>" <?php selected( $instance['period_tag'], "h$i" ); ?>><?php echo "h$i"; ?></option>
					<?php } ?>
					<option value="div" <?php selected( $instance['period_tag'], 'div' ); ?>><?php echo 'div'; ?></option>
					<option value="p" <?php selected( $instance['period_tag'], 'p' ); ?>><?php echo 'p'; ?></option>
					<option value="span" <?php selected( $instance['period_tag'], 'span' ); ?>><?php echo 'span'; ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'period' ) ); ?>">
					<?php _e( 'Festival Period:', 'total-child' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'period' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'period' ) ); ?>" type="text"
				       value="<?php echo esc_attr( $instance['period'] ); ?>"/>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>">
					<?php _e( 'Extra class name:', 'total-child' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'extra_class' ) ); ?>" type="text"
				       value="<?php echo esc_attr( $instance['extra_class'] ); ?>"/>
			</p>

<!--			<p>-->
<!--				<label for="--><?php //echo esc_attr( $this->get_field_id( 'description' ) ); ?><!--">-->
<!--					--><?php //esc_html_e( 'Description:', 'total-child' ); ?>
<!--				</label>-->
<!--				<textarea class="widefat" rows="5" cols="20"-->
<!--				          id="--><?php //echo esc_attr( $this->get_field_id( 'description' ) ); ?><!--"-->
<!--				          name="--><?php //echo esc_attr( $this->get_field_name( 'description' ) ); ?><!--">-->
<!--					--><?php //echo wp_kses_post( $instance['description'] ); ?>
<!--				</textarea>-->
<!--				<br/>-->
<!--				<small>--><?php //_e( 'Page IDs, separated by commas.' ); ?><!--</small>-->
<!--			</p>-->
			<?php
		}

	}

	add_action( 'widgets_init', function () {
		register_widget( 'Widget_Fest_Info' );
	} );
}
