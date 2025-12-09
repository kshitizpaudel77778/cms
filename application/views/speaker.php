<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_speaker_detail['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo safe_data($speaker_single['name']); ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>speakers"><?php echo SPEAKERS; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo safe_data($speaker_single['name']); ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="team-single pt_30 pb_20 bg_f3f3f3">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
		        <div class="team-item team-item-single mt_40 mb_40">
					<div class="team-photo">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($speaker_single['photo']); ?>" alt="">
						<div class="plus">
							<i class="fa fa-plus"></i>
						</div>
					</div>
					<div class="team-text">
						<h4><?php echo safe_data($speaker_single['name']); ?></h4>
					</div>
				</div>
		    </div>
		    <div class="col-md-1"></div>
		    <div class="col-md-8 d-flex align-items-center">
				<div class="table-responsive">
					<table class="table table-bordered">
		                <tr>
		                    <td><?php echo NAME; ?></td>
		                    <td><?php echo safe_data($speaker_single['name']); ?></td>
		                </tr>
		                <tr>
		                    <td><?php echo DESIGNATION; ?></td>
		                    <td><?php echo safe_data($speaker_single['designation']); ?></td>
		                </tr>
		                <tr>
		                    <td><?php echo EMAIL_ADDRESS; ?></td>
		                    <td><?php echo safe_data($speaker_single['email']); ?></td>
		                </tr>
		                <tr>
		                    <td><?php echo PHONE; ?></td>
		                    <td><?php echo safe_data($speaker_single['phone']); ?></td>
		                </tr>

		                <?php if($speaker_single['website']!=''): ?>
		                <tr>
		                    <td><?php echo WEBSITE; ?></td>
		                    <td><a href="<?php echo safe_data($speaker_single['website']); ?>" target="_blank"><?php echo safe_data($speaker_single['website']); ?></a></td>
		                </tr>
		            	<?php endif; ?>

		                <tr>
		                    <td><?php echo SOCIAL_MEDIA; ?></td>
		                    <td>
		                    	<?php if( $speaker_single['facebook']!='' || $speaker_single['twitter']!='' || $speaker_single['linkedin']!='' || $speaker_single['instagram']!='' ): ?>
	                    		<div class="team-social">
									<ul>
										<?php if($speaker_single['facebook']!=''): ?>
											<li><a href="<?php echo safe_data($speaker_single['facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<?php endif; ?>

										<?php if($speaker_single['twitter']!=''): ?>
										<li><a href="<?php echo safe_data($speaker_single['twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<?php endif; ?>

										<?php if($speaker_single['linkedin']!=''): ?>
										<li><a href="<?php echo safe_data($speaker_single['linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										<?php endif; ?>

										<?php if($speaker_single['instagram']!=''): ?>
										<li><a href="<?php echo safe_data($speaker_single['instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
										<?php endif; ?>

									</ul>
								</div>
								<?php endif; ?>
		                    </td>
		                </tr>
		            </table>
				</div>
		    </div>
		</div>
	</div>
</div>

<div class="team-single pt_40 pb_40">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="description">
					<p>
						<?php echo safe_data($speaker_single['biography']); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="team-single pt_40 pb_40 bg_f3f3f3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 session">
				
				<?php
				$CI =& get_instance();
				$CI->load->model('Speaker_model');
				$event_date_all = $CI->Speaker_model->event_date_all();
				
				$j=0;
				foreach($event_date_all as $row)
				{
					$event_by_ed_and_speaker = $CI->Speaker_model->event_by_ed_and_speaker($row['ed_id'],$speaker_single['id']);

					if(!$event_by_ed_and_speaker) {continue;}
					?>
					<h2 class="mt_20 mb_10"><?php echo safe_data($row['ed_name']); ?> (<?php echo safe_data($row['ed_month']); ?> <?php echo safe_data($row['ed_day']); ?>)</h2>
					
					<div class="table-responsive">
						<table class="table table-bordered">
							<?php
							foreach($event_by_ed_and_speaker as $row1)
							{
								$j++;
								?>
								<tr>
									<td>
										<?php echo safe_data($row1['e_time']); ?>
									</td>
									<td>
										<h3><?php echo SESSION_COLON; ?> <?php echo safe_data($row1['e_name']); ?></h3>
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
									</td>
								</tr>
								<?php
							}
							?>
						</table>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>