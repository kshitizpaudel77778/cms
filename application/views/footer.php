<?php
$CI =& get_instance();
$CI->load->model('Copyright_model');
$CI->load->model('Setting_model');
$CI->load->model('Social_media_model');
$CI->load->model('Tickets_model');
$copyright = $CI->Copyright_model->get_row_data();
$social = $CI->Social_media_model->get_data();
$payment_data = $CI->Tickets_model->payment_data();
$theme = $CI->Setting_model->get_theme();
$tawk_data = $CI->Setting_model->get_tawk_data();
?>
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="social">
							<ul>
								<?php
								foreach($social as $row)
								{
									?>
									<li><a href="<?php echo safe_data($row['url']); ?>" target="_blank"><i class="<?php echo safe_data($row['icon']); ?>"></i></a></li>
									<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="footer-menu">
							<ul>
								<li><a href="<?php echo base_url(); ?>about">About</a></li>
								<li><a href="<?php echo base_url(); ?>privacy">Privacy Policy</a></li>
								<li><a href="<?php echo base_url(); ?>terms">Terms and Conditions</a></li>
								<li><a href="<?php echo base_url(); ?>blog">Blog</a></li>
								<li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							<p><?php echo safe_data($copyright['copyright_text']); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

      	<div class="scroll-top">
	        <i class="fa fa-angle-up"></i>
	    </div>

		<script src="<?php echo base_url(); ?>public/js/custom.js"></script>

		<?php if($theme['theme_direction'] == 'ltr'): ?>
	    <script src="<?php echo base_url(); ?>public/js/ltr.js"></script>
	    <?php endif; ?>

	    <?php if($theme['theme_direction'] == 'rtl'): ?>
	    <script src="<?php echo base_url(); ?>public/js/rtl.js"></script>
	    <?php endif; ?>

		<script>
			//StickyHeader
			function stickyHeader()
			{
				var stickyScrollPos = $('#stickymenu').next().offset().top;
				if ($('#stickymenu').length)
				{
					if ($(window).scrollTop() > stickyScrollPos) 
					{
						$('#stickymenu').addClass('sticky');
					}
					else if ($(window).scrollTop() <= stickyScrollPos) 
					{
						$('#stickymenu').removeClass('sticky');
					}
				};
			}
			$(window).on('scroll', function () {
				stickyHeader();
			});
		</script>

	    <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "5000",
                "timeOut": "5000",
                "extendedTimeOut": "5000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>

        <?php
        if($this->session->flashdata('success')):
            echo '
            <script>
            toastr.success(\''.$this->session->flashdata('success').'\');
            </script>
            ';
        endif;
        if($this->session->flashdata('error')):
            echo '
            <script>
            toastr.error(\''.$this->session->flashdata('error').'\');
            </script>
            ';
        endif;
        ?>

        <?php
        if($tawk_data['tawk_live_chat_status'] == 'On'):
        	echo $tawk_data['tawk_live_chat_code'];
        endif;
        ?>

   </body>
</html>