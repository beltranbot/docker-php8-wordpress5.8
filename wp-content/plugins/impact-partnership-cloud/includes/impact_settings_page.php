<?php $user_exist = get_option( 'impact_existing_user' ); ?>

<div class="wrap">
	<?php settings_errors(); ?>

	<?php if ( 'false' === $user_exist ) { ?>
		<div class="row row-divided impact-user">
				<div class="col-md-5">
					<h2 class="impact-title">Existing Customer </h2>
					<p>
						If you are an existing Partnership Cloud customer, <a class="impact-exist-user" href="#">click here</a> to set up the integration.
					</p>
				</div>
				<div class="col-md-1"></div>
				<div class="vertical-divider">or</div>
				<div class="offset-md-1 col-md-5">
					<h2>New Customer</h2>
					<p>
						If you are new to Impact, <a href="https://impact.com/partnership-cloud/" target="_blank">click here</a> to learn how Partnership Cloud can help grow and optimize your Partnership program.
					</p>
				</div>
		</div>
	<?php } elseif ( 'true' === $user_exist && ! get_settings_errors() ) { ?>
		<div class="col-md-5">
			<h5>The integration is now enabled. You can update your settings at any time.</h5>
		</div>
	<?php } ?>

	<div class="impact-form <?php echo ( 'true' === $user_exist ) ? '' : 'impact-hidden'; ?>">
		<form method="post" action="options.php" class="new_integration_setting" id="new_integration_setting">
			<?php
				settings_fields( 'impact_settings_option_group' );
				do_settings_sections( 'impact-settings-admin' );
				submit_button();
			?>
		</form>
	</div>
</div>

<?php if ( 'true' === $user_exist ) : ?>
	<div class="modal mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Impact Settings</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>
						It seems you have already registered your account's Impact Settings.
					</p>
					<p>
						To update the configuration you'll need to re-enter the <strong>Account SID</strong> and <strong>Auth Token</strong> fields, so keep those at hand.
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="button button-primary" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
