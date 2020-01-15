<?php
/**
 * Rocket CDN template.
 *
 * @since 3.5
 */

defined( 'ABSPATH' ) || die( 'Cheatin&#8217; uh?' );

$cnames      = get_rocket_option( 'cdn_cnames' );
$cnames_zone = get_rocket_option( 'cdn_zone' );
?>
<div class="wpr-fieldsContainer-fieldset">
	<div class="wpr-field">
		<div class="wpr-field-description-label">
			<?php echo $data['label']; ?>
		</div>
		<?php if ( ! empty( $data['description'] ) ) : ?>
			<div class="wpr-field-description">
				<?php echo $data['description']; ?>
			</div>
		<?php endif; ?>
		<div id="wpr-cnames-list">
		<?php
		if ( $cnames ) :
			foreach ( $cnames as $key => $url ) :
				?>
				<div class="wpr-text">
					<input type="text" name="wp_rocket_settings[cdn_cnames][<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $url ); ?>" placeholder="cdn.example.com" />
					<input type="hidden" name="wp_rocket_settings[cdn_zone][<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $cnames_zone[ $key ] ); ?>" />
					<?php if ( ! empty( $data['helper'] ) ) : ?>
					<div class="wpr-field-description wpr-field-description-helper">
						<?php echo $data['helper']; ?>
					</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
	</div>
</div>
<div class="wpr-optionHeader">
	<h3 class="wpr-title2"><?php esc_html_e( 'Purge RocketCDN cache', 'rocket' ); ?></h3>
</div>
<div class="wpr-fieldsContainer">
	<div class="wpr-fieldsContainer-description">
		<?php
		printf(
			// translators: %s is a "Learn more" link.
			esc_html__( 'Purges RocketCDN cached resources for your website. %s', 'rocket' ),
			'<a href="" target="_blank">' . esc_html__( 'Learn more', 'rocket' ) . '</a>'
		);
		?>
	</div><br>
	<?php
		$this->render_action_button(
			'link',
			'rocket_purge_rocketcdn',
			[
				'label'      => __( 'Clear all RocketCDN cache files', 'rocket' ),
				'attributes' => [
					'class' => 'wpr-button wpr-button--icon wpr-button--small wpr-button--purple wpr-icon-trash',
				],
			]
		);
	?>
</div>