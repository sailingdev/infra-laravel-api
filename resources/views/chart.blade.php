<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Dashboard | Remark Admin Template</title>
    <link rel="apple-touch-icon" href="remark/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="remark/assets/images/favicon.ico">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="remark/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="remark/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="remark/assets/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="remark/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="remark/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="remark/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="remark/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="remark/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="remark/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="remark/global/vendor/waves/waves.css">
    <link rel="stylesheet" href="remark/global/vendor/chartist-js/chartist.css">
    <link rel="stylesheet" href="remark/global/vendor/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="remark/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="remark/assets/examples/css/dashboard/v1.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="remark/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="remark/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="remark/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="remark/global/vendor/media-match/media.match.min.js"></script>
    <script src="remark/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="remark/global/vendor/modernizr/modernizr.js"></script>
    <script src="remark/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="dashboard">
<!--[if lt IE 8]>
<![endif]-->


@include('common.topbar')
@include('common.menubar')

<!-- Page -->
<div class="page animsition">
    <div class="page-content padding-30 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">



            <div class="col-lg-4 col-sm-4">
                <!-- Widget Linearea One-->
                <div class="widget widget-shadow" id="widgetLineareaOne">
                    <div class="widget-content">
                        <div class="padding-20 padding-top-10">
                            <div class="clearfix">
                                <div class="grey-800 pull-left padding-vertical-10">
                                    <i class="icon md-account grey-600 font-size-24 vertical-align-bottom margin-right-5"></i>
                                    User
                                </div>
                                <span class="pull-right grey-700 font-size-30">{{$uCnt}}</span>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Widget Linearea One -->
            </div>
            <div class="col-lg-4 col-sm-4">
                <!-- Widget Linearea Two -->
                <div class="widget widget-shadow" id="widgetLineareaTwo">
                    <div class="widget-content">
                        <div class="padding-20 padding-top-10">
                            <div class="clearfix">
                                <div class="grey-800 pull-left padding-vertical-10">
                                    <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom margin-right-5"></i>
                                    Project
                                </div>
                                <span class="pull-right grey-700 font-size-30">{{$pCnt}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Widget Linearea Two -->
            </div>
            <div class="col-lg-4 col-sm-4">
                <!-- Widget Linearea Three -->
                <div class="widget widget-shadow" id="widgetLineareaThree">
                    <div class="widget-content">
                        <div class="padding-20 padding-top-10">
                            <div class="clearfix">
                                <div class="grey-800 pull-left padding-vertical-10">
                                    <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom margin-right-5"></i>
                                    File
                                </div>
                                <span class="pull-right grey-700 font-size-30">{{$fCnt}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Widget Linearea Three -->
            </div>
            <div class="clearfix"></div>






            <div class="col-xlg-7 col-md-7">
                <!-- Widget Jvmap -->
                <div class="widget widget-shadow">
                    <div class="widget-content">
                        <div id="widgetJvmap" class="height-450"></div>
                    </div>
                </div>
                <!-- End Widget Jvmap -->
            </div>
            <div class="col-xlg-5 col-md-5">
                <!-- Widget Current Chart -->
                <div class="widget widget-shadow" id="widgetCurrentChart">
                    <div class="padding-30 white bg-green-500">
                        <div class="font-size-20 margin-bottom-20">The current chart</div>
                        <div class="ct-chart height-200">
                        </div>
                    </div>
                    <div class="bg-white padding-30 font-size-14">
                        <div class="counter counter-lg text-left">
                            <div class="counter-label margin-bottom-5">Approve rate are above average</div>
                            <div class="counter-number-group">
                                <span class="counter-number">12,673</span>
                                <span class="counter-number-related text-uppercase font-size-14">pcs</span>
                            </div>
                        </div>
                        <button type="button" class="btn-raised btn btn-info btn-floating">
                            <i class="icon md-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <!-- End Widget Current Chart -->
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Widget User list -->
                <div class="widget" id="widgetUserList">
                    <div class="widget-header cover overlay">
                        <img class="cover-image height-200" src="remark/assets//examples/images/dashboard-header.jpg"
                             alt="..." />
                        <div class="overlay-panel vertical-align overlay-background">
                            <div class="vertical-align-middle">
                                <a class="avatar avatar-100 pull-left margin-right-20" href="javascript:void(0)">
                                    <img src="remark/global/portraits/5.jpg" alt="">
                                </a>
                                <div class="pull-left">
                                    <div class="font-size-20">Robin Ahrens</div>
                                    <p class="margin-bottom-20 text-nowrap">
                                        <span class="text-break">machidesign@gmail</span>
                                    </p>
                                    <div class="text-nowrap font-size-18">
                                        <a href="" class="white margin-right-10">
                                            <i class="icon bd-twitter"></i>
                                        </a>
                                        <a href="" class="white margin-right-10">
                                            <i class="icon bd-facebook"></i>
                                        </a>
                                        <a href="" class="white">
                                            <i class="icon bd-dribbble"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content padding-horizontal-20">
                        <ul class="list-group list-group-full list-group-dividered">
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="avatar avatar-lg" href="javascript:void(0)">
                                            <img class="img-responsive" src="remark/global/portraits/1.jpg" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Herman Beck</h4>
                                        <small>San Francisco</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="avatar avatar-lg" href="javascript:void(0)">
                                            <img class="img-responsive" src="remark/global/portraits/2.jpg" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Mary Adams</h4>
                                        <small>Salt Lake City, Utah</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="avatar avatar-lg" href="javascript:void(0)">
                                            <img class="img-responsive" src="remark/global/portraits/3.jpg" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Caleb Richards</h4>
                                        <small>Basking Ridge, NJ</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="btn-raised btn btn-danger btn-floating">
                            <i class="icon md-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <!-- End Widget User list -->
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Widget Chat -->
                <div class="widget widget-shadow" id="chat">
                    <div class="widget-content padding-vertical-20">
                        <div class="widget-chat-header">
                            <a class="pull-left" href="javascript:void(0)">
                                <i class="icon md-chevron-left" aria-hidden="true"></i>
                            </a>
                            <div class="text-right">
                                Conversation with
                                <span class="hidden-xs">June Lane</span>
                                <a class="avatar margin-left-15" data-toggle="tooltip" href="#" data-placement="right"
                                   title="June Lane">
                                    <img src="remark/global/portraits/4.jpg" alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="chats">
                            <div class="chat">
                                <div class="chat-body">
                                    <div class="chat-content" data-toggle="tooltip" title="11:37:08 am">
                                        <p>Good morning, sir.</p>
                                        <p>What can I do for you?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat">
                                <div class="chat-body chat-right">
                                    <div class="chat-content" data-toggle="tooltip" title="11:39:57 am">
                                        <p>Well, I am just looking around.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat">
                                <div class="chat-body">
                                    <div class="chat-content" data-toggle="tooltip" title="11:40:10 am">
                                        <p>If necessary, please ask me.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-chat-footer">
                            <form>
                                <div class="input-group form-material">
                    <span class="input-group-btn">
                      <a href="javascript: void(0)" class="btn btn-pure btn-default icon md-camera"></a>
                    </span>
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
                      <buttn type="button" class="btn btn-pure btn-default icon md-mail-send">
                        </button>
                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Widget Chat -->
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Widget Info -->
                <div class="widget widget-shadow">
                    <div class="widget-header cover overlay">
                        <div class="cover-background height-200" style="background-image: url('remark/global/photos/placeholder.png')"></div>
                    </div>
                    <div class="widget-body padding-horizontal-30 padding-vertical-20" style="height:calc(100% - 250px);">
                        <div class="margin-bottom-10" style="margin-top: -70px;">
                            <a class="avatar avatar-100 bg-white img-bordered" href="javascript:void(0)">
                                <img src="remark/global/portraits/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="margin-bottom-20">
                            <div class="font-size-20">Caleb Richards</div>
                            <div class="font-size-14 grey-500">
                                <span>2 hours ago</span> |
                                <span>Comments 20</span>
                            </div>
                        </div>
                        <p>
                            Lorem ipsum dolLorem ip sum dolor sit amet, consectetur adipiscing elit. Integer
                            nec odio. Praesent libero.or sit amet, consectetur adipiscing elit.
                            Integer nec odio. Praesent libero.
                        </p>
                    </div>
                </div>
                <!-- End Widget Info -->
            </div>
            <div class="col-xlg-5 col-md-6">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title">Projects</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Projects</td>
                                <td>Completed</td>
                                <td>Date</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>The sun climbing plan</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="red">7/10</span>
                                </td>
                                <td>Jan 1, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Lunar probe project</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="blue">3/10</span>
                                </td>
                                <td>Feb 12, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Dream successful plan</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="green">9/10</span>
                                </td>
                                <td>Apr 9, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Office automatization</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="orange">5/10</span>
                                </td>
                                <td>May 15, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Open strategy</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="brown">2/10</span>
                                </td>
                                <td>Jun 2, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default" data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Panel Projects -->
            </div>
            <div class="col-xlg-7 col-md-6">
                <!-- Panel Projects Status -->
                <div class="panel" id="projects-status">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Projects Status
                            <span class="badge badge-info">5</span>
                        </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Project</td>
                                <td>Status</td>
                                <td class="text-left">Progress</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>619</td>
                                <td>The sun climbing plan</td>
                                <td>
                                    <span class="label label-primary">Developing</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">5,3,2,-1,-3,-2,2,3,5,2</span>
                                </td>
                            </tr>
                            <tr>
                                <td>620</td>
                                <td>Lunar probe project</td>
                                <td>
                                    <span class="label label-warning">Design</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">1,-1,0,2,3,1,-1,1,4,2</span>
                                </td>
                            </tr>
                            <tr>
                                <td>621</td>
                                <td>Dream successful plan</td>
                                <td>
                                    <span class="label label-info">Testing</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">2,3,-1,-3,-1,0,2,4,5,3</span>
                                </td>
                            </tr>
                            <tr>
                                <td>622</td>
                                <td>Office automatization</td>
                                <td>
                                    <span class="label label-danger">Canceled</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">1,-2,0,2,4,5,3,2,4,2</span>
                                </td>
                            </tr>
                            <tr>
                                <td>623</td>
                                <td>Open strategy</td>
                                <td>
                                    <span class="label label-default">Reply waiting</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">4,2,-1,-3,-2,1,3,5,2,4</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Panel Projects Stats -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2015 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
    <div class="site-footer-right">
        Crafted with <i class="red-600 icon md-favorite"></i> by <a href="http://themeforest.net/user/amazingSurge">amazingSurge</a>
    </div>
</footer>
<!-- Core  -->
<script src="remark/global/vendor/jquery/jquery.js"></script>
<script src="remark/global/vendor/bootstrap/bootstrap.js"></script>
<script src="remark/global/vendor/animsition/animsition.js"></script>
<script src="remark/global/vendor/asscroll/jquery-asScroll.js"></script>
<script src="remark/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="remark/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="remark/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="remark/global/vendor/waves/waves.js"></script>
<!-- Plugins -->
<script src="remark/global/vendor/switchery/switchery.min.js"></script>
<script src="remark/global/vendor/intro-js/intro.js"></script>
<script src="remark/global/vendor/screenfull/screenfull.js"></script>
<script src="remark/global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="remark/global/vendor/chartist-js/chartist.min.js"></script>
<script src="remark/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
<script src="remark/global/vendor/jvectormap/jquery-jvectormap.min.js"></script>
<script src="remark/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="remark/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
<script src="remark/global/vendor/peity/jquery.peity.min.js"></script>
<!-- Scripts -->
<script src="remark/global/js/core.js"></script>
<script src="remark/assets/js/site.js"></script>
<script src="remark/assets/js/sections/menu.js"></script>
<script src="remark/assets/js/sections/menubar.js"></script>
<script src="remark/assets/js/sections/sidebar.js"></script>
<script src="remark/global/js/configs/config-colors.js"></script>
<script src="remark/assets/js/configs/config-tour.js"></script>
<script src="remark/global/js/components/asscrollable.js"></script>
<script src="remark/global/js/components/animsition.js"></script>
<script src="remark/global/js/components/slidepanel.js"></script>
<script src="remark/global/js/components/switchery.js"></script>
<script src="remark/global/js/components/tabs.js"></script>
<script src="remark/global/js/components/matchheight.js"></script>
<script src="remark/global/js/components/jvectormap.js"></script>
<script src="remark/global/js/components/peity.js"></script>
<script src="remark/assets/examples/js/dashboard/v1.js"></script>
</body>
</html>