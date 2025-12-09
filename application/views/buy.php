<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Tickets_model');
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
			<div class="col-md-8 side-1">
				<h3><?php echo ATTENDEE_INFORMATION; ?></h3>
				<?php echo form_open(base_url().'tickets/buy'); ?>
		    	<div class="row">
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo FIRST_NAME; ?> *</label>
		                    <input type="text" class="form-control" name="first_name">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo LAST_NAME; ?> *</label>
		                    <input type="text" class="form-control" name="last_name">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo EMAIL_ADDRESS; ?> *</label>
		                    <input type="text" class="form-control" name="email">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo PHONE; ?> *</label>
		                    <input type="text" class="form-control" name="phone">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo COUNTRY; ?> *</label>
		                    <input type="text" class="form-control" name="country">
		                </div>
		    		</div>
		    	    <div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo ADDRESS; ?> *</label>
		                    <input type="text" class="form-control" name="address">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo STATE; ?> *</label>
		                    <input type="text" class="form-control" name="state">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo CITY; ?> *</label>
		                    <input type="text" class="form-control" name="city">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo ZIP; ?> *</label>
		                    <input type="text" class="form-control" name="zip">
		                </div>
		    		</div>
		    		<div class="col-md-6">
		    			<div class="form-group">
		                    <label for=""><?php echo WEBSITE_OPTIONAL; ?></label>
		                    <input type="text" class="form-control" name="website">
		                </div>
		    		</div>
		    		<div class="col-md-12">
		    			<div class="form-group">
							<label for=""><?php echo WANT_TO_BE_LISTED; ?> *</label>
							<div class="custom-control custom-switch">
								<input type="hidden" name="want_to_be_listed" value="No">
								<input type="checkbox" name="want_to_be_listed" class="custom-control-input" id="customSwitch1" autocomplete="off" value="Yes">
								<label class="custom-control-label" for="customSwitch1"><?php echo YES; ?></label>
							</div>
						</div>
		    		</div>
		    		<div class="col-md-12">
		    			<div class="form-group">
							<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" autocomplete="off">
								<label class="form-check-label" for="defaultCheck1">
									<?php echo safe_data($agree['agree_text']); ?>
								</label>
							</div>
						</div>
						<script>
							$(function() {
							    $('#defaultCheck1').on('click',function() {
							        if ($(this).is(':checked')) {
							            $('#proceed_button').removeAttr('disabled');
							        } else {
							            $('#proceed_button').attr('disabled', 'disabled');
							        }
							    });
							});
						</script>
		    		</div>
		    	</div>
		        <button id="proceed_button" type="submit" class="btn btn-success btn-xs" name="form1" disabled="disabled"><?php echo PROCEED; ?></button>
		        <a href="<?php echo base_url(); ?>tickets/buy-cancel" class="btn btn-danger btn-xs"><?php echo CANCEL; ?></a>
		    	<?php echo form_close(); ?>

			</div>




			<div class="col-md-4 side-2">
				<h3><?php echo SELECTED_PACKAGE; ?></h3>

				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<td><b><?php echo TICKET_NAME; ?> </b><br><?php echo safe_data($ticket_detail['ticket_name']); ?></td>
						</tr>
						<tr>
							<td><b><?php echo TICKET_PRICE; ?> </b><br><?php echo safe_data($ticket_detail['ticket_price']); ?></td>
						</tr>
						<tr>
							<td><b><?php echo WHAT_IS_AVAILABLE; ?> </b><br>
								<?php
								$dt = $CI->Tickets_model->get_ticket_detail_av($_SESSION['ticket_id']);
								foreach($dt as $rr)
								{
									echo safe_data($rr['ticket_detail_text']).'<br>';
								}
								?>
							</td>
						</tr>
						<tr>
							<td><b><?php echo WHAT_IS_NOT_AVAILABLE; ?> </b><br>
								<?php
								$dt = $CI->Tickets_model->get_ticket_detail_not_av($_SESSION['ticket_id']);
								foreach($dt as $rr)
								{
									echo safe_data($rr['ticket_detail_text']).'<br>';
								}
								?>
							</td>
						</tr>
					</table>
				</div>

			</div>
		</div>

		
	</div>
</div>

<?php $this->view('footer'); ?>