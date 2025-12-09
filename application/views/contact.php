<?php $this->view('header'); ?>

<div class="page-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_contact['banner']); ?>)">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo CONTACT; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo CONTACT; ?></li>
		  	</ol>
		</nav>
	</div>
</div>


<div class="page-content call-sponsor contact-page-rtl">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h2><?php echo CONTACT_FORM; ?></h2>

				<div class="c-form mt_30">
					<?php echo form_open(base_url().'contact',array('class' => '')); ?>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label><?php echo NAME; ?> *</label>
									<input type="text" class="form-control" name="name">
								</div>		
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><?php echo EMAIL_ADDRESS; ?> *</label>
									<input type="email" class="form-control" name="email">
								</div>		
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><?php echo PHONE; ?> *</label>
									<input type="text" class="form-control" name="phone">
								</div>		
							</div>
						</div>
						<div class="form-group">
							<label><?php echo MESSAGE; ?> *</label>
							<textarea name="message" class="form-control h-200" cols="30" rows="10"></textarea>
						</div>

						<?php if($captcha['captcha_status'] == 'On'): ?>
						<div class="form-group">
                            <div class="g-recaptcha" data-sitekey="<?php echo safe_data($captcha['recaptcha_site_key']); ?>"></div>
	                    </div>
	                	<?php endif; ?>

	                    <div class="form-group button-container">
							<button type="submit" class="btn btn-primary mt_10" name="form1"><?php echo SUBMIT; ?></button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>