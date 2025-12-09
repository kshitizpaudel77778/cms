<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Tickets_model');
?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_tickets['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo TICKETS; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo TICKETS; ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="pricing">
	<div class="container">
		<div class="row">			
			<?php
			$i=0;
			foreach ($ticket_all as $row) {
				$i++;
				?>
				<div class="col-lg-4">
					<div class="card mb-5 mb-lg-0">
						<div class="card-body">
							<h2 class="card-title text-muted text-uppercase text-center"><?php echo safe_data($row['ticket_name']); ?></h2>
							<h3 class="card-price text-center">$<?php echo safe_data($row['ticket_price']); ?></h3>
							<hr>
							<ul class="fa-ul">
								<?php
								$ticket_detail = $CI->Tickets_model->get_ticket_detail($row['ticket_id']);
								foreach($ticket_detail as $row1)
								{
									?>
									<?php if($row1['ticket_detail_available'] == 'Yes'): ?>
										<li><span class="fa-li"><i class="fa fa-check"></i></span>
									<?php else: ?>
										<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>
									<?php endif; ?>
									<?php echo safe_data($row1['ticket_detail_text']); ?>
									</li>
									<?php
								}
								?>
							</ul>
							<a href="<?php echo base_url(); ?>tickets/package-select/<?php echo safe_data($row['ticket_id']); ?>" class="btn btn-block btn-primary"><?php echo BUY_TICKET; ?></a>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>