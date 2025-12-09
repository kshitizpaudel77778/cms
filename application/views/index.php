<?php $this->view('header'); ?>

<?php
$CI =& get_instance();
$CI->load->model('Home_model');
?>

<div class="slide" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($slider_row['photo']); ?>);">
	<div class="text-part">
		<h1><?php echo safe_data($slider_row['title']); ?></h1>
		<h2><?php echo safe_data($slider_row['subtitle']); ?></h2>
		<div class="countdown show" data-Date='<?php echo safe_data($slider_row['event_date']); ?> <?php echo safe_data($slider_row['event_time']); ?>'>
			<div class="boxes running">
				<div class="box">
					<div class="num"><timer><span class="days"></span></timer></div>
					<div class="name"><?php echo DAYS; ?></div>
				</div>
				<div class="box">
					<div class="num"><timer><span class="hours"></span></timer></div>
					<div class="name"><?php echo HOURS; ?></div>
				</div>
				<div class="box">
					<div class="num"><timer><span class="minutes"></span></timer></div>
					<div class="name"><?php echo MINUTES; ?></div>
				</div>
				<div class="box">
					<div class="num"><timer><span class="seconds"></span></timer></div>
					<div class="name"><?php echo SECONDS; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if($feature_section_status == 'Show'): ?>
<div class="feature">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="feature-item">
					<div class="icon">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($quick_link_row['icon1']); ?>" alt="">
					</div>
					<h4><?php echo safe_data($quick_link_row['title1']); ?></h4>
					<a href="<?php echo base_url(); ?>tickets"></a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-item">
					<div class="icon">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($quick_link_row['icon2']); ?>" alt="">
					</div>
					<h4><?php echo safe_data($quick_link_row['title2']); ?></h4>
					<a href="<?php echo base_url(); ?>speakers"></a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-item">
					<div class="icon">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($quick_link_row['icon3']); ?>" alt="">
					</div>
					<h4><?php echo safe_data($quick_link_row['title3']); ?></h4>
					<a href="<?php echo base_url(); ?>sponsors"></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>


<?php if($special_section_status == 'Show'): ?>
<div class="special">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="full-section d-flex justify-content-center bg_ffffff">
					<div class="left-side">
						<div class="inner">
							<h2><?php echo safe_data($welcome_row['title']); ?></h2>
							<h3><?php echo safe_data($welcome_row['subtitle']); ?></h3>
							<p>
								<?php echo nl2br(safe_data($welcome_row['description'])); ?>
							</p>
							<div class="read-more">
								<a href="<?php echo safe_data($welcome_row['button_url']); ?>" class="btn btn-primary btn-arf"><?php echo safe_data($welcome_row['button_text']); ?></a>
							</div>
						</div>
					</div>
					<div class="right-side" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($welcome_row['photo']); ?>);">
						<a class="video-button" href="https://www.youtube.com/watch?v=<?php echo safe_data($welcome_row['yt_video_code']); ?>"><span></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>


<?php if($testimonial_section_status == 'Show'): ?>
<div class="testimonial" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($testimonial_background['testimonial_background']); ?>);">
	<div class="testimonial-bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2><?php echo safe_data($testimonial_home['title']); ?></h2>
					<h3><?php echo safe_data($testimonial_home['subtitle']); ?></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">				
				<div class="testimonial-carousel owl-carousel">					
					<?php
					foreach($testimonial as $row)
					{
						?>
						<div class="testimonial-item">
							<div class="photo">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>" alt="">
							</div>
							<div class="text">
								<p>
									<?php echo nl2br(safe_data($row['comment'])); ?>
								</p>
								<h3><?php echo safe_data($row['name']); ?></h3>
								<h4><?php echo safe_data($row['designation']); ?></h4>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>


<?php if($speakers_section_status == 'Show'): ?>
<div class="team">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2><?php echo safe_data($speaker_home['title']); ?></h2>
					<h3><?php echo safe_data($speaker_home['subtitle']); ?></h3>
				</div>
			</div>
		</div>
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
<?php endif; ?>


<?php if($schedule_section_status == 'Show'): ?>
<div class="schedule">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2><?php echo safe_data($schedule_home['title']); ?></h2>
					<h3><?php echo safe_data($schedule_home['subtitle']); ?></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
					<?php
					$i=0;
					foreach($event_date_all as $row)
					{
						$i++;
						if($i==1)
						{
							$a = 'active';
							$b = 'true';
						}
						else
						{
							$a = '';
							$b = 'false';
						}
						?>
						<li class="nav-item" role="presentation">
							<a class="nav-link <?php echo safe_data($a); ?>" id="pills-<?php echo safe_data($i); ?>-tab" data-toggle="pill" href="#pills-<?php echo safe_data($i); ?>" role="tab" aria-controls="pills-<?php echo safe_data($i); ?>" aria-selected="<?php echo safe_data($b); ?>">
								
								<div class="part-1">
									<?php echo safe_data($row['ed_month']); ?>
								</div>
								<div class="part-2 d-flex justify-content-center">
									<div class="part-2-content">
										<?php echo safe_data($row['ed_day']); ?>
									</div>	
								</div>
								<div class="part-3">
									<div class="inner">
										<?php echo safe_data($row['ed_name']); ?>
									</div>
								</div>

							</a>
						</li>
						<?php
					}
					?>
				</ul>

				<div class="tab-content" id="pills-tabContent">
					<?php
					$i=0;
					$j=0;
					foreach($event_date_all as $row)
					{
						$i++;
						if($i==1)
						{
							$a = 'show';
							$b = 'active';
						}
						else
						{
							$a = '';
							$b = '';
						}
						?>
						<div class="tab-pane fade <?php echo safe_data($a); ?> <?php echo safe_data($b); ?>" id="pills-<?php echo safe_data($i); ?>" role="tabpanel" aria-labelledby="pills-<?php echo safe_data($i); ?>-tab">
							
							<?php
							$event_all = $CI->Home_model->event_all($row['ed_id']);
							foreach($event_all as $row1)
							{
								$j++;
								?>
								<div class="schedule-content d-flex justify-content-center">
									<div class="left">
										<div class="item">
											<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row1['photo']); ?>" alt="">
											<h3><a href="<?php echo base_url(); ?>speaker/<?php echo safe_data($row1['slug']); ?>"><?php echo safe_data($row1['name']); ?></a></h3>
										</div>
									</div>
									<div class="right">
										<h5><?php echo safe_data($row1['e_time']); ?></h5>
										<h4><?php echo safe_data($row1['e_name']); ?></h4>
										<p>
											<?php echo safe_data($row1['e_short_description']); ?>
										</p>
										<div class="more">
											<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mod<?php echo safe_data($j); ?>"><?php echo SEE_DETAILS; ?></a>
										</div>
										<!-- Modal -->
										<div class="modal fade" id="mod<?php echo safe_data($j); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	<div class="modal-dialog modal-lg">
										    	<div class="modal-content">
										      		<div class="modal-header">
										        		<h4 class="modal-title" id="exampleModalLabel">
										        			<?php echo SESSION_COLON; ?> <?php echo safe_data($row1['e_name']); ?>
										        		</h4>
										        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          			<span aria-hidden="true">&times;</span>
										        		</button>
										      		</div>
										      		<div class="modal-body">
										        		<?php echo safe_data($row1['e_description']); ?>
										      		</div>
										      		<div class="modal-footer">
										        		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo CLOSE; ?></button>
										      		</div>
										    	</div>
										  	</div>
										</div>
										<!-- // Modal -->
									</div>
								</div><!-- // schedule-content -->
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
</div>
<?php endif; ?>


<?php if($call_to_action_section_status == 'Show'): ?>
<div class="cta" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($cta_row['background_photo']); ?>);">
	<div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cta-box text-center">
                    <h2><?php echo safe_data($cta_row['title']); ?></h2>
                    <p class="mt-3">
                    	<?php echo nl2br(safe_data($cta_row['text'])); ?>
                    </p>
                    <a href="<?php echo safe_data($cta_row['button_url']); ?>" class="btn btn-primary"><?php echo safe_data($cta_row['button_text']); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($sponsors_section_status == 'Show'): ?>
<div class="partner bg-lightblue">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2><?php echo safe_data($sponsor_home['title']); ?></h2>
					<h3><?php echo safe_data($sponsor_home['subtitle']); ?></h3>
				</div>
			</div>
		</div>

		<div class="row mt_20">
			<div class="col-md-12">
				<div class="partner-carousel owl-carousel">
					<?php
					foreach($sponsor as $row)
					{
						?>
						<div class="item">
							<div class="inner">
								<?php if($row['sponsor_url']!=''): ?>
									<a href="<?php echo safe_data($row['sponsor_url']); ?>" target="_blank"><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['sponsor_photo']); ?>" alt=""></a>
								<?php else: ?>
									<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['sponsor_photo']); ?>" alt="">
								<?php endif; ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>


<?php if($blog_section_status == 'Show'): ?>
<div class="blog-area">
    <div class="container">
        
        <div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2><?php echo safe_data($blog_home['title']); ?></h2>
					<h3><?php echo safe_data($blog_home['subtitle']); ?></h3>
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12">
                <div class="blog-carousel owl-carousel">                    
                    <?php
					foreach($blog as $row)
					{
						?>
						<div class="blog-item">
	                        <a href="<?php echo base_url(); ?>blog-detail/<?php echo safe_data($row['slug']); ?>">
	                            <div class="blog-image">
	                                <img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>" alt="<?php echo safe_data($row['title']); ?>">
	                            </div>
	                        </a>
	                        <div class="blog-text">
	                            <h3><a href="<?php echo base_url(); ?>blog-detail/<?php echo safe_data($row['slug']); ?>"><?php echo safe_data($row['title']); ?></a></h3>
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
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($newsletter_section_status == 'Show'): ?>
<div class="newsletter-area" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($newsletter_row['background_photo']); ?>);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 newsletter">
				<div class="newsletter-text">
					<h2><?php echo safe_data($newsletter_row['title']); ?></h2>
					<p>
						<?php echo nl2br(safe_data($newsletter_row['text'])); ?>
					</p>
				</div>
				<div class="newsletter-button">
					<?php echo form_open(base_url().'home/subscriber',array('class' => 'justify-content-center')); ?>
						<input type="text" placeholder="<?php echo ENTER_YOUR_EMAIL; ?>" name="subs_email">
						<input type="submit" value="<?php echo SUBMIT; ?>" name="form1">
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>


<?php $this->view('footer'); ?>