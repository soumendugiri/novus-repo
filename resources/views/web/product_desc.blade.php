@extends('web.layouts.web-layout')
@section('content')
            <!-- Content Scroll -->
            <div id="content-scroll">
            
            
                <!-- Main -->
                <div id="main">
                
                    <!-- Hero Section -->
                    <div id="hero" class="has-image autoscroll">
                        <div id="hero-styles">
                            <div id="hero-caption" class="content-full-width parallax-scroll-caption">
                                
                                <div class="inner">   
                                    <h1 class="hero-title caption-timeline"><span>MINI</span><span>VAN PALADIN</span></h1>
                                    <div class="hero-subtitle caption-timeline onload-shuffle">
                                    	<div><span>The Mini Van Paladin:</span></div> 
                                        <div class="secondary-font"><span>The newest and smallest addition to our range of self-sufficient mobile laboratories</span></div>
                                    </div>
                                </div>
                                
                                <div id="hero-footer" class="">
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
                                        <div id="share" class="page-action-content" data-text="Share:"></div>
                                    </div>
                                </div>
                                
                            </div>                                                                                            
                        </div>
                    </div>
                    <div id="hero-image-wrapper" class="change-header-color hero-pixels-cover parallax-scroll-image">
                    	<div id="hero-background-layer" class="parallax-scroll-image">
                            <div id="hero-bg-image" style="background-image:url('{{ asset('web/products1/84.jpg') }}')"></div>
                        </div>
                    </div>                        
                    <!--/Hero Section -->   
                         
                    
                    <!-- Main Content -->
                    <div id="main-content">
                        <div id="main-page-content">
                        
                        
                            
                            <!-- Row -->
                            <div class="content-row small row_padding_top light-section" data-bgcolor="#c8c8c8">
                                
                            	<figure>
                                    <a href="images/projects/son01.jpg" class="image-link"><img src="{{ asset('web/products1/84.jpg') }}" alt="Image Title"></a>               
                                    <figcaption>Caption</figcaption>
                                </figure>       
                                
                            </div> 
                            <!--/Row -->
                            
                            
                            <!-- Row -->
                            <div class="content-row small row_padding_bottom light-section text-align-center" data-bgcolor="#c8c8c8">
                                
                                <hr><hr class="destroy">
                                <p class="has-opacity">These images are credited to the following author.</p>
                                <br>
                                
                                <div class="button-box has-animation" data-delay="100">             
                                    <div class="clapat-button-wrap parallax-wrap hide-ball">
                                        <div class="clapat-button parallax-element">
                                            <div class="button-border rounded parallax-element-second">
                                                <a target="_blank" href="https://www.behance.net/gallery/170397053/Son-of-a-Tailor">
                                                    <span data-hover="View Project">View Project</span>
                                                 </a>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                
                            </div> 
                            <!--/Row -->
                            
                            
                            <!-- Row -->
                            <div class="content-row full light-section disable-header-gradient change-header-color" data-bgcolor="#c8c8c8">
                                
                                <figure class="has-parallax">
                                    <img src="images/projects/son02.jpg" alt="Image Title">
                                </figure>
                                
                            </div> 
                            <!--/Row -->
                            
                            
                            <!-- Row -->
                            <div class="content-row small row_padding_top row_padding_bottom light-section text-align-center" data-bgcolor="#c8c8c8">
                                
                                <div class="pinned-lists-wrapper scale-mode" data-duration="2x">
                                	<p class="has-shuffle-onscroll">Best Features</p>                               
                                	<ul class="pinned-lists2">
                                        <li>No special driving license necessary</li>
                                        <li>Covert design possible</li>
                                        <li>Covert design - does not attract attention</li>
                                        <li>UPS with 10 hour battery backup</li>
                                        <li>noise insulation</li>
                                    </ul>
                                </div>
                                
                            </div> 
                            <!--/Row -->
                            
                            
                            <!-- Row -->
                            <div class="content-row full light-section" data-bgcolor="#c8c8c8">
                                
                                <div class="clapat-slider-wrapper content-slider small-looped-carousel has-animation autocenter light-cursor">
        							<div class="clapat-slider">
                                        <div class="clapat-slider-viewport">
                                            <div class="clapat-slide"><div class="slide-img"><img src="{{ asset('web/products1/84.jpg') }}" alt="Image Title"></div></div>
                                            <div class="clapat-slide"><div class="slide-img"><img src="{{ asset('web/products1/84.jpg') }}" alt="Image Title"></div></div>
                                            <div class="clapat-slide"><div class="slide-img"><img src="{{ asset('web/products1/84.jpg') }}" alt="Image Title"></div></div>
                                            <div class="clapat-slide"><div class="slide-img"><img src="{{ asset('web/products1/84.jpg') }}" alt="Image Title"></div></div>
                                        </div>
                                    </div>
                                    
                                    <div class="clapat-controls">
                                        <div class="clapat-button-next slider-button-next"></div>
                                        <div class="clapat-button-prev slider-button-prev"></div>
                                        <div class="clapat-pagination"></div>
                                    </div>
                                </div>
                                
                                <hr class="destroy"><hr class="destroy"><hr>
                                
                            </div> 
                            <!--/Row -->
                        
                        
                        </div>
                        <!--/Main Page Content --> 
                        
                        
                        
                        <!-- Project Navigation --> 
                        <div id="project-nav" class="pinned-nav-caption auto-trigger move-title-onload" data-next-bgcolor="#b8b6a7">
                            <div class="next-project-wrap">
                                
                                <div id="next-project-caption" class="text-align-center content-full-width">
                                    <div class="next-caption-wrapper">
                                        <a class="next-ajax-link-project" data-type="page-transition" href="project02.html" data-firstline="Next" data-secondline="Project"></a>
                                        <div class="next-caption">
                                            <div class="next-hero-title caption-timeline has-shuffle-title" data-firstline="Keep" data-secondline="Scrolling"><span>VAN PALADIN</span></div>
                                            <div class="next-hero-subtitle caption-timeline secondary-font"><span>Keep Scrolling</span></div> 
                                        </div>                            
                                    </div>                   
                                </div>
                                
                                <div class="next-hero-progress"><span></span></div>
                                
                                <div class="next-project-image-wrapper">
                                    <div class="next-project-image next-project-image-effects">
                                        <div class="next-project-image-bg" style="background-image:url('{{ asset('web/products1/84.jpg') }}')"></div>
                                    </div>            
                                </div>
                                
                            </div>
                        </div>      
                        <!--/Project Navigation -->                                                
                                
                    </div>
                    <!--/Main Content --> 
                </div>
                <!--/Main --> 
                
                
                <!-- Footer -->
                <footer class="clapat-footer hidden">        	
                    <div id="footer-container">
                        
                        <div id="backtotop" class="button-wrap left">
                            <div class="icon-wrap parallax-wrap">
                                <div class="button-icon parallax-element">
                                    <i class="fa-solid fa-angle-up"></i>
                                </div>
                            </div>
                            <div class="button-text sticky left"><span data-hover="Back Top">Back Top</span></div> 
                        </div>
                        
                        <div class="footer-middle">
                            <div class="copyright">2025 © <a class="link" target="_blank" href="https://www.clapat.com/">Sudriva</a>. All rights reserved.</div>
                        </div>
                        
                        <div class="socials-wrap">            	
                            <div class="socials-icon"><i class="fa-solid fa-share-nodes"></i></div>
                            <div class="socials-text">Follow Us</div>
                            <ul class="socials">
                                <li><span class="parallax-wrap"><a class="parallax-element" href="https://www.dribbble.com/clapat" target="_blank">Db</a></span></li>
                                <li><span class="parallax-wrap"><a class="parallax-element" href="https://www.twitter.com/clapatdesign" target="_blank">Tw</a></span></li>
                                <li><span class="parallax-wrap"><a class="parallax-element" href="https://www.behance.com/clapat" target="_blank">Be</a></span></li>
                                <li><span class="parallax-wrap"><a class="parallax-element" href="https://www.facebook.com/clapat.ro" target="_blank">Fb</a></span></li>
                                <li><span class="parallax-wrap"><a class="parallax-element" href="https://www.instagram.com/clapat.themes/">Ig</a></span></li>
                            </ul>                
                        </div>
                        
                    </div>
                </footer>
                <!--/Footer -->
            
        
        	</div>
            <!--/Content Scroll -->
            
            <div id="app"></div>            
            
		</div>    
        <!--/Page Content -->
    
		</div>
	</main>
@endsection