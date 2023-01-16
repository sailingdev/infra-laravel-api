<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    @include('common.header')
    <link rel="stylesheet" href="{{asset('remark/assets/examples/css/pages/login-v3.css')}}">
    <link rel="stylesheet" href="{{asset('remark/custom/css/custom.css')}}">
</head>
<body class="page-login-v3 layout-full">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
        <div class="panel">
            <div class="panel-body">
                <div class="brand" align="center">
                    <img class="brand-img img-responsive"  src="{{url('remark/custom/images/logo_signin.png')}}" style="height: 50px" alt="...">
                    {{--<h2 class="brand-text font-size-18">App Title</h2>--}}
                </div>
                <form  autocomplete="off" method="POST" action="{{ route('login') }}">
                    {{csrf_field()}}
                    <div class="alert alert-danger alert-dismissible" role="alert" id="alert_bar">
                    </div>

                    <div class="form-group form-material floating {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value=" " />
                        <label class="floating-label">Email</label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group form-material floating{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" name="password" value=" " />
                        <label class="floating-label">Password</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group clearfix margin-bottom-40">
                        <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-left">
                            <input type="checkbox" id="remember" name="remember"{{ old('remember') ? 'checked' : '' }}>
                            <label for="remember_me">Remember me</label>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40 btn-submit">Sign in</button>
                </form>

            </div>
        </div>

    </div>
</div>
<!-- End Page -->

@include('common.scripts')

<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>

</body>
</html>
