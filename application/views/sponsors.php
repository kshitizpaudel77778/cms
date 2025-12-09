<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Sponsors_model');
?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_sponsors['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo SPONSORS; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo SPONSORS; ?></li>
		  	</ol>
		</nav>
	</div>
</div>


<div class="page-content sponsors">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php
				foreach($sponsor_category_all as $row)
				{
					?>
					<div class="sponsors-heading mt_40 mb_40">
						<?php echo safe_data($row['sponsor_category_name']); ?>
					</div>

					<div class="row">
						<?php
						$sponsors_by_cat = $CI->Sponsors_model->sponsors_by_cat($row['sponsor_category_id']);
						foreach($sponsors_by_cat as $row1)
						{
							?>
							<div class="col-md-4">
								<div class="sponsors-content shadow-lg p_25 mb_20 bg-white rounded">
									<?php if($row1['sponsor_url']!=""): ?>
										<a href="<?php echo safe_data($row1['sponsor_url']); ?>" target="_blank">
									<?php endif; ?>
									<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row1['sponsor_photo']); ?>" alt="">
									<?php if($row1['sponsor_url']!=""): ?>
									</a>
									<?php endif; ?>
								</div>
							</div>
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

<?php $this->view('footer'); ?>