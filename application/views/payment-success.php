<?php $this->view('header'); ?>

<div class="page-banner" style="background: #333;">
	<div class="bg-page"></div>
	<div class="text">
		<h1><?php echo PAYMENT_SUCCESS; ?></h1>
		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb justify-content-center">
			    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo HOME; ?></a></li>
			    <li class="breadcrumb-item active" aria-current="page"><?php echo PAYMENT_SUCCESS; ?></li>
		  	</ol>
		</nav>
	</div>
</div>

<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">				
				<p>
					<?php echo PAYMENT_SUCCESS_MESSAGE; ?>
				</p>
			</div>
		</div>
	</div>
</div>

<?php $this->view('footer'); ?>