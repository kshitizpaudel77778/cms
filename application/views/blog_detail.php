<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_blog_detail['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo safe_data($blog_detail_single['title']); ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>blog"><?php echo BLOG; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo safe_data($blog_detail_single['title']); ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="page-content blog-section-rtl">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="single-section">
					
					<div class="blog-item shadow-lg p-3 mb-5 bg-white rounded">
						<div class="featured-photo">
							<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($blog_detail_single['photo']); ?>">
						</div>
						<div class="text">
							<?php echo safe_data($blog_detail_single['description']); ?>
						</div>

						<div class="share_buttons mb-3">
							<a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo base_url(); ?>blog-detail/<?php echo safe_data($blog_detail_single['slug']); ?>&t=<?php echo safe_data($blog_detail_single['title']); ?>"><i class="fa fa-facebook"></i></a>

							<a class="twitter" target="_blank" href="https://twitter.com/share?text=<?php echo safe_data($blog_detail_single['title']); ?>&url=<?php echo base_url(); ?>blog-detail/<?php echo safe_data($blog_detail_single['slug']); ?>"><i class="fa fa-twitter"></i></a>

							<a class="pinterest" target="_blank" href="https://www.pinterest.com/pin/create/button/?description=<?php echo safe_data($blog_detail_single['title']); ?>&url=<?php echo base_url(); ?>blog-detail/<?php echo safe_data($blog_detail_single['slug']); ?>"><i class="fa fa-pinterest"></i></a>

							<a class="linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url(); ?>blog-detail/<?php echo safe_data($blog_detail_single['slug']); ?>&title=<?php echo safe_data($blog_detail_single['title']); ?>"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>

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