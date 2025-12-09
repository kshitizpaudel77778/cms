<?php
$CI =& get_instance();
$CI->load->model('Setting_model');
$CI->load->model('Tickets_model');
$logo = $CI->Setting_model->get_logo();
$favicon = $CI->Setting_model->get_favicon();
$theme = $CI->Setting_model->get_theme();
$payment_data = $CI->Tickets_model->payment_data();
?>

<!DOCTYPE html>
<html lang="en">
   	<head>

    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<?php
        $class_name = '';
        $segment_2 = 0;
        $segment_3 = 0;
        $class_name = $this->router->fetch_class();
        $segment_2 = $this->uri->segment('2');
        $segment_3 = $this->uri->segment('3');
        ?>

		<?php
		if($class_name == 'home')
		{
			$CI->load->model('Home_model');
			$page_info = $CI->Home_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'about')
		{
			$CI->load->model('About_model');
			$page_info = $CI->About_model->about_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'organizers')
		{
			$CI->load->model('Organizers_model');
			$page_info = $CI->Organizers_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'attendees')
		{
			$CI->load->model('Attendees_model');
			$page_info = $CI->Attendees_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'accommodations')
		{
			$CI->load->model('Accommodations_model');
			$page_info = $CI->Accommodations_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'parking')
		{
			$CI->load->model('Parking_model');
			$page_info = $CI->Parking_model->parking_description();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'location')
		{
			$CI->load->model('Location_model');
			$page_info = $CI->Location_model->location_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'code_of_conduct')
		{
			$CI->load->model('Code_of_conduct_model');
			$page_info = $CI->Code_of_conduct_model->code_of_conduct_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'call_for_volunteers')
		{
			$CI->load->model('Call_for_volunteers_model');
			$page_info = $CI->Call_for_volunteers_model->call_for_volunteers_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'photos')
		{
			$CI->load->model('Photos_model');
			$page_info = $CI->Photos_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'videos')
		{
			$CI->load->model('Videos_model');
			$page_info = $CI->Videos_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'speakers')
		{
			$CI->load->model('Speakers_model');
			$page_info = $CI->Speakers_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'sponsors')
		{
			$CI->load->model('Sponsors_model');
			$page_info = $CI->Sponsors_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'call_for_sponsors')
		{
			$CI->load->model('Call_for_sponsors_model');
			$page_info = $CI->Call_for_sponsors_model->call_for_sponsors_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'tickets')
		{
			$CI->load->model('Tickets_model');
			$page_info = $CI->Tickets_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'blog')
		{
			$CI->load->model('Blog_model');
			$page_info = $CI->Blog_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'contact')
		{
			$CI->load->model('Contact_model');
			$page_info = $CI->Contact_model->contact_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'privacy')
		{
			$CI->load->model('Privacy_model');
			$page_info = $CI->Privacy_model->privacy_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'terms')
		{
			$CI->load->model('Terms_model');
			$page_info = $CI->Terms_model->terms_row();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'schedule')
		{
			$CI->load->model('Schedule_model');
			$page_info = $CI->Schedule_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'speaker')
		{
			$CI->load->model('Speaker_model');
			$page_info = $CI->Speaker_model->speaker_single($segment_2);
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'organizer')
		{
			$CI->load->model('Organizer_model');
			$page_info = $CI->Organizer_model->organizer_single($segment_2);
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}

		if($class_name == 'blog_detail')
		{
			$CI->load->model('Blog_detail_model');
			$page_info = $CI->Blog_detail_model->blog_detail_single($segment_2);
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';

			echo '<meta property="og:title" content="'.$page_info['title'].'">';
			echo '<meta property="og:image" content="'.base_url().'public/uploads/'.$page_info['photo'].'">';
			echo '<meta property="og:description" content="'.$page_info['short_description'].'">';
			echo '<meta property="og:url" content="'.base_url().'blog-detail/'.$page_info['slug'].'">';

		}

		if($class_name == 'search')
		{
			$CI->load->model('Search_model');
			$page_info = $CI->Search_model->page_info();
			echo '<title>'.safe_data($page_info['seo_title']).'</title>';
			echo '<meta name="description" content="'.safe_data($page_info['seo_meta_description']).'">';
		}
		?>		

		<!-- All CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/magnific-popup.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.min.css">    	
    	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.dataTables.min.css">	
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/select2.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/select2-bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/meanmenu.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/toastr.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/spacing.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">

		<?php if($theme['theme_direction'] == 'rtl'): ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/rtl.css">
		<?php endif; ?>

		<!-- Favicon -->
		<link href="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($favicon['favicon']); ?>" rel="shortcut icon" type="image/png">

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

		
		<!-- All JS -->
		<script src="<?php echo base_url(); ?>public/js/jquery-3.5.1.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/wow.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/jquery.meanmenu.js"></script>
		<script src="<?php echo base_url(); ?>public/js/waypoints.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/jquery.counterup.min.js"></script>		
		<script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/select2.full.js"></script>
		<script src="<?php echo base_url(); ?>public/js/toastr.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/multi-countdown.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="https://www.paypalobjects.com/api/checkout.js"></script>
		
		<style>
			.main-nav nav .navbar-nav .nav-item a:hover,
			.main-nav nav .navbar-nav .nav-item:hover a,
			.special .left-side h3,
			.team-text h4 a,
			.schedule .nav-pills .nav-link.active .part-3 .inner,
			.schedule-content .left h3 a,
			.blog-area .blog-item h3 a:hover,
			.footer .footer-menu li a:hover,
			.team-text h4,
			.pricing .card-price,
			.sidebar .widget .type-2 ul li a:hover {
				color: #<?php echo safe_data($theme['front_end_color']); ?>!important;
			}

			.main-nav nav .navbar-nav .nav-item .dropdown-menu,
			.slide:before,
			.feature .feature-item,
			.special .left-side .read-more a,
			.video-button:before,
			.video-button:after,
			.scroll-top,
			.testimonial-bg,
			.team-item .team-photo:before,
			.schedule .nav-pills .nav-link.active,
			.schedule-content .right .more a,
			.cta .overlay,
			.blog-area .read-more a,
			.newsletter-area .overlay,
			.footer .social li a:hover,
			.bg-page,
			.team-social li a,
			.gallery-heading,
			.team-single .session .more a,
			.sponsors-heading,
			.pricing .btn,
			.single-section .read-more a,
			.sidebar .widget .search button,
			.c-form button {
				background: #<?php echo safe_data($theme['front_end_color']); ?>!important;
			}

			.footer .social li a:hover,
			.team-social li a {
				border-color: #<?php echo safe_data($theme['front_end_color']); ?>!important;
			}


			.main-nav nav .navbar-nav .nav-item .dropdown-menu li a {
				color: #fff!important;
			}

			.feature .feature-item:hover,
			.special .left-side .read-more a:hover,
			.schedule-content .right .more a:hover,
			.blog-area .read-more a:hover,
			.pricing .btn:hover,
			.single-section .read-more a:hover,
			.c-form button:hover {
				background: #333!important;
			}

		</style>
   	</head>
   	<body>

      	<!-- Start Navbar Area -->
		<div class="navbar-area" id="stickymenu">

			<!-- Menu For Mobile Device -->
			<div class="mobile-nav">
				<a href="<?php echo base_url(); ?>" class="logo">
					<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($logo['logo']); ?>" alt="">
				</a>
			</div>

			<!-- Menu For Desktop Device -->
			<div class="main-nav">
				<div class="container">
					<nav class="navbar navbar-expand-md navbar-light">
						<a class="navbar-brand" href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($logo['logo']); ?>" alt="logo">
						</a>
						<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">

								<li class="nav-item">
									<a href="<?php echo base_url(); ?>" class="nav-link"><?php echo MENU_HOME; ?></a>
								</li>
								
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>about" class="nav-link dropdown-toggle"><?php echo MENU_ABOUT; ?></a>
									<ul class="dropdown-menu">
								
										<li class="nav-item">
											<a href="<?php echo base_url(); ?>organizers" class="nav-link"><?php echo MENU_ORGANIZERS; ?></a>
										</li>

										<li class="nav-item">
											<a href="<?php echo base_url(); ?>attendees" class="nav-link"><?php echo MENU_ATTENDEES; ?></a>
										</li>

										<li class="nav-item">
											<a href="<?php echo base_url(); ?>accommodations" class="nav-link"><?php echo MENU_ACCOMMODATIONS; ?></a>
										</li>
										
										<li class="nav-item">
											<a href="<?php echo base_url(); ?>parking" class="nav-link"><?php echo MENU_PARKING; ?></a>
										</li>
										
										<li class="nav-item">
											<a href="<?php echo base_url(); ?>location" class="nav-link"><?php echo MENU_LOCATION; ?></a>
										</li>

										<li class="nav-item">
											<a href="<?php echo base_url(); ?>code-of-conduct" class="nav-link"><?php echo MENU_CODE_OF_CONDUCT; ?></a>
										</li>

										<li class="nav-item">
											<a href="<?php echo base_url(); ?>call-for-volunteers" class="nav-link"><?php echo MENU_CALL_FOR_VOLUNTEERS; ?></a>
										</li>
										
										<li class="nav-item">
											<a href="<?php echo base_url(); ?>photos" class="nav-link"><?php echo MENU_PHOTOS; ?></a>
										</li>
										
										<li class="nav-item">
											<a href="<?php echo base_url(); ?>videos" class="nav-link"><?php echo MENU_VIDEOS; ?></a>
										</li>
										
									</ul>
								</li>

								<li class="nav-item">
									<a href="<?php echo base_url(); ?>schedule" class="nav-link "><?php echo MENU_SCHEDULE; ?></a>
								</li>

								<li class="nav-item">
									<a href="<?php echo base_url(); ?>speakers" class="nav-link "><?php echo MENU_SPEAKERS; ?></a>
								</li>

								<li class="nav-item">
									<a href="javascript:void;" class="nav-link dropdown-toggle"><?php echo MENU_SPONSORS; ?></a>
									<ul class="dropdown-menu">
								
										<li class="nav-item">
											<a href="<?php echo base_url(); ?>sponsors" class="nav-link"><?php echo MENU_SPONSORS; ?></a>
										</li>

										<li class="nav-item">
											<a href="<?php echo base_url(); ?>call-for-sponsors" class="nav-link"><?php echo MENU_CALL_FOR_SPONSORS; ?></a>
										</li>
									</ul>
								</li>

								<li class="nav-item">
									<a href="<?php echo base_url(); ?>tickets" class="nav-link "><?php echo MENU_TICKETS; ?></a>
								</li>
							
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>blog" class="nav-link "><?php echo MENU_BLOG; ?></a>
								</li>

								<li class="nav-item">
									<a href="<?php echo base_url(); ?>contact" class="nav-link "><?php echo MENU_CONTACT; ?></a>
								</li>

							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- End Navbar Area -->