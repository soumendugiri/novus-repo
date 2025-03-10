<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <title>novus Website - A Creative Portfolio Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Download the best Creative Portfolio HTML Template in 2025" />
    <meta name="author" content="Sudriva Team">
    <meta property="og:image" content="" />
    <meta charset="UTF-8" />    
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link href="{{ asset('public/web/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/web/css/all.min.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&amp;family=Poppins:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <style>
        /* Container for the effect */
        #hero-styles {
            position: relative;
            overflow: hidden;
        }
        
        /* Video */
        #hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translateX(-50%) translateY(-50%);
        }
        
        /* Floating Element */
        .floating-effect {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        </style>
   
</head>


<body class="hidden hidden-ball smooth-scroll rounded-borders hero-below-caption" data-primary-color="#fa821d">
    <main>		
        <!-- Preloader -->
        <div class="preloader-wrap" data-centerLine="Loading">
        
            <div class="percentage-wrapper">
            	<div class="percentage" id="precent">
                	
                    <span class="number number_2">
                        <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>0</span>
                    </span>
                    <span class="number number_3">
                        <span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>0</span>
                    </span>
            	</div>
                <div class="percentage-first"><span>wait, wait..</span></div>
                <div class="percentage-last"><span>100</span></div>
            </div>
            
        </div>
        <!--/Preloader -->     
        
        <div class="cd-index cd-main-content">
    
        <!-- Page Content -->
        <div id="clapat-page-content" class="dark-content" data-bgcolor="#c8c8c8">
            
            <!-- Header -->
            <header class="clapat-header classic-menu invert-header" data-menucolor="#0c0c0c">
            	
                <!-- Graidient -->
                <div class="header-gradient"></div>
                <!--/Graidient -->
                
                <div id="header-container">
                	
                    <!-- Logo -->
                    <div id="clapat-logo" class="hide-ball">
                        <a class="ajax-link" data-type="page-transition" href="index.html">
                            <img class="black-logo" src="{{ asset('public/web/images/nov-logo.png')}}" alt="ClaPat Logo">
                            <img class="white-logo" src="{{ asset('public/web/images/nov-logo.png')}}" alt="ClaPat Logo">
                        </a>
                    </div>
                    <!--/Logo -->
                                
                    
                    <!-- Navigation -->
                    <nav class="clapat-nav-wrapper"> 
                        <div class="nav-height">          
                            <ul data-breakpoint="1025" class="flexnav">
                                <li class="menu-timeline link"><a class="ajax-link {{ Request::is('/') ? 'active' : '' }}" data-type="page-transition" href="{{ route('web.home') }}"><div class="before-span"><span data-hover="Home">Home</span></div></a></li>
                                <li class="menu-timeline link"><a class="ajax-link {{ Request::is('about-us') ? 'active' : '' }}" data-type="page-transition" href="#"><div class="before-span"><span data-hover="Who we are">Who we are</span></div></a>
                                    <ul>
                                        <li><a class="ajax-link" href="{{ route('web.about-us') }}" data-type="page-transition">ABOUT US</a></li>
                                        <li><a class="ajax-link" href="index-portfolio.html" data-type="page-transition">COLLABORATORS</a></li>
                                        <li><a class="ajax-link" href="index-playground.html" data-type="page-transition">THEY TRUST US</a></li>
                                        <li><a class="ajax-link" href="index-playground.html" data-type="page-transition">OUR TEAM</a></li>
                                    </ul>
                                </li>
                                <li class="menu-timeline link"><a class="ajax-link" data-type="page-transition" href="#"><div class="before-span"><span data-hover="what we do">what we do</span></div></a></li>
                                <li class="menu-timeline link"><a class="ajax-link" data-type="page-transition" href="#"><div class="before-span"><span data-hover="Projects">Products</span></div></a>
                                    <ul>
                                        <li><a class="ajax-link" href="index-highlights.html" data-type="page-transition">Highlights</a></li>
                                        <li><a class="ajax-link" href="index-portfolio.html" data-type="page-transition">Portfolio</a></li>
                                        <li><a class="ajax-link" href="index-playground.html" data-type="page-transition">Playground</a></li>
                                    </ul>
                                </li>
                                <li class="menu-timeline link"><a class="ajax-link" data-type="page-transition" href="#"><div class="before-span"><span data-hover="from our experts">From our experts</span></div></a></li>
                                <li class="menu-timeline link"><a class="ajax-link" data-type="page-transition" href="#"><div class="before-span"><span data-hover="Email login">Email login</span></div></a></li>
                                <li class="menu-timeline link"><a class="ajax-link" data-type="page-transition" href="about.html"><div class="before-span"><span data-hover="Agency">About</span></div></a></li>
                            </ul>
                        </div>          
                    </nav>
                    <!--/Navigation -->
                    
                    
                    <!-- Header Button -->
                    <a class="header-button ajax-link" data-type="page-transition" href="contact.html">
                        <div class="button-icon-link right">                        
                            <div class="icon-wrap-scale">
                                <div class="icon-wrap parallax-wrap">
                                    <div class="button-icon parallax-element">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="button-text sticky right"><span data-hover="Let's Talk">Let's Talk</span></div>                        
                        </div>
                    </a>
                    <!--/Header Button -->
                    
                    
                    <!-- Menu Burger -->
                    <div class="button-wrap right menu burger-lines">
                        <div class="icon-wrap parallax-wrap">
                            <div class="button-icon parallax-element">
                                <div id="burger-wrapper">
                                    <div id="menu-burger">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-text sticky right"><span data-hover="Menu">Menu</span></div> 
                    </div>
                    <!--/Menu Burger -->
            
                </div>
            </header>
            <!--/Header -->
    @yield('content')

    <div class="cd-cover-layer"></div>
    <div id="magic-cursor">
        <div id="ball">
        	<div id="ball-drag-x"></div>
            <div id="ball-drag-y"></div>
        	<div id="ball-loader"></div>
        </div>
    </div>
    <div id="clone-image">
    	<div class="hero-translate"></div>
    </div>
    <div id="rotate-device"></div>
    
    
		
    <script src="{{ asset('public/web/js/jquery.min.js')}}"></script>       
    <script src="{{ asset('public/web/cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js') }}"></script>
	<script src="{{ asset('public/web/cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('public/web/cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/Flip.min.js') }}"></script>    
    <script src='{{ asset('public/web/cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js') }}'></script>
	<script src='{{ asset('public/web/cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/5.0.0/imagesloaded.pkgd.min.js') }}'></script>
	<script src='{{ asset('public/web/cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.4.0/smooth-scrollbar.js') }}'></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpK1sWi3J3EbUOkF_K4-UHzi285HyFX5M&amp;sensor=false"></script>
    
    <script src="{{ asset('public/web/js/clapat.js') }}"></script>
	<script src="{{ asset('public/web/js/plugins.js') }}"></script>
    
    <script src="{{ asset('public/web/js/common.js') }}"></script>
    <script src="{{ asset('public/web/js/contact.js') }}"></script>
    <script src="{{ asset('public/web/js/scripts.js') }}"></script>

    <script>
        // Select floating element
        const floatingEffect = document.getElementById("floating-effect");
        
        // Detect mouse movement
        document.getElementById("hero-styles").addEventListener("mousemove", (event) => {
            const x = event.clientX;
            const y = event.clientY;
        
            // Apply translate3d effect
            floatingEffect.style.transform = `translate3d(${x}px, ${y}px, 0px) scale(1.2)`;
            floatingEffect.style.opacity = "1";
            floatingEffect.style.visibility = "visible";
        });
        
        // Hide effect when mouse leaves
        document.getElementById("hero-styles").addEventListener("mouseleave", () => {
            floatingEffect.style.opacity = "0";
            floatingEffect.style.visibility = "hidden";
        });
        </script>


</body>

</html>