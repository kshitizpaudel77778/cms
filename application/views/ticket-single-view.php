<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Tickets_model');
?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_tickets['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1>View Your Ticket</h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">View Your Ticket</li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">			
			
			<?php if(isset($ticket_detail_info)): ?>

			<h3>Attendee and Ticket Information</h3>

			<div class="table-responsive">
				<table class="table table-bordered table-sm">
					<tr>
						<td>First Name: </td>
						<td><?php echo safe_data($ticket_detail_info['first_name']); ?></td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td><?php echo safe_data($ticket_detail_info['last_name']); ?></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><?php echo safe_data($ticket_detail_info['email']); ?></td>
					</tr>
					<tr>
						<td>Phone: </td>
						<td><?php echo safe_data($ticket_detail_info['phone']); ?></td>
					</tr>
					<tr>
						<td>Country: </td>
						<td><?php echo safe_data($ticket_detail_info['country']); ?></td>
					</tr>
					<tr>
						<td>Address: </td>
						<td><?php echo safe_data($ticket_detail_info['address']); ?></td>
					</tr>
					<tr>
						<td>State: </td>
						<td><?php echo safe_data($ticket_detail_info['state']); ?></td>
					</tr>
					<tr>
						<td>City: </td>
						<td><?php echo safe_data($ticket_detail_info['city']); ?></td>
					</tr>
					<tr>
						<td>Zip Code: </td>
						<td><?php echo safe_data($ticket_detail_info['zip']); ?></td>
					</tr>
					<tr>
						<td>Website: </td>
						<td><?php echo safe_data($ticket_detail_info['website']); ?></td>
					</tr>
					<tr>
						<td>Want to be listed in public page?: </td>
						<td><?php echo safe_data($ticket_detail_info['want_to_be_listed']); ?></td>
					</tr>
					<tr>
						<td>Ticket No: </td>
						<td><?php echo safe_data($ticket_detail_info['ticket_no']); ?></td>
					</tr>
					<tr>
						<td>Ticket Name: </td>
						<td><?php echo safe_data($ticket_detail_info['ticket_name']); ?></td>
					</tr>
					<tr>
						<td>Ticket Price: </td>
						<td><?php echo '$'.safe_data($ticket_detail_info['ticket_price']); ?></td>
					</tr>
					<tr>
						<td>What is available for you: </td>
						<td><?php echo safe_data($ticket_detail_info['ticket_detail_what_available']); ?></td>
					</tr>
					<tr>
						<td>What is not available for you: </td>
						<td><?php echo safe_data($ticket_detail_info['ticket_detail_what_not_available']); ?></td>
					</tr>
					<tr>
						<td>Booking Date: </td>
						<td><?php echo safe_data($ticket_detail_info['booking_date']); ?></td>
					</tr>
					<tr>
						<td>Booking Time: </td>
						<td><?php echo safe_data($ticket_detail_info['booking_time']); ?></td>
					</tr>
					<tr>
						<td>Payment Method: </td>
						<td><?php echo safe_data($ticket_detail_info['payment_method']); ?></td>
					</tr>
					<tr>
						<td>Transaction ID: </td>
						<td><?php echo safe_data($ticket_detail_info['transaction_id']); ?></td>
					</tr>
				</table>
			</div>

			<?php else: ?>

			<?php echo form_open(base_url().'tickets/view'); ?>
			<div class="form-group">
                <label for="">Enter Your Ticket No:</label>
                <input type="text" name="ticket_no" class="form-control">
            </div>
            <button  type="submit" class="btn btn-success btn-xs" name="form1">Submit</button>
			<?php echo form_close(); ?>

			<?php endif; ?>

		</div>
	</div>
</div>

<?php $this->view('footer'); ?>