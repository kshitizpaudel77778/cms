<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_attendees['banner']); ?>);">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo ATTENDEES; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo ATTENDEES; ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="page-content attendee-page">
	<div class="container">
		<div class="row">
			
			<?php
			foreach($attendees_all as $row)
			{
				?>
				<div class="attendee-item-container col-lg-4 col-md-6 col-sm-6">
					<div class="attendee-item shadow-lg p-3 mb-4 bg-white rounded">
						<div class="photo">
							<?php
							$gravatar_link = 'http://www.gravatar.com/avatar/'.md5($row['email']).'?s=32';
   							echo '<img src="'.$gravatar_link.'">';
   							?>
						</div>
						<div class="title">
							<h3><?php echo safe_data($row['first_name']).' '.safe_data($row['last_name']); ?></h3>
							<h4><?php echo safe_data($row['city']).', '.safe_data($row['country']); ?></h4>
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