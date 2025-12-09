<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_accommodations['banner']); ?>);">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo ACCOMMODATIONS; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo ACCOMMODATIONS; ?></li>
		  	</ol>
		</nav>
	</div>
</div>


<div class="accommodation page-content pt_70 pb_50">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				foreach($accommodations_all as $row)
				{
					?>
					<div class="accommodation-item mb_30 pb_30">
						<div class="row">
							<div class="col-md-4">
								<div class="photo">
									<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>" alt="<?php echo safe_data($row['name']); ?>">
								</div>
							</div>
							<div class="col-md-8">
								<div class="text">
									<h3><?php echo safe_data($row['name']); ?></h3>
									<p>
										<?php echo safe_data($row['description']); ?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>			
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>