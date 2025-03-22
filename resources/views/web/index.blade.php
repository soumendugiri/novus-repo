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
                        <div class="content-row full text-align-center dark-section disable-header-gradient" data-bgcolor="#c1bbf0">                                
                            
                            <div class="snap-slider-holder">
                                
                                    <div class="snap-slider-images">
                                        <div class="snap-slider-images-wrapper">
                                           
                                            @foreach ($data['products'] as $product)
                                                <div class="snap-slide trigger-item change-header-color">
                                                    <div class="img-mask">
                                                        <div class="section-image trigger-item-link">
                                                            <img src="{{ get_featured_image_thumbnail_url($product->featured_image) }}" class="item-image grid__item-img" alt="">
                                                        </div>                                                
                                                        <img src="{{ get_featured_image_thumbnail_url($product->featured_image) }}" class="grid__item-img grid__item-img--large" alt="">                              
                                                    </div>
                                                </div>
                                            @endforeach
                                        
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="snap-slider-thumbs">                                                
                                        <div class="snap-slider-thumbs-wrapper"> 
                                            @foreach ($data['products'] as $product)
                            
                                                <div class="thumb-slide" data-centerLine="OPEN">
                                                    <div class="thumb-slide-img">
                                                        <img src="{{ get_featured_image_thumbnail_url($product->featured_image) }}" class="item-image grid__item-img" alt="">
                                                    </div>
                                                    <a class="slide-link" data-type="page-transition" href="{{ route('web.product_desc',['pid'=>base64_encode($product->id)]) }}"></a>
                                                </div>
                                                
                                            @endforeach
                                        
                                        </div>                                                    
                                    </div>
                                    
                                    <div class="snap-slider-captions">                                                            
                                        <div class="snap-slider-captions-wrapper content-full-width">
                                           
                                            @foreach ($data['products'] as $key=>$product)
                                                <div class="snap-slide-caption">
                                                    <div class="slide-title"><span>{{ $product->product_name }}</span></div>                                                      
                                                    <div class="slide-current"><span>{{ $key+1 }}</span></div>
                                                    <div class="slide-counter"><span>{{ count($data['products']) }}</span></div>
                                                    <div class="slide-subtitle"><span>{{ $product->company->company_name }}</span></div>
                                                </div>
                                            @endforeach
                                        
                                        </div>                                                    
                                    </div>
                                    
                            </div>                                                                                    
                            
                        </div> 
                        <!--/Row -->
                        
                        
                        {{-- <!-- Row -->
                        <div class="content-row small text-align-center light-section" data-bgcolor="#c1bbf0">
                            
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
                        <!--/Row --> --}}

                        


            
                        <!-- Row -->
                        <div class="content-row row_padding_top text-align-center light-section" data-bgcolor="#c1bbf0"> 
                            
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
                        <div class="content-row full row_padding_top light-section text-align-center" data-bgcolor="#c1bbf0">
                            
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
            {{-- <div id="page-nav" class="move-nav-onload">
                <div class="page-nav-wrap">
                    <div class="page-nav-caption nav-full-caption content-full-width text-align-center">                                 
                        <div class="inner">
                            <a class="next-ajax-link-page" data-type="page-transition" data-centerline="GO TO" href="{{ route('allProductsRoute') }}">
                                <div class="next-hero-title caption-timeline" data-infoTextBefore="Go Ahead" data-infoTextAfter="Next Page"><span>Products</span></div>
                            </a>                                  
                        </div>               
                    </div>
                </div>
            </div>       --}}

            <!--/Page Navigation -->

            <!--/Testimonials -->
            <div class="testimonial_padding_top testimonials text-align-center">
                <div class="max-w-4xl mx-auto text-center">
                  <h3 class="text-2xl font-bold mb-6">What Our Clients Say</h3>
                  <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                      <!-- Testimonial 1 -->
                      <div class="swiper-slide p-6 bg-gray-800 rounded-xl shadow-md flex flex-col items-center">
                        <img src="{{ custom_asset('web/images/team4.jpg') }}" alt="John Doe" class="w-16 h-16 rounded-full mb-4">
                        <p class="italic">"Sudriva delivered beyond our expectations. Their team is top-notch!"</p>
                        <h4 class="mt-4 font-semibold">- John Doe</h4>
                      </div>
                      <!-- Testimonial 2 -->
                      <div class="swiper-slide p-6 bg-gray-800 rounded-xl shadow-md flex flex-col items-center">
                        <img src="{{ custom_asset('web/images/team3.jpg') }}" alt="Jane Smith" class="w-16 h-16 rounded-full mb-4">
                        <p class="italic">"Excellent service! Highly recommended for any business looking for quality."</p>
                        <h4 class="mt-4 font-semibold">- Jane Smith</h4>
                      </div>
                      <!-- Testimonial 3 -->
                      <div class="swiper-slide p-6 bg-gray-800 rounded-xl shadow-md flex flex-col items-center">
                        <img src="{{ custom_asset('avatar/user.png') }}" alt="Mark Johnson" class="w-5 h-5 rounded-full mb-4 object-cover border-2 border-white">
                        <p class="italic">"Professional and reliable. Sudriva transformed our online presence!"</p>
                        <h4 class="mt-4 font-semibold">- Mark Johnson</h4>
                      </div>
                    </div>
                    <!-- Pagination and Navigation -->
                    <div class="swiper-pagination"></div>
                  </div>
                </div>
            </div>
            <!--/Testimonials -->

             <!-- Row -->
             <div class="content-row row_padding_top light-section text-align-center" data-bgcolor="#c1bbf0">                                   	
                                    
                                    
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
                    <div class="map-wrapper">
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3434.923854467575!2d74.8268458!3d30.5796949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3917337badc1bfe1%3A0xac749c7e20d9762a!2sNovus%20Forensics!5e0!3m2!1sen!2sin!4v1742037467653!5m2!1sen!2sin" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                                            
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
                    
        </div>
        <!--/Main Content --> 
    
    </div>
    <!--/Main -->
    
    
@endsection