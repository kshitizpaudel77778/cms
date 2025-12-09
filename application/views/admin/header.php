<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Admin Panel</title>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/sb-admin-2.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/vendor/datatables/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/toastr.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.timepicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/summernote-bs4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/spacing.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/style.css">

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <script src="<?php echo base_url(); ?>public/admin/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>        
        <script src="<?php echo base_url(); ?>public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
        
        <script src="<?php echo base_url(); ?>public/admin/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/js/demo/datatables-demo.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/js/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/js/jscolor.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/js/jquery.timepicker.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/js/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/js/summernote-bs4.min.js"></script>

    </head>
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>admin/dashboard">
                    <div class="sidebar-brand-text mx-3">Admin Panel</div>
                </a>
                
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <?php
                $class_name = '';
                $segment_2 = 0;
                $segment_3 = 0;
                $class_name = $this->router->fetch_class();
                $segment_2 = $this->uri->segment('2');
                $segment_3 = $this->uri->segment('3');
                ?>

                <?php
                $top = '';
                $show = '';
                if($class_name == 'dashboard') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
               
                
                <?php
                $top = '';
                $show = '';
                if($class_name == 'setting') {
                    $top = 'active';
                    $show = 'show';
                }
                ?>

                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                    </a>
                    <div id="collapsePages" class="collapse <?php echo safe_data($show); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item <?php if($segment_3 == 'logo') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/logo">Logo</a>
                            
                            <a class="collapse-item <?php if($segment_3 == 'favicon') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/favicon">Favicon</a>

                            <a class="collapse-item <?php if($segment_3 == 'login-photo') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/login-photo">Login Page Photo</a>

                            <a class="collapse-item <?php if($segment_3 == 'email') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/email">Email</a>

                            <a class="collapse-item <?php if($segment_3 == 'captcha') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/captcha">Captcha</a>

                            <a class="collapse-item <?php if($segment_3 == 'payment') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/payment">Payment</a>

                            <a class="collapse-item <?php if($segment_3 == 'banner') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/banner">Banner</a>

                            <a class="collapse-item <?php if($segment_3 == 'theme') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/theme">Theme</a>

                            <a class="collapse-item <?php if($segment_3 == 'ticket') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/ticket">Ticket</a>

                            <a class="collapse-item <?php if($segment_3 == 'tawk-live-chat') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/setting/tawk-live-chat">Tawk Live Chat</a>

                        </div>
                    </div>
                </li>

                <?php
                $top = '';
                $show = '';
                if($class_name == 'copyright' || $class_name == 'social_media' ) {
                    $top = 'active';
                    $show = 'show';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFooter" aria-expanded="true" aria-controls="collapseFooter">
                    <i class="fas fa-cannabis"></i>
                    <span>Footer</span>
                    </a>
                    <div id="collapseFooter" class="collapse <?php echo safe_data($show); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item <?php if($class_name == 'copyright') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/copyright">
                                Copyright
                            </a>

                            <a class="collapse-item <?php if($class_name == 'social_media') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/social-media">
                                Social Media
                            </a>
                        
                        </div>
                    </div>
                </li>


                <?php
                $top = '';
                $show = '';
                if($class_name == 'subscriber' ) {
                    $top = 'active';
                    $show = 'show';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubscriber" aria-expanded="true" aria-controls="collapseSubscriber">
                    <i class="fas fa-user-friends"></i>
                    <span>Subscribers</span>
                    </a>
                    <div id="collapseSubscriber" class="collapse <?php echo safe_data($show); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item <?php if($class_name == 'subscriber' && $segment_3 == '') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/subscriber">
                                Subscribers
                            </a>

                            <a class="collapse-item <?php if($segment_3 == 'send-email') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/subscriber/send-email">
                                Send Message (Email)
                            </a>

                            <a class="collapse-item <?php if($segment_3 == 'all-message') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/subscriber/all-message">
                                All Messages (Email)
                            </a>
                        
                        </div>
                    </div>
                </li>


                <?php
                $top = '';
                $show = '';
                if($class_name == 'language') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/language">
                    <i class="fas fa-language"></i>
                    <span>Language</span></a>
                </li>
                

                <?php
                $top = '';
                $show = '';
                if($class_name == 'home_meta' || $class_name == 'home_section' || $class_name == 'slider' || $class_name == 'welcome' || $class_name == 'quick_link' || $class_name == 'testimonial' || $class_name == 'speaker_home' || $class_name == 'schedule_home' || $class_name == 'sponsor_home' || $class_name == 'blog_home' || $class_name == 'cta' || $class_name == 'newsletter' ) {
                    $top = 'active';
                    $show = 'show';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_home" aria-expanded="true" aria-controls="collapse_home">
                    <i class="fas fa-home"></i>
                    <span>Home Page</span>
                    </a>
                    <div id="collapse_home" class="collapse <?php echo safe_data($show); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item <?php if($class_name == 'home_meta') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/home-meta">
                                Meta Information
                            </a>

                            <a class="collapse-item <?php if($class_name == 'home_section') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/home-section">
                                Section Manage
                            </a>

                            <a class="collapse-item <?php if($class_name == 'slider') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/slider">
                                Slider
                            </a>

                            <a class="collapse-item <?php if($class_name == 'quick_link') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/quick-link">
                                Quick Links
                            </a>

                            <a class="collapse-item <?php if($class_name == 'welcome') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/welcome">
                                Welcome
                            </a>

                            <a class="collapse-item <?php if($class_name == 'testimonial') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/testimonial">
                                Testimonial
                            </a>

                            <a class="collapse-item <?php if($class_name == 'speaker_home') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/speaker-home">
                                Speaker
                            </a>

                            <a class="collapse-item <?php if($class_name == 'schedule_home') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/schedule-home">
                                Schedule
                            </a>

                            <a class="collapse-item <?php if($class_name == 'sponsor_home') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/sponsor-home">
                                Sponsor
                            </a>

                            <a class="collapse-item <?php if($class_name == 'blog_home') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/blog-home">
                                Blog
                            </a>

                            <a class="collapse-item <?php if($class_name == 'cta') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/cta">
                                Call to Action
                            </a>

                            <a class="collapse-item <?php if($class_name == 'newsletter') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/newsletter">
                                Newsletter
                            </a>
                            
                        
                        </div>
                    </div>
                </li>




                <?php
                $top = '';
                $show = '';

                if($class_name == 'about' || $class_name == 'organizer' || $class_name == 'attendee' || $class_name == 'accommodation' || $class_name == 'parking' || $class_name == 'location' || $class_name == 'code_of_conduct' || $class_name == 'call_for_volunteers'  || $class_name == 'photo' || $class_name == 'video' ) {
                    $top = 'active';
                    $show = 'show';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_about" aria-expanded="true" aria-controls="collapse_about">
                    <i class="fas fa-server"></i>
                    <span>About Page</span>
                    </a>
                    <div id="collapse_about" class="collapse <?php echo safe_data($show); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item <?php if($class_name == 'about') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/about">
                                About
                            </a>

                            <a class="collapse-item <?php if($class_name == 'organizer') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/organizer">
                                Organizers
                            </a>

                            <a class="collapse-item <?php if($class_name == 'attendee') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/attendee">
                                Attendees
                            </a>

                            <a class="collapse-item <?php if($class_name == 'accommodation') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/accommodation">
                                Accommodations
                            </a>

                            <a class="collapse-item <?php if($class_name == 'parking') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/parking">
                                Parking
                            </a>

                            <a class="collapse-item <?php if($class_name == 'location') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/location">
                                Location
                            </a>

                            <a class="collapse-item <?php if($class_name == 'code_of_conduct') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/code-of-conduct">
                                Code of Conduct
                            </a>

                            <a class="collapse-item <?php if($class_name == 'call_for_volunteers') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/call-for-volunteers">
                                Call for Volunteers
                            </a>

                            <a class="collapse-item <?php if($class_name == 'photo') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/photo">
                                Photo Gallery
                            </a>

                            <a class="collapse-item <?php if($class_name == 'video') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/video">
                                Video Gallery
                            </a>
                        
                        </div>
                    </div>
                </li>


                
                <?php
                $top = '';
                $show = '';

                if($class_name == 'event_meta' || $class_name == 'event_date' || $class_name == 'event' ) {
                    $top = 'active';
                    $show = 'show';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_schedule" aria-expanded="true" aria-controls="collapse_schedule">
                    <i class="fas fa-calendar-times"></i>
                    <span>Schedule</span>
                    </a>
                    <div id="collapse_schedule" class="collapse <?php echo safe_data($show); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item <?php if($class_name == 'event_meta') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/event-meta">
                                Meta Information
                            </a>

                            <a class="collapse-item <?php if($class_name == 'event_date') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/event-date">
                                Event Date
                            </a>

                            <a class="collapse-item <?php if($class_name == 'event') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/event">
                                Event Manage
                            </a>
                        
                        </div>
                    </div>
                </li>


                <?php
                $top = '';
                $show = '';
                if($class_name == 'speaker') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/speaker">
                    <i class="fas fa-id-card"></i>
                    <span>Speakers</span></a>
                </li>


                <?php
                $top = '';
                $show = '';

                if($class_name == 'sponsor' || $class_name == 'call_for_sponsors' ) {
                    $top = 'active';
                    $show = 'show';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_sponsor" aria-expanded="true" aria-controls="collapse_sponsor">
                    <i class="fas fa-diagnoses"></i>
                    <span>Sponsors</span>
                    </a>
                    <div id="collapse_sponsor" class="collapse <?php echo safe_data($show); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item <?php if($class_name == 'sponsor') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/sponsor">
                                Sponsors
                            </a>

                            <a class="collapse-item <?php if($class_name == 'call_for_sponsors') {echo 'active';} ?>" href="<?php echo base_url(); ?>admin/call-for-sponsors">
                                Call For Sponsors
                            </a>
                        
                        </div>
                    </div>
                </li>



                <?php
                $top = '';
                $show = '';
                if($class_name == 'ticket') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/ticket">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Tickets</span></a>
                </li>
                
                <?php
                $top = '';
                $show = '';
                if($class_name == 'blog') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/blog">
                    <i class="fas fa-cubes"></i>
                    <span>Blog</span></a>
                </li>
                               

                <?php
                $top = '';
                $show = '';
                if($class_name == 'contact') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/contact">
                    <i class="fas fa-address-book"></i>
                    <span>Contact</span></a>
                </li>


                <?php
                $top = '';
                $show = '';
                if($class_name == 'search') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/search-meta">
                    <i class="fas fa-search"></i>
                    <span>Search</span></a>
                </li>


                <?php
                $top = '';
                $show = '';
                if($class_name == 'privacy') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/privacy">
                    <i class="fas fa-user-secret"></i>
                    <span>Privacy Policy</span></a>
                </li>


                <?php
                $top = '';
                $show = '';
                if($class_name == 'terms') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/terms">
                    <i class="fas fa-atom"></i>
                    <span>Terms and Conditions</span></a>
                </li>



                <?php if($_SESSION['role']=='Super Admin'): ?>
                <?php
                $top = '';
                $show = '';
                if($class_name == 'admins') {
                    $top = 'active';
                }
                ?>
                <li class="nav-item <?php echo safe_data($top); ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/admin">
                    <i class="fas fa-atom"></i>
                    <span>Admins</span></a>
                </li>
                <?php endif; ?>

                <!-- Divider -->
                <hr class="sidebar-divider">                           


                



                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                        </button>
                        
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="btn btn-info btn-sm mt-3" href="../" target="_blank">
                                    Visit Website
                                </a>
                            </li>
                            
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo safe_data($_SESSION['full_name']); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($_SESSION['photo']); ?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>admin/profile">
                                        <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i> Change Profile Info
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>admin/login/logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">