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





            <div class="col-xlg-12 col-md-12">
                <!-- Widget Current Chart -->
                <div class="widget widget-shadow" id="widgetCurrentChart_p">
                    <div class="padding-30 white">
                        <div class="font-size-20 margin-bottom-20">  </div>
                        <div class="ct-chart height-200">
                        </div>
                    </div>
                </div>
                <!-- End Widget Current Chart -->
            </div>








            <div class="col-xlg-12 col-md-12">
                <!-- Widget Current Chart -->
                <div class="widget widget-shadow" id="widgetCurrentChart">
                    <div class="padding-30 white bg-green-500">
                        <div class="font-size-20 margin-bottom-20"> Files per a day (30days ago from now)</div>
                        <div class="ct-chart height-200">
                        </div>
                    </div>
                </div>
                <!-- End Widget Current Chart -->
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

<script>
    $(document).ready(function($) {
        Site.run();

        // Widget Current Chart
        // --------------------
        (function() {
            //chart-bar-withfooter

            var labels = [];
            var series = [[]];

            var labels_p = [];
            var series_p = [[]];


            $.ajax({
                type: "POST",
                url: '{{url('getStatistics')}}',
                data: {
                    _token : '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (data) {
                    var files_per_day = data.files_per_day;
                    $.each(files_per_day, function (date, counts) {
                        labels.push(date);
                        series[0].push(counts);
                    });


                    var projects = data.projects;
                    var file_per_p = data.files_per_project;
                    $.each(projects, function (i, item) {
                        labels_p.push(item.project_name)
                        series_p[0].push(0);
                        $.each(file_per_p, function (project_id, counts) {
                            if (item.project_id == project_id){
                                //labels_p[i] = (item.project_name)
                                series_p[0][i] = (counts);
                            }

                        });
                    });

                },
                error: function () {


                }
            });

            new Chartist.Bar('#widgetCurrentChart .ct-chart', {
                labels: labels,
                series: series
            }, {
                stackBars: true,
                fullWidth: true,
                seriesBarDistance: 0,
                axisX: {
                    showLabel: true,
                    showGrid: true,
                    offset: 30
                },
                axisY: {
                    showLabel: true,
                    showGrid: true,
                    offset: 30,
                    labelOffset: {
                        x: 0,
                        y: 15
                    }
                }
            });





            new Chartist.Bar('#widgetCurrentChart_p .ct-chart', {
                labels: labels_p,
                series: series_p
            }, {
                stackBars: true,
                fullWidth: true,
                seriesBarDistance: 0,
                axisX: {
                    showLabel: true,
                    showGrid: true,
                    offset: 30
                },
                axisY: {
                    showLabel: true,
                    showGrid: true,
                    offset: 30,
                    labelOffset: {
                        x: 0,
                        y: 15
                    }
                }
            });




        })();

        Waves.attach('.page-content .btn-floating', ['waves-light']);
    });

</script>
</body>
</html>