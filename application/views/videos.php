<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Videos_model');
?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_videos['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo VIDEOS; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo VIDEOS; ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="page-content mt_0 gall-page">
	<div class="container">
		<div class="row">
			<?php
			foreach($video_category_all as $row)
			{
				?>
				<div class="col-md-12 mt_40">
					<h2 class="gallery-heading"><?php echo safe_data($row['video_category_name']); ?></h2>
				</div>
				<?php
				$videos_by_cat = $CI->Videos_model->videos_by_cat($row['video_category_id']);
				foreach($videos_by_cat as $row1)
				{
					?>
					<div class="col-md-6">
						<div class="video-item">
			            	<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo safe_data($row1['video_code']); ?>" frameborder="0" allowfullscreen></iframe>
			            	<div class="video-title">
			            		<?php echo safe_data($row1['video_caption']); ?>
			            	</div>
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