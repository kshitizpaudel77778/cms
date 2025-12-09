<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_organizer_detail['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo safe_data($organizer_single['name']); ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>organizers">Organizers</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo safe_data($organizer_single['name']); ?></li>
		  	</ol>
		</nav>
	</div>
</div>


<div class="team-single pt_30 pb_20 bg_f3f3f3">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
		        <div class="team-item team-item-single mt_40 mb_40">
					<div class="team-photo">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($organizer_single['photo']); ?>" alt="">
						<div class="plus">
							<i class="fa fa-plus"></i>
						</div>
					</div>
					<div class="team-text">
						<h4><?php echo safe_data($organizer_single['name']); ?></h4>

						

					</div>
				</div>
		    </div>
		    <div class="col-md-1"></div>
		    <div class="col-md-8 d-flex align-items-center">
				<div class="table-responsive">
					<table class="table table-bordered">
		                <tr>
		                    <td>Name</td>
		                    <td><?php echo safe_data($organizer_single['name']); ?></td>
		                </tr>
		                <tr>
		                    <td>Designation</td>
		                    <td><?php echo safe_data($organizer_single['designation']); ?></td>
		                </tr>
		                <tr>
		                    <td>Email Address</td>
		                    <td><?php echo safe_data($organizer_single['email']); ?></td>
		                </tr>
		                <tr>
		                    <td>Phone Number</td>
		                    <td><?php echo safe_data($organizer_single['phone']); ?></td>
		                </tr>
		                <tr>
		                    <td>Social Media</td>
		                    <td>
		                    	<?php if( $organizer_single['facebook']!='' || $organizer_single['twitter']!='' || $organizer_single['linkedin']!='' || $organizer_single['instagram']!='' ): ?>
	                    		<div class="team-social">
									<ul>
										<?php if($organizer_single['facebook']!=''): ?>
											<li><a href="<?php echo safe_data($organizer_single['facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<?php endif; ?>

										<?php if($organizer_single['twitter']!=''): ?>
										<li><a href="<?php echo safe_data($organizer_single['twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<?php endif; ?>

										<?php if($organizer_single['linkedin']!=''): ?>
										<li><a href="<?php echo safe_data($organizer_single['linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										<?php endif; ?>

										<?php if($organizer_single['instagram']!=''): ?>
										<li><a href="<?php echo safe_data($organizer_single['instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
										<?php endif; ?>

									</ul>
								</div>
								<?php endif; ?>
		                    </td>
		                </tr>
		            </table>
				</div>
		    </div>
		</div>
	</div>
</div>

<div class="team-single pt_40 pb_40">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="description">
					<p>
						<?php echo safe_data($organizer_single['biography']); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>