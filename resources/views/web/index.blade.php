@extends('web.layouts.web-layout')

@section('content')                  
    
    <!-- Main -->
    <div id="main">
    
        <!-- Hero Section -->
        <div id="hero">
            <div id="hero-styles" style="overflow: hidden;">
                <video autoplay muted loop id="hero-video" style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1; transform: translateX(-50%) translateY(-50%);">
                    <source src="{{ custom_asset('web/images/bg3.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div id="hero-caption" class="content-full-width parallax-scroll-caption text-align-center hero-full-caption">
                    <div class="inner">
                    
                        <h1 class="hero-title caption-timeline" data-infoTextBefore="Welcome" data-infoTextAfter="Est. 2025" style="color: white;">
                            <div><span style="color: white;">Novus</span></div>
                        </h1>
                        
                        <div class="hero-subtitle caption-timeline onload-shuffle">
                            <div><span style="color: white;">Bringing brands to life through</span></div> 
                            <div class="secondary-font"><span style="color: white;">creative web solutions</span></div>
                        </div>                                   
                    </div>
                </div>
                <div id="hero-footer" class="has-border">
                    <div class="hero-footer-left">
                        <div class="button-wrap left scroll-down">
                            <div class="icon-wrap parallax-wrap">
                                <div class="button-icon parallax-element">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>
                            </div>
                            <div class="button-text sticky left"><span data-hover="Scroll to Explore" style="color: white;">Scroll to Explore</span></div> 
                        </div>
                    </div>
                    <div class="hero-footer-right">
                        <div id="info-text"><span style="color: white;">Featured Projects</span></div>
                    </div>
                </div>                                                              
            </div>
            <div id="hero-interaction">
                <div class="hero-column col-left">
                    <div class="col-img-wrapper small-img"><img src="{{ custom_asset('web/images/01hero1.jpg')}}" alt=""></div>
                    <div class="col-img-wrapper large-img"><img src="{{ custom_asset('web/images/01hero.jpg')}}" alt=""></div>
                </div>
                <div class="hero-column col-right">
                    <div class="col-img-wrapper large-img"><img src="{{ custom_asset('web/images/02hero.jpg')}}" alt=""></div>
                    <div class="col-img-wrapper small-img"><img src="{{ custom_asset('web/images/02hero1.jpg')}}" alt=""></div>
                </div>
            </div>
        </div>                     
        <!--/Hero Section -->
        
        
        <!-- Main Content -->
        <div id="main-content">
            <!-- Main Page Content -->
            <div id="main-page-content">
                <!-- Fit Thumb Screen Effects -->                                                          
                <div id="itemsWrapperLinks">                               
                    <div id="itemsWrapper" class="webgl-fitthumbs fx-one">
                        
                        
                        <!-- Row -->
                        <div class="content-row full row_padding_top row_padding_left row_padding_right light-section fadeout-element" data-bgcolor="transparent">
                    
                            <div class="landing-intro-wrapper">
                            
                                <h2 class="new-hero-title">
                                    <span>We’re</span> 
                                    <div class="hero-title-placeholder"></div> 
                                    <span>a <span class="text-rotator-wrapper secondary-font">  
                                            <span class="text-rotator">
                                                <span>creative</span>
                                                <span>visionary</span>
                                                <span>digital</span>
                                            </span>
                                        </span>
                                    </span>
                                    <span>agency</span>
                                </h2>
                            
                            </div>
                            
                        </div> 
                        <!--/Row -->
                        
                        
                        <!-- Row -->
                        <div class="content-row full light-section row_padding_left row_padding_right row_padding_bottom fadeout-element" data-bgcolor="transparent"> 
                            
                            <hr>
                            
                            <div class="three_fourth"></div>
                            
                            <div class="one_fourth last vertical-parallax" data-startparallax="0" data-endparallax="0">
                                
                                <div class="landing-video content-timeline">
                                    <div class="content-video-wrapper">
                                        <video loop muted playsinline class="bgvid">
                                            <source src="{{ custom_asset('web/images/nov-intro.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                
                                <hr><hr>
                                
                                <p class="has-opacity" style="width: 115%">At Novus Forensics, we specialize in uncovering digital evidence, protecting data integrity, and providing expert forensic analysis. Our team of skilled investigators utilizes cutting-edge technology to recover, analyze, and secure digital information for legal, corporate, and cybersecurity purposes.</p>
                                                                        
                                <div class="button-wrap right button-link has-animation">
                                    <div class="icon-wrap parallax-wrap">
                                        <div class="button-icon parallax-element">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                    </div>
                                    <a class="link" data-type="page-transition" href="{{ route('web.about-us') }}"><div class="button-text sticky right"><span data-hover="Read More">Read More</span></div></a>
                                </div>
                            
                            </div>                                         
                            
                        </div> 
                        <!--/Row -->
                        
                        
                        <!-- Row -->
                        <div class="content-row full text-align-center dark-section disable-header-gradient" data-bgcolor="#c8c8c8">                                
                            
                            <div class="snap-slider-holder">
                                
                                    <div class="snap-slider-images">
                                        <div class="snap-slider-images-wrapper">
                                    
                                            <div class="snap-slide trigger-item change-header-color">
                                                <div class="img-mask">
                                                    <div class="section-image trigger-item-link">
                                                        <img src="{{ custom_asset('web/products1/84.jpg') }}" class="item-image grid__item-img" alt="">
                                                    </div>                                                
                                                    <img src="{{ custom_asset('web/products1/84.jpg') }}" class="grid__item-img grid__item-img--large" alt="">                              
                                                </div>
                                            </div>
                                            
                                            <div class="snap-slide trigger-item change-header-color">
                                                <div class="img-mask">
                                                    <div class="section-image trigger-item-link">
                                                        <img src="{{ custom_asset('web/products1/53.png') }}" class="item-image grid__item-img" alt="">
                                                    </div>                                                
                                                    <img src="{{ custom_asset('web/products1/53.png') }}" class="grid__item-img grid__item-img--large" alt="">                            
                                                </div>
                                            </div>
                                            
                                            <div class="snap-slide trigger-item change-header-color">
                                                <div class="img-mask">
                                                    <div class="section-image trigger-item-link">
                                                        <img src="{{ custom_asset('web/products1/62.png') }}" class="item-image grid__item-img" alt="">
                                                    </div>                                                
                                                    <img src="{{ custom_asset('web/products1/62.png') }}" class="grid__item-img grid__item-img--large" alt="">                            
                                                </div>
                                            </div>
                                            
                                            <div class="snap-slide trigger-item change-header-color">
                                                <div class="img-mask">
                                                    <div class="section-image trigger-item-link">
                                                        <img src="{{ custom_asset('web/products1/54.png') }}" class="item-image grid__item-img" alt="">
                                                    </div>                                                
                                                    <img src="{{ custom_asset('web/products1/54.png') }}" class="grid__item-img grid__item-img--large" alt="">                           
                                                </div>
                                            </div>

                                            <div class="snap-slide trigger-item change-header-color">
                                                <div class="img-mask">
                                                    <div class="section-image trigger-item-link">
                                                        <img src="{{ custom_asset('web/products1/64.png') }}" class="item-image grid__item-img" alt="">
                                                    </div>                                                
                                                    <img src="{{ custom_asset('web/products1/64.png') }}" class="grid__item-img grid__item-img--large" alt="">                            
                                                </div>
                                            </div>
                                            
                                            <div class="snap-slide trigger-item change-header-color">
                                                <div class="img-mask">
                                                    <div class="section-image trigger-item-link">
                                                        <img src="{{ custom_asset('web/images/04hero.jpg') }}" class="item-image grid__item-img" alt="">
                                                        <div class="hero-video-wrapper">
                                                            <video loop muted class="bgvid">
                                                                <source src="{{ custom_asset('web/images/04hero.mp4') }}" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    </div>                                                
                                                    <img src="{{ custom_asset('web/images/04hero.jpg') }}" class="grid__item-img grid__item-img--large" alt="">                            
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="snap-slider-thumbs">                                                
                                        <div class="snap-slider-thumbs-wrapper">
                                    
                                            <div class="thumb-slide" data-centerLine="OPEN">
                                                <div class="thumb-slide-img">
                                                    <img src="{{ custom_asset('web/products1/84.jpg') }}" class="item-image grid__item-img" alt="">
                                                </div>
                                                <a class="slide-link" data-type="page-transition" href="{{ route('web.product_desc',1) }}"></a>
                                            </div>
                                            
                                            <div class="thumb-slide" data-centerLine="OPEN">
                                                <div class="thumb-slide-img">
                                                    <img src="{{ custom_asset('web/products1/53.png') }}" class="item-image grid__item-img" alt="">
                                                </div>
                                                <a class="slide-link" data-type="page-transition" href="project02.html"></a>
                                            </div>
                                            
                                            <div class="thumb-slide" data-centerLine="OPEN">
                                                <div class="thumb-slide-img">
                                                    <img src="{{ custom_asset('web/products1/62.png') }}" class="item-image grid__item-img" alt="">
                                                </div>
                                                <a class="slide-link" data-type="page-transition" href="project02.html"></a>
                                            </div>
                                            
                                            <div class="thumb-slide" data-centerLine="OPEN">
                                                <div class="thumb-slide-img">
                                                    <img src="{{ custom_asset('web/products1/54.png') }}" class="item-image grid__item-img" alt="">
                                                </div>
                                                <a class="slide-link" data-type="page-transition" href="project03.html"></a>
                                            </div>

                                            <div class="thumb-slide" data-centerLine="OPEN">
                                                <div class="thumb-slide-img">
                                                    <img src="{{ custom_asset('web/products1/64.png') }}" class="item-image grid__item-img" alt="">
                                                </div>
                                                <a class="slide-link" data-type="page-transition" href="project03.html"></a>
                                            </div>
                                            
                                            <div class="thumb-slide" data-centerLine="OPEN">
                                                <div class="thumb-slide-img">
                                                    <img src="{{ custom_asset('web/images/04hero.jpg') }}" class="item-image grid__item-img" alt="">
                                                </div>
                                                <a class="slide-link" data-type="page-transition" href="project04.html"></a>
                                            </div>
                                        
                                        </div>                                                    
                                    </div>
                                    
                                    <div class="snap-slider-captions">                                                            
                                        <div class="snap-slider-captions-wrapper content-full-width">
                                    
                                            <div class="snap-slide-caption">
                                                <div class="slide-title"><span>MINI VAN PALADIN</span></div>                                                      
                                                <div class="slide-current"><span>01</span></div>
                                                <div class="slide-counter"><span>04</span></div>
                                                <div class="slide-subtitle"><span>The Mini Van Paladin: The newest and smallest addition to our range of self-sufficient mobile laboratories</span></div>
                                            </div>
                                            
                                            <div class="snap-slide-caption">
                                                <div class="slide-title"><span>Stena Air</span></div>                                                      
                                                <div class="slide-current"><span>02</span></div>
                                                <div class="slide-counter"><span>04</span></div>
                                                <div class="slide-subtitle"><span>Graphic Design</span></div>
                                            </div>
                                            
                                            <div class="snap-slide-caption change-header1" data-centerLine="OPEN">
                                                <div class="slide-title"><span>Lounge Chair</span></div>                                                      
                                                <div class="slide-current"><span>03</span></div>
                                                <div class="slide-counter"><span>04</span></div>
                                                <div class="slide-subtitle"><span>Photography</span></div>
                                            </div>
                                            
                                            <div class="snap-slide-caption">
                                                <div class="slide-title"><span>Invincibles</span></div>                                                      
                                                <div class="slide-current"><span>04</span></div>
                                                <div class="slide-counter"><span>04</span></div>
                                                <div class="slide-subtitle"><span>Video</span></div>
                                            </div>
                                        
                                        </div>                                                    
                                    </div>
                                    
                            </div>                                                                                    
                            
                        </div> 
                        <!--/Row -->
                        
                        
                        <!-- Row -->
                        <div class="content-row small text-align-center light-section" data-bgcolor="#c8c8c8">
                            
                            <hr><hr><hr>
                                    
                            <p class="has-shuffle no-margins">Continue exploring our work collection</p>
                            
                            <br>
                            
                            <div class="button-box">             
                                <div class="clapat-button-wrap parallax-wrap hide-ball">
                                    <div class="clapat-button parallax-element">
                                        <div class="button-border outline rounded parallax-element-second">
                                            <a class="ajax-link" data-type="page-transition" href="index-portfolio.html">
                                                <span data-hover="All Projects">All Projects</span>
                                                </a>
                                            </div>
                                    </div>
                                </div> 
                            </div>
                                
                            
                        </div> 
                        <!--/Row -->
            
                        <!-- Row -->
                        <div class="content-row row_padding_top text-align-center light-section" data-bgcolor="#c8c8c8"> 
                            
                            <div class="pinned-lists-wrapper font-mode" data-duration="1x">
                                <p>You need it? We do it</p>                               
                                <ul class="pinned-lists2">
                                    <li>DIGITA FORENSICS</li>
                                    <li data-infoTextAfter="Inspire">CYBER SECURITY</li>
                                    <li>ARSON INVESTIGATION</li>
                                    <li data-infoTextAfter="Create">VEHICLE FORENSICS AND THEFT INVESTIGATION</li>
                                    <li>DOCUMENT AND FINGERPRINTING INVESTIGATION</li>
                                </ul>
                            </div>
                            
                        </div> 
                        <!--/Row -->
                        
                        
                        <!-- Row -->
                        <div class="content-row row_padding_top light-section text-align-center" data-bgcolor="#c8c8c8">                                   	
                                    
                                    
                            <div class="one_third has-animation" data-delay="100">
                                
                                <div class="box-icon-wrapper block-boxes">
                                    <div class="box-icon">
                                        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                    </div>
                                    <div class="box-icon-content">
                                        <h6 class="no-margins">Kaurain wala Chowk, near Maini Hospital, Old City, Kot Kapura, Punjab 151204</h6>
                                        <p>Address</p>
                                    </div>
                                </div> 
                                                        
                            </div>
                            
                            <div class="one_third has-animation"  data-delay="200">
                                
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3434.923854467575!2d74.8268458!3d30.5796949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3917337badc1bfe1%3A0xac749c7e20d9762a!2sNovus%20Forensics!5e0!3m2!1sen!2sin!4v1742037467653!5m2!1sen!2sin" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                        
                            </div>
                            
                            <div class=" one_third last has-animation"  data-delay="300">
                                
                                <div class="box-icon-wrapper block-boxes">
                                    <div class="box-icon">
                                        <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                                    </div>
                                    <div class="box-icon-content">
                                        <h6 class="no-margins">9779421635</h6>
                                        <p>Phone</p>
                                    </div>
                                </div>
                                
                            </div> 
                                                    
                        </div> 
                        <!--/Row -->
                        
                        
                        <!-- Row -->
                        <div class="content-row full row_padding_top light-section text-align-center" data-bgcolor="#c8c8c8">
                            
                            <p class="bigger has-shuffle no-margins secondary-font">Ready to work together?</p>
                            <div id="copy-email" data-hover-message="Copy Mail" data-clicked-message="Copied"><span>info@novusforensics.org</span></div>
                            
                        </div> 
                        <!--/Row -->
                
                
                    </div>                                                           
                </div>    
                <!-- Fit Thumb Screen Effects -->
            </div>
            <!--/Main Page Content -->                        
            
                    
            <!-- Page Navigation --> 
            <div id="page-nav" class="move-nav-onload">
                <div class="page-nav-wrap">
                    <div class="page-nav-caption nav-full-caption content-full-width text-align-center">                                 
                        <div class="inner">
                            <a class="next-ajax-link-page" data-type="page-transition" data-centerline="GO TO" href="about.html">
                                <div class="next-hero-title caption-timeline" data-infoTextBefore="Go Ahead" data-infoTextAfter="Next Page"><span>Products</span></div>
                            </a>                                  
                        </div>               
                    </div>
                </div>
            </div>      
            <!--/Page Navigation -->
            
                    
        </div>
        <!--/Main Content --> 
    
    </div>
    <!--/Main -->
    
    
@endsection