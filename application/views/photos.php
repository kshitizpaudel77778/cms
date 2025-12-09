<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Photos_model');
?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_photos['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo PHOTOS; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo PHOTOS; ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="page-content mt_0 mb_20 gall-page">
	<div class="container">
		<div class="row">
			<?php
			foreach($photo_category_all as $row)
			{
				?>
				<div class="col-md-12 mt_40">
					<h2 class="gallery-heading"><?php echo safe_data($row['photo_category_name']); ?></h2>
				</div>
				<?php
				$photos_by_cat = $CI->Photos_model->photos_by_cat($row['photo_category_id']);
				foreach($photos_by_cat as $row1)
				{
					?>
					<div class="col-md-6 col-lg-3">
						<div class="gallery-photo">
			            	<div class="gallery-photo-bg"></div>
			            	<a href="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row1['photo_name']); ?>" class="magnific" title="<?php echo safe_data($row1['photo_caption']); ?>">
			            		<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row1['photo_name']); ?>">
			            		<div class="plus-icon"><i class="fa fa-search-plus"></i></div>
			            	</a>
		            	</div>
		            </div>
					<?php
				}
				?>
				<?php
			}
			?>
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>