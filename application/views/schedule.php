<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Schedule_model');
?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_schedule['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo SCHEDULE; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo SCHEDULE; ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="schedule">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
					<?php
					$i=0;
					foreach($event_date_all as $row)
					{
						$i++;
						if($i==1)
						{
							$a = 'active';
							$b = 'true';
						}
						else
						{
							$a = '';
							$b = 'false';
						}
						?>
						<li class="nav-item" role="presentation">
							<a class="nav-link <?php echo safe_data($a); ?>" id="pills-<?php echo safe_data($i); ?>-tab" data-toggle="pill" href="#pills-<?php echo safe_data($i); ?>" role="tab" aria-controls="pills-<?php echo safe_data($i); ?>" aria-selected="<?php echo safe_data($b); ?>">
								
								<div class="part-1">
									<?php echo safe_data($row['ed_month']); ?>
								</div>
								<div class="part-2 d-flex justify-content-center">
									<div class="part-2-content">
										<?php echo safe_data($row['ed_day']); ?>
									</div>	
								</div>
								<div class="part-3">
									<div class="inner">
										<?php echo safe_data($row['ed_name']); ?>
									</div>
								</div>

							</a>
						</li>
						<?php
					}
					?>
				</ul>

				<div class="tab-content" id="pills-tabContent">
					<?php
					$i=0;
					$j=0;
					foreach($event_date_all as $row)
					{
						$i++;
						if($i==1)
						{
							$a = 'show';
							$b = 'active';
						}
						else
						{
							$a = '';
							$b = '';
						}
						?>
						<div class="tab-pane fade <?php echo safe_data($a); ?> <?php echo safe_data($b); ?>" id="pills-<?php echo safe_data($i); ?>" role="tabpanel" aria-labelledby="pills-<?php echo safe_data($i); ?>-tab">
							
							<?php
							$event_all = $CI->Schedule_model->event_all($row['ed_id']);
							foreach($event_all as $row1)
							{
								$j++;
								?>
								<div class="schedule-content d-flex justify-content-center">
									<div class="left">
										<div class="item">
											<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row1['photo']); ?>" alt="">
											<h3><a href="<?php echo base_url(); ?>speaker/<?php echo safe_data($row1['slug']); ?>"><?php echo safe_data($row1['name']); ?></a></h3>
										</div>
									</div>
									<div class="right">
										<h5><?php echo safe_data($row1['e_time']); ?></h5>
										<h4><?php echo safe_data($row1['e_name']); ?></h4>
										<p>
											<?php echo safe_data($row1['e_short_description']); ?>
										</p>
										<div class="more">
											<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mod<?php echo safe_data($j); ?>"><?php echo SEE_DETAILS; ?></a>
										</div>
										<!-- Modal -->
										<div class="modal fade" id="mod<?php echo safe_data($j); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	<div class="modal-dialog modal-lg">
										    	<div class="modal-content">
										      		<div class="modal-header">
										        		<h4 class="modal-title" id="exampleModalLabel">
										        			<?php echo SESSION_COLON; ?> <?php echo safe_data($row1['e_name']); ?>
										        		</h4>
										        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          			<span aria-hidden="true">&times;</span>
										        		</button>
										      		</div>
										      		<div class="modal-body">
										        		<?php echo safe_data($row1['e_description']); ?>
										      		</div>
										      		<div class="modal-footer">
										        		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo CLOSE; ?></button>
										      		</div>
										    	</div>
										  	</div>
										</div>
										<!-- // Modal -->
									</div>
								</div><!-- // schedule-content -->
								<?php
							}
							?>

						</div>
						<?php
					}
					?>


				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>