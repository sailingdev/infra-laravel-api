<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category">General</li>
                    <li class="site-menu-item  @if(\Request::is('dashboard')) active @endif">
                        <a class="animsition-link" href="{{url('dashboard')}}">
                            <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>


                    <li class="site-menu-category">Management</li>


                    <li class="site-menu-item   @if(\Request::is('users')) active @endif">
                        <a class="animsition-link" href="{{url('users')}}">
                            <i class="site-menu-icon md-accounts" aria-hidden="true"></i>
                            <span class="site-menu-title">Users</span>
                        </a>
                    </li>




                    <li class="site-menu-item  @if(\Request::is('project')) active @endif">
                        <a class="animsition-link" href="{{url('project')}}">
                            <i class="site-menu-icon md-favorite-outline" aria-hidden="true"></i>
                            <span class="site-menu-title">Project</span>
                        </a>
                    </li>





                    <li class="site-menu-item  @if(\Request::is('option')) active @endif">
                        <a class="animsition-link" href="{{url('option')}}">
                            <i class="site-menu-icon md-help" aria-hidden="true"></i>
                            <span class="site-menu-title">Option</span>
                        </a>
                    </li>


                    <li class="site-menu-item  @if(\Request::is('file_form')) active @endif">
                        <a class="animsition-link" href="{{url('file_form')}}">
                            <i class="site-menu-icon md-comment" aria-hidden="true"></i>
                            <span class="site-menu-title">File Upload</span>
                        </a>
                    </li>


                    <li class="site-menu-item  @if(\Request::is('notification')) active @endif">
                        <a class="animsition-link" href="{{url('notification')}}">
                            <i class="site-menu-icon md-notifications" aria-hidden="true"></i>
                            <span class="site-menu-title"> Notification</span>
                        </a>
                    </li>


                    {{--<li class="site-menu-item has-sub to-open">--}}
                        {{--<a href="#">--}}
                            {{--<i class="site-menu-icon md-quote" aria-hidden="true"></i>--}}
                            {{--<span class="site-menu-title">FAQs</span>--}}
                            {{--<span class="site-menu-arrow"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="site-menu-sub">--}}
                            {{--<li class="site-menu-item                         ">--}}
                                {{--<a class="animsition-link" href="faq/helps">--}}
                                    {{--<span class="site-menu-title">Helps</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="site-menu-item                        ">--}}
                                {{--<a class="animsition-link" href="faq/how_it_works">--}}
                                    {{--<span class="site-menu-title">How it works?</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}


                </ul>
                <div class="site-menubar-section">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-gridmenu hide">
    <div>
        <div>
            <ul>

                <li>
                    <a href="dashboard">
                        <i class="icon md-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="topic">
                        <i class="icon md-favorite-outline"></i>
                        <span>Favourite Topic</span>
                    </a>
                </li>

                <li>
                    <a href="faq/helps">
                        <i class="icon md-quote"></i>
                        <span>Helps</span>
                    </a>
                </li>

                <li>
                    <a href="faq/how_it_works">
                        <i class="icon md-quote"></i>
                        <span>How it works?</span>
                    </a>
                </li>

                <li>
                    <a href="question">
                        <i class="icon md-help"></i>
                        <span>Questions</span>
                    </a>
                </li>

                <li>
                    <a href="answer">
                        <i class="icon md-info"></i>
                        <span>Answers</span>
                    </a>
                </li>

                <li>
                    <a href="commment">
                        <i class="icon md-comments"></i>
                        <span>Comments</span>
                    </a>
                </li>

                <li>
                    <a href="user/lists">
                        <i class="icon md-accounts"></i>
                        <span>Users</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
