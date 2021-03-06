<!DOCTYPE HTML>
<html>
	<head>
		<title>Burnmsg - A self-destructing, encrypted message</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="A self-destructing, encrypted message" />
        <meta name="keywords" content="" />

        <meta property="og:description" content="A self-destructing, encrypted message">
        <meta property="og:title" content="Burnmsg - A self-destructing, encrypted message">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('vendor/burnmsg/images/screenshot.png') }}">
        <meta property="og:site_name" content="Burnmsg.com">

		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('vendor/burnmsg/css/style.css') }}" />
		<style>
			html{background-color:#333;}
			#message{color:#333;}
		</style>
        <script>
            @if (Request::segment(1))
                var prefix = 'http://localhost:8000/vendor/burnmsg/css/style';
            @else
                var perfix = 'http://localhost:8000/vendor/burnmsg/css/style';
            @endif
        </script>
		<script src="http://localhost/assets/js/jquery/jquery.min.js"></script>
        <script src="{{ asset('vendor/burnmsg/js/app.js') }}"></script>
		<script src="{{ asset('vendor/burnmsg/js/skel.min.js') }}"></script>
		<script src="{{ asset('vendor/burnmsg/js/init.js') }}"></script>
        <noscript>
            <link rel="stylesheet" href="{{ asset('vendor/burnmsg/css/style-noscript.css') }}" />
        </noscript>
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
    <body class="homepage">
		<!-- Wrapper-->
			<div id="wrapper">
                <header>
                    <h2><a href="{{ URL::to('/burnmsg') }}" class="logo"><i class="fa fa-fire"></i> Burnmsg</a></h2>
                </header>

				<!-- Nav -->
                    <nav id="nav">
                        <a href="{{ URL::to('/burnmsg') }}" class="fa fa-home"><span>Home</span></a>
                        <a href="#message" class="fa fa-envelope active"><span>Message</span></a>
						<a href="#github" class="fa fa-github"><span>Github</span></a>
						<a href="#twitter" class="fa fa-twitter"><span>Twitter</span></a>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Message -->
                            <article id="message" class="panel">
                                @yield('content')
							</article>

						<!-- Github -->
                            <article id="github" class="panel">
                                <header>
									<h1>Fork Me on Github</h1>
                                    <a href="https://www.github.com/anandpilania/laravel-burnmsg.git" class="byline" target="_blank">
                                        http://www.github.com/anandpilania/laravel-burnmsg.git
                                    </a>
                                </header>
                            </article>

						<!-- Twitter -->
                            <article id="twitter" class="panel">
                                <header>
									<h1>Follow Me on Twitter</h1>
                                    <a href="https://www.twitter.com/anandpilania" class="byline" target="_blank">
                                        http://www.twitter.com/anandpilania
                                </a>
                                </header>
                            </article>
					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="links">
							<li>&copy; Burnmsg</li>
							<li>Code : <a href="https://anandpilania.github.io/" target="_blank">Anand Pilania</a></li>
						</ul>
					</div>

			</div>

	</body>
</html>