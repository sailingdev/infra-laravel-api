<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="has_sub">
                    <a href="<?php echo root_url;?>/dashboard" class="waves-effect"><i class="ti-home"></i>
                        <span> Dashboard </span></a>
                </li>

                @if(Auth::user()->user_type==3)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-receipt"></i>
                            <span> Users </span>
                            <span class="menu-arrow"></span> </a>
                        <ul class="list-unstyled">
                            {{--<li><a href="/user/create">Teachers</a></li>--}}
                            <li><a href="<?php echo root_url;?>/user/teacher/show">Teachers</a></li>
                            <li><a href="<?php echo root_url;?>/user/student/show">Students</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i>
                            <span> Subject </span>
                            <span class="menu-arrow"></span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo root_url;?>/subject/show">List Subject</a></li>
                            <li><a href="<?php echo root_url;?>/question/tag/show">List Tags</a></li>
                        </ul>
                    </li>
                @endif

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-help-alt"></i>
                        <span> Question </span>
                        <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo root_url;?>/question/show">List Question</a></li>
                    </ul>
                </li>

                {{--              <li class="has_sub">
                                  <a href="javascript:void(0);" class="waves-effect"><i class="ti-bolt"></i> <span> Answer </span>
                                      <span class="menu-arrow"></span> </a>
                                  <ul class="list-unstyled">
                                      <li><a href="/answer/show">List Answer</a></li>
                                  </ul>
                              </li>--}}

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-clipboard"></i> <span> Post </span>
                        <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo root_url;?>/post/show">List Post</a></li>
                    </ul>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-clipboard"></i> <span> Responses </span>
                        <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo root_url;?>/answer/show">Answers</a></li>
                        <li><a href="<?php echo root_url;?>/comment/show">Comments</a></li>
                    </ul>


                </li>






                @if(Auth::user()->user_type==3)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-bell"></i>
                            <span> Notification </span>
                            <span class="menu-arrow"></span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo root_url;?>/notification/show">List Notification</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-info-alt"></i> <span> Terms & Condition </span>
                            <span class="menu-arrow"></span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo root_url;?>/terms-and-condition/show">List Terms & Condition</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> Frequently Q&A </span>
                            <span class="menu-arrow"></span> </a>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo root_url;?>/frequently-question-answer/show">List Frequently Q&A</a></li>
                        </ul>
                    </li>
                @endif
                {{--
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-themify-favicon-alt"></i> <span> Feedback </span>
                                        <span class="menu-arrow"></span> </a>
                                    <ul class="list-unstyled">
                                        <li><a href="/feedback/show">List Feedback</a></li>
                                    </ul>
                                </li>--}}

                <li class="has_sub">
                    <a href="<?php echo root_url;?>/logout" class="waves-effect"><i class="ti-receipt"></i>
                        <span> Logout </span></a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->