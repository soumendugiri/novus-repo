@extends('web.layouts.web-layout')

@section('content')    
    
    <!-- Main -->
    <div id="main">
    
        <!-- Hero Section -->
        <div id="hero">
            <div id="hero-styles">
                <div id="hero-caption" class="content-full-width parallax-scroll-caption text-align-center hero-full-caption">
                    <div class="inner">
                    
                        <h1 class="hero-title caption-timeline" data-infoTextBefore="Creative" data-infoTextAfter="Agency">
                            <div><span>LET'S KNOW NOVUS</span></div>
                        </h1>
                        
                        <div class="hero-subtitle caption-timeline onload-shuffle">
                            <div><span>We are passionate about</span></div> 
                            <div class="secondary-font"><span>creating memorable experience</span></div>
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
                            <div class="button-text sticky left"><span data-hover="Scroll to Explore">Scroll to Explore</span></div> 
                        </div>
                    </div>
                    <div class="hero-footer-right">
                        <div id="info-text"><span>Our Short Story</span></div>
                    </div>
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
                        <div class="content-row has-clip-path full dark-section change-header-color disable-header-gradient" data-bgcolor="transparent">
                        
                            <div class="parallax-image-wrapper">
                            
                                <div class="parallax-image" data-bg-image="images/parallax.jpg">
                                </div>
                                
                                <div class="parallax-content-pin">
                                    <div class="parallax-content-animation"></div>
                                </div>
                                
                                <ul class="parallax-content">
                                    <li class="parallax-list">
                                        <div><span>We are Forensic</span></div>
                                        <div><span>Investigation organization.</span></div>
                                    </li>
                                    <li class="parallax-list">
                                        <div><span>We built on</span></div>
                                        <div><span>integrity and trust.</span></div>
                                    </li>
                                    <li class="parallax-list">
                                        <div><span>Committed to ethical integrity</span></div>
                                        <div><span>uncover the truth with precision.</span></div>
                                    </li>
                                </ul>

                                
                            </div>
                            
                        </div> 
                        <!--/Row -->
                        
                        
                        <!-- Row -->
                        <div class="content-row full row_padding_top row_padding_bottom light-section" data-bgcolor="#c1bbf0">
                            
                            <div class="team-list-wrapper">
                                
                                <ul class="team-list-captions">
                                    <li data-centerLine="Hello">
                                        <div class="tml-title"><span>Anmol</span> <span>Maini</span></div>
                                        <div class="tml-cat">Founder & Partner</div>
                                    </li>
                                    <li data-centerLine="Bonjour">
                                        <div class="tml-title"><span>Akshay</span> <span>Singh</span></div>
                                        <div class="tml-cat">Founder & Partner</div>
                                    </li>
                                </ul>
                                
                                
                                <ul class="team-list-images">
                                    <li>
                                        <div class="img-mask">                                                    
                                            <div class="section-image">
                                                <img src="{{ custom_asset('web/images/founder.jpg') }}" class="item-image grid__item-img" alt="">
                                            </div>                            
                                        </div>                                            
                                    </li>
                                    <li>
                                        <div class="img-mask">
                                            <div class="section-image">
                                                <img src="{{ custom_asset('web/images/team2.jpg') }}" class="item-image grid__item-img" alt="">
                                            </div>                         
                                        </div>                                         
                                    </li>
                                    <li class="pixels-cover"></li>
                                </ul>
                                    
                            </div>                                        
                            
                        </div> 
                        <!--/Row -->
                        
                         <!-- Row -->
                        <div class="content-row has-clip-path row_padding_top row_padding_bottom dark-section change-header-color disable-header-gradient" data-bgcolor="#0c0c0c">
                            
                            <div class="pinned-lists-wrapper scale-mode text-align-center" data-duration="3x">
                                <p class="has-shuffle-onscroll">You need it? We do it</p>                               
                                <ul class="pinned-lists">
                                    <li>MOBILE FORENSICS</li>
                                    <li>CDR ANALYSIS</li>
                                    <li>DNA EXAMINATION</li>
                                    <li>CRIME SCENE INVESTIGATION</li>
                                    <li>CYBER SECURITY</li>
                                    <li>AND MORE</li>
                                </ul>
                            </div>
                            
                        </div> 
                        <!--/Row -->  
                        
                        <!-- Row -->
                        {{-- <div class="content-row has-clip-path row_padding_top row_padding_bottom dark-section change-header-color disable-header-gradient" data-bgcolor="#0c0c0c">
                            
                            <div class="pinned-lists-wrapper scale-mode text-align-center" data-duration="3x">
                                <p class="has-shuffle-onscroll">You need it? We do it</p>                               
                                <ul class="pinned-lists">
                                    <li>branding</li>
                                    <li>web design</li>
                                    <li>motion</li>
                                    <li>development</li>
                                    <li>marketing</li>
                                </ul>
                            </div>
                            
                        </div>  --}}
                        <!--/Row -->                                    
                        
                        
                        <!-- Row -->
                        <div class="content-row row_padding_top text-align-center light-section" data-bgcolor="#c1bbf0">
                            
                            <p class="bigger has-shuffle secondary-font">Appreciation</p>
                            <h2 class="has-animation">And awards</h2>
                                                                
                            <hr>
                            
                            <!-- Flex Lists --> 
                            <ul class="flex-lists-wrapper">                                                            
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">Awwwards</span>
                                    <span class="flex-list-center">Developer Award, Site of the Day, Honorable Mention</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">CSS Design Awards</span>
                                    <span class="flex-list-center">Website of the Day, Special Kudos</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">Behance</span>
                                    <span class="flex-list-center">Featured UX/UI and XD Design</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">CSS Light</span>
                                    <span class="flex-list-center">Featured Website, Featured Design</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">FWA Awards</span>
                                    <span class="flex-list-center">FWA of the day, FWA of the month</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">One Page Love</span>
                                    <span class="flex-list-center">Site of the Day</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">SiteInspire</span>
                                    <span class="flex-list-center">Featured Website</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>
                                <li class="flex-list link has-animation">
                                    <span class="flex-list-left">CSS Winner</span>
                                    <span class="flex-list-center">Site of the Day, Special Mention</span>
                                    <span class="flex-list-right"><img style="max-width: 35%" src="{{ custom_asset('web/images/award.png') }}"/></span>
                                </li>                        
                            </ul>
                            
                            <hr class="destroy">
                        
                        </div> 
                        <!--/Row -->
                        
                        
                        
                
                
                    </div>                                                           
                </div>    
                <!-- Fit Thumb Screen Effects -->
            </div>
            <!--/Main Page Content -->
            
            
            <!-- Page Navigation --> 
            <div class="content-row full row_padding_top light-section text-align-center" data-bgcolor="#c1bbf0">           
                <p class="bigger has-shuffle no-margins secondary-font">Ready to work together?</p>
                <div id="copy-email" data-hover-message="Copy Mail" data-clicked-message="Copied"><span>info@novusforensics.org</span></div>
            </div>       
            <!--/Page Navigation -->
            
                    
        </div>
        <!--/Main Content --> 
    
    </div>
    <!--/Main -->
        
@endsection
    
   