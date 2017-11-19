
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
    <button type="submit" class="button alt" name="woocommerce_checkout_update_totals"> asdasddddddd</button>


    <div class="form-row place-order">










		<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
    </div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
