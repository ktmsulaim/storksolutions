<!-- Main Header-->
<header
class="main-header @if($secondary) header-style-five five-alternate @endif">

@if ($secondary)
    @include('frontend.partials.header_top')
@endif

<!--Header-Upper-->
<div class="header-upper">
    <div class="auto-container">
        <div class="clearfix">

            <div class="pull-left logo-box">
                <div class="logo">
                    <a href="{{url('/')}}">
                        @if(file_exists('assets/uploads/'.get_static_option('site_logo')))
                            <img src="{{asset('assets/uploads/'.get_static_option('site_logo'))}}" alt="site logo">
                        @endif
                    </a>
                </div>
            </div>

            <div
                class="nav-outer clearfix">

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                       @include('frontend.partials.navigation')
                    </div>

                </nav>

            </div>

        </div>
    </div>
</div>
<!--End Header Upper-->

<!--Sticky Header-->
<div class="sticky-header">
    <div
        class="auto-container clearfix">
        <!--Logo-->
        <div class="logo pull-left">
            <a href="{{url('/')}}">
                <img src="{{asset('assets/frontend/finano/images/logo_small_inverse.png') }}" alt="site logo">
            </a>
        </div>

        <!--Right Col-->
        <div
            class="right-col pull-right">
            <!-- Main Menu -->
            <nav class="main-menu navbar-expand-md">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                    @include('frontend.partials.navigation')
                </div>
            </nav>
            <!-- Main Menu End-->
        </div>

    </div>
</div>
<!--End Sticky Header-->

</header>
<!--End Main Header -->