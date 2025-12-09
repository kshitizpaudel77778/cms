<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_parking['banner']); ?>);">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo PARKING; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo PARKING; ?></li>
		  	</ol>
		</nav>
	</div>
</div>


<div class="parking page-content pt_70 pb_20">
	<div class="container">

		<div class="row">
			<div class="col-md-12 mb_40">
				<?php echo safe_data($parking_description['description']); ?>
			</div>
		</div>

		<div class="row">
			<?php
			foreach($parking_place_all as $row)
			{
				?>
				<div class="col-md-6 parking-item mb_60">
					<div class="text">
						<h3><?php echo safe_data($row['parking_place_name']); ?></h3>
						<p>
							<?php echo nl2br(safe_data($row['parking_place_description'])); ?>
						</p>
					</div>
					<div class="map">
						<?php echo safe_data($row['parking_place_map']); ?>
					</div>
				</div>
				<?php
			}
			?>			
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>