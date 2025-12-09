<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_blog['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo BLOG; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo BLOG; ?></li>
		  	</ol>
		</nav>
	</div>
</div>


<div class="page-content blog-section-rtl">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="single-section">					
					<?php
					foreach($blog_all as $row)
					{
						?>
						<div class="blog-item shadow-lg p-3 mb-5 bg-white rounded">
							<div class="featured-photo">
								<a href="<?php echo base_url(); ?>blog-detail/<?php echo safe_data($row['slug']); ?>"><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>"></a>
							</div>
							<div class="text">
								<h2><a href="<?php echo base_url(); ?>blog-detail/<?php echo safe_data($row['slug']); ?>"><?php echo safe_data($row['title']); ?></a></h2>
								<p>
									<?php echo safe_data($row['short_description']); ?>
								</p>
								<div class="read-more">
									<a href="<?php echo base_url(); ?>blog-detail/<?php echo safe_data($row['slug']); ?>"><?php echo READ_MORE; ?></a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="sidebar">
					<?php $this->view('sidebar'); ?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->view('footer'); ?>