<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Tickets_model');
$payment_data = $CI->Tickets_model->payment_data();
$logo = $CI->Tickets_model->logo();
?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_tickets['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo BUY_TICKET; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo BUY_TICKET; ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="page-content buy-rtl">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="buttons-all">
					<a class="btn btn-primary" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
						<?php echo ATTENDEE_INFORMATION; ?>
					</a>
					
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
						<?php echo SELECTED_PACKAGE; ?>
					</button>

					<a href="<?php echo base_url(); ?>tickets/buy-cancel" class="btn btn-danger btn-xs"><?php echo CANCEL; ?></a>
				</div>
				<div class="collapse" id="collapse1">
					<div class="card card-body">
						
						<!-- Attendee Information -->
						<h3><?php echo ATTENDEE_INFORMATION; ?></h3>
						<div class="row">
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo FIRST_NAME; ?> </b><br><?php echo safe_data($_SESSION['first_name']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo LAST_NAME; ?> </b><br><?php echo safe_data($_SESSION['last_name']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo EMAIL_ADDRESS; ?> </b><br><?php echo safe_data($_SESSION['email']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo PHONE; ?> </b><br><?php echo safe_data($_SESSION['phone']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo COUNTRY; ?> </b><br><?php echo safe_data($_SESSION['country']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo ADDRESS; ?> </b><br><?php echo safe_data($_SESSION['address']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo STATE; ?> </b><br><?php echo safe_data($_SESSION['state']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo CITY; ?> </b><br><?php echo safe_data($_SESSION['city']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo ZIP; ?> </b><br><?php echo safe_data($_SESSION['zip']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo WEBSITE; ?> </b><br><?php if($_SESSION['website']!='') { echo safe_data($_SESSION['website']); } else {echo 'Not Found.';} ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo WANT_TO_BE_LISTED; ?> </b><br><?php echo safe_data($_SESSION['want_to_be_listed']); ?>
									</div>
								</div>
							</div>
						</div>
						<!-- // Attendee Information -->

					</div>
				</div>
				<div class="collapse" id="collapse2">
					<div class="card card-body">
						<!-- Ticket Information -->
						<h3><?php echo SELECTED_PACKAGE; ?></h3>
						<div class="row">
							<div class="col-md-4">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo TICKET_NAME; ?> </b><br><?php echo safe_data($ticket_detail['ticket_name']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo TICKET_PRICE; ?> </b><br><?php echo '$'.safe_data($ticket_detail['ticket_price']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo TOTAL_TICKETS; ?> </b><br><?php echo safe_data($ticket_detail['ticket_maximum']); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo WHAT_IS_AVAILABLE; ?> </b><br>
										<?php
										$dt = $CI->Tickets_model->get_ticket_detail_av($_SESSION['ticket_id']);
										foreach($dt as $rr)
										{
											echo safe_data($rr['ticket_detail_text']).'<br>';
										}
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card mb_20">
									<div class="card-body card-body-p-5">
										<b><?php echo WHAT_IS_NOT_AVAILABLE; ?> </b><br>
										<?php
										$dt = $CI->Tickets_model->get_ticket_detail_not_av($_SESSION['ticket_id']);
										foreach($dt as $rr)
										{
											echo safe_data($rr['ticket_detail_text']).'<br>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<!-- // Ticket Information -->
					</div>
				</div>
			</div>

			<div class="col-md-12 mt_30">
				<h3><?php echo PURCHASE_TICKET; ?></h3>
		    	<div class="row">
		    		<div class="col-md-6 col-lg-4">
		    			<div class="form-group">
		                    <select name="payment_method" class="form-control" id="paymentMethodChange">
		                    	<option value=""><?php echo SELECT_PAYMENT_METHOD; ?></option>
								<option value="PayPal"><?php echo PAYPAL; ?></option>
								<option value="Stripe"><?php echo STRIPE; ?></option>
		                    </select>
		                </div>
		    		</div>
		    	</div>

		    	<div class="paypal mt_20">
					<h4><?php echo PAY_WITH_PAYPAL; ?></h4>
					<div id="paypal-button"></div>
				</div>

				<div class="stripe mt_20">
					<h4><?php echo PAY_WITH_STRIPE; ?></h4>
					<?php echo form_open(base_url().'tickets/stripe',array('class' => '')); ?>
					<?php
					$cents = floatval($ticket_detail['ticket_price']*100);
					?>
					<script
						src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						data-key="<?php echo safe_data($payment_data['stripe_public_key']); ?>"
						data-amount="<?php echo safe_data($cents); ?>"
						data-name="Conference Payment"
						data-description="The conference will be held so soon"
						data-image="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($logo['logo']); ?>"
						data-currency="usd"
					>
					</script>
					<?php echo form_close(); ?>
				</div>
			</div>


			
		</div>
	</div>
</div>

<?php
$client = $payment_data['paypal_client_id'];
$secret = $payment_data['paypal_secret_key'];
if($payment_data['paypal_mode'] == 'Sandbox')
{
	$paypal_url = 'https://api.sandbox.paypal.com/v1/';	
	$env_type = 'sandbox';
}
else
{
	$paypal_url = 'https://api.paypal.com/v1/';
	$env_type = 'production';
}
?>

<script>
paypal.Button.render({
    // Configure environment
    env: '<?php echo safe_data($env_type); ?>',
    client: {
        sandbox: '<?php echo safe_data($client); ?>',
        production: '<?php echo safe_data($client); ?>'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'medium',
        color: 'blue',
        shape: 'rect',
    },
    // Set up a payment
    payment: function (data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '<?php echo safe_data($ticket_detail['ticket_price']); ?>',
                    currency: 'USD'
                }
            }]
      });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute()
        .then(function () {
            // Show a confirmation message to the buyer
            //window.alert('Thank you for your purchase!');
            
            // Redirect to the payment process page
            window.location = "<?php echo base_url(); ?>tickets/paypal?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID;
        });
    }
}, '#paypal-button');
</script>

<script>
(function($) {
	"use strict";
	$(document).ready(function() {
		$('.paypal').hide();
	    $('.stripe').hide();
		$('#paymentMethodChange').on('change',function() {
		    if($('#paymentMethodChange').val() == 'PayPal') {
		        $('.paypal').show();
		        $('.stripe').hide();
		    } else if($('#paymentMethodChange').val() == 'Stripe') {
		        $('.paypal').hide();
		        $('.stripe').show();
		    } else if($('#paymentMethodChange').val() == '') {
		    	$('.paypal').hide();
		        $('.stripe').hide();
		    }
		});
	});
})(jQuery);
</script>

<?php $this->view('footer'); ?>