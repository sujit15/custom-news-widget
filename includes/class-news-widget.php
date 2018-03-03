<?php
/**
 * Class NewsWidget
 */
class NewsWidget extends WP_Widget {

	public function __construct() {
		/* Register Widget */
		parent:: __construct(
			'news_widget', //ID
			esc_html__( 'News Widget', 'text_domain' ), //Name
			array( 'description' => esc_html__( 'This is news widget for news custom post.', 'text_domain' ) ) //Description
		);
	}
	/* Fontend Widget Form */
	public function widget( $instance, $args ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'Widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo '<h2 class="widget-title">'.esc_html__( 'News', 'text_domain' ). '</h2>';

		$args = array(
			'post_type'             => 'news',
			'post_status'           => 'publish',
			'posts_per_page'        => 5
		);
		$query = new WP_Query($args);
		?>
		<?php if ( $query->have_posts() ) : ?>

			<!-- pagination here -->

			<!-- the loop -->
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<p class="title"><a class="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<!-- pagination here -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		<?php
		echo $args[ 'after_widget' ];
	}

	/* Backend Widget Form */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New Title', 'text_domain' );
		?>
		<p>
			<br for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php echo esc_html__('Title:', 'text_domain'); ?>
			</label></br>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>"
			       name="<?php echo esc_attr($this->get_field_name('title')); ?>"
			       value="<?php echo esc_attr($title); ?>">
		</p>
		<?php
	}

	/* Sanatize the widget as they saved */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}

function register_news_widget() {
	register_widget( 'NewsWidget' );
}

add_action( 'widgets_init', 'register_news_widget' );