<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_speakers['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo SPEAKERS; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo SPEAKERS; ?></li>
		  	</ol>
		</nav>
	</div>
</div>


<div class="team bg_ffffff">
	<div class="container">
		<div class="row">
			<?php
			foreach($speaker_all as $row)
			{
				?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="team-item">
						<div class="team-photo">
							<a href="<?php echo base_url(); ?>speaker/<?php echo safe_data($row['slug']); ?>" class="team-photo-anchor">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>" alt="">
								<div class="plus">
									<i class="fa fa-plus"></i>
								</div>
							</a>
						</div>
						<div class="team-text">
							<h4><a href="<?php echo base_url(); ?>speaker/<?php echo safe_data($row['slug']); ?>"><?php echo safe_data($row['name']); ?></a></h4>
							<p><?php echo safe_data($row['designation']); ?></p>
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