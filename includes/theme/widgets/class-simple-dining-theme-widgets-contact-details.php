<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ContactDetails extends \WP_Widget {

    public function __construct()
    {
		parent::__construct(
			'contact-details', 
			__('Contact Details', 'simple-dining'), 
			[
				'description' => __( 'Address, Phone Number and Email Links', 'simple-dining' ),
			] 
		);

		add_action( 'widgets_init', [ $this, 'register_widget' ] );
	}
	
	public function register_widget(){
		register_widget( self::class );
	}
    
	// Widget Backend 
	public function form( $instance ) {
		$address = "120 Courtenay Place\nTe Aro\nWellington\nNew Zealand";
		$address_link = 'https://goo.gl/maps/adtT1RPd4UL2';
		$phone_number = '+6420 44 DINING NZ';
		$phone_link = '+6420333464';
		$email = 'shand@mysite.digital';

		if ( isset( $instance[ 'address' ] ) ) {
			$address = $instance[ 'address' ];
		}
		if ( isset( $instance[ 'address_link' ] ) ) {
			$address_link = $instance[ 'address_link' ];
		}
		if ( isset( $instance[ 'phone_number' ] ) ) {
			$phone_number = $instance[ 'phone_number' ];
		}
		if ( isset( $instance[ 'phone_link' ] ) ) {
			$phone_link = $instance[ 'phone_link' ];
		}
		if ( isset( $instance[ 'email' ] ) ) {
			$email = $instance[ 'email' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>">
				<?php _e( 'Address', 'simple-dining' ); ?>
			</label> 
			<textarea id="<?php echo $this->get_field_id( 'address' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'address' ); ?>" rows="4"><?php echo esc_attr( $address ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_link' ); ?>">
				<?php _e( 'Google Map Link', 'simple-dining' ); ?>
			</label> 
			<input 
				id="<?php echo $this->get_field_id( 'address_link' ); ?>" 
				class="widefat" 
				name="<?php echo $this->get_field_name( 'address_link' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $address_link ); ?>" 
			/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone_number' ); ?>">
				<?php _e( 'Phone Number', 'simple-dining' ); ?>
			</label> 
			<input 
				id="<?php echo $this->get_field_id( 'phone_number' ); ?>" 
				class="widefat"
				name="<?php echo $this->get_field_name( 'phone_number' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $phone_number ); ?>" 
			/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone_link' ); ?>">
				<?php _e( 'Tel Link', 'simple-dining' ); ?>
			</label> 
			<input 
				id="<?php echo $this->get_field_id( 'phone_link' ); ?>" 
				class="widefat"
				name="<?php echo $this->get_field_name( 'phone_link' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $phone_link ); ?>" 
			/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>">
				<?php _e( 'Email Address', 'simple-dining' ); ?>
			</label> 
			<input 
				id="<?php echo $this->get_field_id( 'email' ); ?>" 
				class="widefat"
				name="<?php echo $this->get_field_name( 'email' ); ?>" 
				type="email" 
				value="<?php echo esc_attr( $email ); ?>" 
			/>
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = [];
		$instance[ 'address' ] = ! empty( $new_instance['address'] ) ? sanitize_textarea_field( $new_instance['address'] ) : '';
		$instance[ 'address_link' ] = ! empty( $new_instance['address_link'] ) ? sanitize_text_field( $new_instance['address_link'] ) : '';
		$instance[ 'phone_number' ] = ! empty( $new_instance['phone_number'] ) ? sanitize_text_field( $new_instance['phone_number'] ) : '';
		$instance[ 'phone_link' ] = ! empty( $new_instance['phone_link'] ) ? sanitize_text_field( $new_instance['phone_link'] ) : '';
		$instance[ 'email' ] = ! empty( $new_instance['email'] ) ? sanitize_text_field( $new_instance['email'] ) : '';
		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $instance );
		include( locate_template( 'template-parts/footer/contact-details-widget.php', false, false ) );
	}
}

new ContactDetails();

