<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/'; ?>jquery.min.js"></script>

    <script type="text/javascript">
      var chat_id = "<?php echo $chat_id; ?>";

      var user_id = "<?php echo $user_id; ?>";
      var layanan_id = "<?php echo $layanan_id; ?>";

      var chat_from = "<?php echo $chat_from; ?>";
      var chat_to = "<?php echo $chat_to; ?>";
    </script>
    
    <!-- Custom JS start -->
    <script type="text/javascript" src="<?php echo base_url().'assets/js/'; ?>chat.js"></script>
    <!-- Custom JS end -->

    <!-- <script src="<?php echo base_url() ?>assets/js/latest-v2.js"></script> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/camera.css">
    <?php
    if ($this->session->userdata('role') == 1) {
        $link = 'assets/css/chat.css';
    } else {
        $link = 'assets/css/chat_admin.css';
    }
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().$link; ?>">
    <script type="text/javascript">
      var base_url = "<?php echo base_url(); ?>";
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <!-- BREAK -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Balai Besar Keramik</title>
    <meta name="description" content="Balai Besar Keramik">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icons/logo-white.png" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icons/logo-white.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ela-admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ela-admin/assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <?php echo anchor('dashboard', '<i class="menu-icon fa fa-laptop"></i>Dashboard'); ?>
                    </li>
                    <!-- <li class="menu-title">UI elements</li> -->
                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa ti-user"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-tabs.html">Tabs</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="<?php echo base_url(); ?>assets/ela-admin/ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>assets/ela-admin/tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>assets/ela-admin/tables-data.html">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>assets/ela-admin/forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url(); ?>assets/ela-admin/forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="menu-title">Icons</li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="<?php echo base_url(); ?>assets/ela-admin/font-fontawesome.html">Font Awesome</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="<?php echo base_url(); ?>assets/ela-admin/font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>assets/ela-admin/widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="<?php echo base_url(); ?>assets/ela-admin/charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="<?php echo base_url(); ?>assets/ela-admin/charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="<?php echo base_url(); ?>assets/ela-admin/charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="<?php echo base_url(); ?>assets/ela-admin/maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="<?php echo base_url(); ?>assets/ela-admin/maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Extras</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="<?php echo base_url(); ?>assets/ela-admin/page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="<?php echo base_url(); ?>assets/ela-admin/page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="<?php echo base_url(); ?>assets/ela-admin/pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <?php echo anchor('dashboard', '<b>Balai Besar Keramik</b>', ['class' => 'navbar-brand']); ?>
                    <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url(); ?>assets/ela-admin/images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> -->

                        <!-- <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div> -->

                        <!-- <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>assets/ela-admin/images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>assets/ela-admin/images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>assets/ela-admin/images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>assets/ela-admin/images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>uploads/avatars/<?php echo $this->session->userdata('avatar'); ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <li><?php echo anchor('auth/logout', '<i class="fa fa- user"></i>Profile', ['class' => 'nav-link']); ?></li>
                            
                            <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> -->
                            
                            <li><?php echo anchor('auth/logout', '<i class="fa fa-power -off"></i>Logout', ['class' => 'nav-link']); ?></li>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row" id="contents">
                    <?php echo $contents; ?>
                </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <!-- <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer> -->
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script type="text/javascript">
      [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
        new SelectFx(el);
      });

      jQuery('.selectpicker').selectpicker;

      $('.search-trigger').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
      });

      $('.search-close').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
      });

      $('.equal-height').matchHeight({
        property: 'max-height'
      });

      // var chartsheight = $('.flotRealtime2').height();
      // $('.traffic-chart').css('height', chartsheight-122);


      // Counter Number
      $('.count').each(function () {
        $(this).prop('Counter',0).animate({
          Counter: $(this).text()
        }, {
          duration: 3000,
          easing: 'swing',
          step: function (now) {
            $(this).text(Math.ceil(now));
          }
        });
      });

      // Menu Trigger
      $('#menuToggle').on('click', function(event) {
        var windowWidth = $(window).width();       
        if (windowWidth<1010) { 
          $('body').removeClass('open'); 
          if (windowWidth<760){ 
            $('#left-panel').slideToggle(); 
          } else {
            $('#left-panel').toggleClass('open-menu');  
          } 
        } else {
          $('body').toggleClass('open');
          $('#left-panel').removeClass('open-menu');  
        } 
      }); 
       
      $(".menu-item-has-children.dropdown").each(function() {
        $(this).on('click', function() {
          var $temp_text = $(this).children('.dropdown-toggle').html();
          $(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>'); 
        });
      });

      // Load Resize 
      $(window).on("load resize", function(event) { 
        var windowWidth = $(window).width();       
        if (windowWidth<1010) {
          $('body').addClass('small-device'); 
        } else {
          $('body').removeClass('small-device');  
        } 
      });
    </script>
</body>
</html>
