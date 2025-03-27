@extends('web.layouts.web-layout')

@section('content')         

   <!-- Main -->
   <div id="main">
                
        <!-- Hero Section -->
        <div id="hero">
            <div id="hero-styles">
                <div id="hero-caption" class="content-full-width parallax-scroll-caption text-align-center hero-full-caption">
                    <div class="inner">
                    
                        <h1 class="hero-title caption-timeline generate-spans" data-infoTextBefore="Designs" data-infoTextAfter="Portfolio">
                            <div><span>Companies</span></div>
                        </h1>
                        
                        <div class="hero-subtitle caption-timeline onload-shuffle">
                            <div><span>Designing digital experiences that</span></div>
                            <div class="secondary-font"><span>leave a lasting impression</span></div>
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
                        <div class="button-wrap right show-filters">
                            <div class="icon-wrap parallax-wrap">
                                <div class="button-icon parallax-element">
                                    <i class="fa-solid fa-sort"></i>
                                </div>
                            </div>
                            <div class="button-text sticky right"><span data-close="All Companies" data-hover="All Companies">All Companies</span></div> 
                        </div>
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
                        
                        <div id="filters-gradient">
                            <ul id="filters" class="filters-options-wrapper">
                                <li class="filters-timeline link"><a id="all" class="filter-option is_active" href="#" data-filter=""><span>all companies</span></a></li>
                                <li class="filters-timeline link"><a class="filter-option" href="#" data-filter="design-filter"><span>design</span></a></li>
                                <li class="filters-timeline link"><a class="filter-option" href="#" data-filter="video-filter"><span>video</span></a></li>
                                <li class="filters-timeline link"><a class="filter-option" href="#" data-filter="photo-filter"><span>photo</span></a></li>
                            </ul>
                        </div>
                        
                        
                        <!-- ClaPat Portfolio -->
                        <div class="showcase-portfolio expand-grid">
                            
                            <!-- <div class="clapat-item photo-filter">
                                <div class="slide-inner trigger-item" data-centerLine="OPEN">                                                    
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="project01.html"></a>
                                        <div class="section-image trigger-item-link">
                                            <img src="images/01hero.jpg" class="item-image grid__item-img" alt="">
                                        </div>                                                
                                        <img src="images/01hero.jpg" class="grid__item-img grid__item-img--large" alt="">
                                        <div class="section-thumb">
                                            <img src="images/01hero1.jpg" alt="">
                                        </div>                              
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>Son of a Tailor</span></div>                                                    
                                        <div class="slide-date"><span>2025</span></div>
                                        <div class="slide-cat"><span>Branding</span></div>                                             
                                    </div>
                                </div>
                            </div> -->


                        @if (!$companies->isEmpty())
                            @foreach ($companies as $cmpny)

                            <div class="clapat-item design-filter">
                                <div class="slide-inner trigger-item" data-centerLine="OPEN">                                                    
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="{{ route('allProductsRoute',['cid'=>base64_encode($cmpny->id)]) }}"></a>
                                        <div class="section-image  trigger-item-link">
                                            <img src="{{ get_featured_image_thumbnail_url($cmpny->company_logo) }}" class="item-image grid__item-img" alt="">
                                        </div>                                                
                                        <img src="{{ get_featured_image_thumbnail_url($cmpny->company_logo) }}" class="grid__item-img grid__item-img--large" alt="">   
                                        <div class="section-thumb">
                                            <img src="{{ get_featured_image_thumbnail_url($cmpny->company_logo) }}" alt="">
                                        </div>                           
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>{{$cmpny->company_name}}</span></div>
                                        <div class="slide-date"><span>{{$cmpny->company_desc}}</span></div>
                                        <!-- <div class="slide-cat"><span>Web Design</span></div>                                           -->
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach

                        @endif
                            <!-- <div class="clapat-item photo-filter">                                                
                                <div class="slide-inner trigger-item" data-centerLine="OPEN">                                                    
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="project03.html"></a>
                                        <div class="section-image trigger-item-link">
                                            <img src="images/03hero.jpg" class="item-image grid__item-img" alt="">
                                        </div>                                                
                                        <img src="images/03hero.jpg" class="grid__item-img grid__item-img--large" alt="">
                                        <div class="section-thumb">
                                            <img src="images/03hero1.jpg" alt="">
                                        </div>                              
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>The Infin</span></div>
                                        <div class="slide-date"><span>2025</span></div>
                                        <div class="slide-cat"><span>Photography</span></div>                                             
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clapat-item video-filter">
                                <div class="slide-inner trigger-item" data-centerLine="OPEN">                                                    
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="project04.html"></a>
                                        <div class="section-image trigger-item-link">
                                            <img src="images/04hero.jpg" class="item-image grid__item-img" alt="">
                                            <div class="hero-video-wrapper">
                                                <video loop muted class="bgvid">
                                                    <source src="images/04hero.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>                                                
                                        <img src="images/04hero.jpg" class="grid__item-img grid__item-img--large" alt="">
                                        <div class="section-thumb">
                                            <img src="images/04hero.jpg" alt="">
                                        </div>                              
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>The Invincibles</span></div>
                                        <div class="slide-date"><span>2025</span></div>
                                        <div class="slide-cat"><span>Video Production</span></div>                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clapat-item design-filter">
                                <div class="slide-inner align-top trigger-item change-header" data-centerLine="OPEN">
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="project05.html"></a>
                                        <div class="section-image trigger-item-link">
                                            <img src="images/05hero.jpg" class="item-image grid__item-img" alt="">                                                            
                                        </div>                                                
                                        <img src="images/05hero.jpg" class="grid__item-img grid__item-img--large" alt="">
                                        <div class="section-thumb">
                                            <img src="images/05hero1.jpg" alt="">
                                        </div>                               
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>Kivira Naturals</span></div>
                                        <div class="slide-date"><span>2025</span></div>
                                        <div class="slide-cat"><span>Graphic Design</span></div>                                         
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clapat-item photo-filter">
                                <div class="slide-inner trigger-item" data-centerLine="OPEN">
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="project06.html"></a>
                                        <div class="section-image trigger-item-link">
                                            <img src="images/06hero.jpg" class="item-image grid__item-img" alt="">
                                        </div>                                                
                                        <img src="images/06hero.jpg" class="grid__item-img grid__item-img--large" alt="">
                                        <div class="section-thumb">
                                            <img src="images/06hero1.jpg" alt="">
                                        </div>                               
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>Voxa Speaker</span></div>
                                        <div class="slide-date"><span>2025</span></div>
                                        <div class="slide-cat"><span>Product Design</span></div>                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clapat-item design-filter">
                                <div class="slide-inner trigger-item" data-centerLine="OPEN">
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="project07.html"></a>
                                        <div class="section-image trigger-item-link">
                                            <img src="images/07hero.jpg" class="item-image grid__item-img" alt="">
                                        </div>                                                
                                        <img src="images/07hero.jpg" class="grid__item-img grid__item-img--large" alt="">
                                        <div class="section-thumb">
                                            <img src="images/07hero1.jpg" alt="">
                                        </div>                               
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>Nanotech Agency</span></div>
                                        <div class="slide-date"><span>2025</span></div>
                                        <div class="slide-cat"><span>Graphic Design</span></div>                                          
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clapat-item vertical-parallax photo-filter">
                                    <div class="slide-inner trigger-item" data-centerLine="OPEN">
                                    <div class="img-mask pixels-cover">
                                        <a class="slide-link" data-type="page-transition" href="project08.html"></a>
                                        <div class="section-image trigger-item-link">
                                            <img src="images/08hero.jpg" class="item-image grid__item-img" alt="">
                                        </div>                                                
                                        <img src="images/08hero.jpg" class="grid__item-img grid__item-img--large" alt="">
                                        <div class="section-thumb">
                                            <img src="images/08hero.jpg" alt="">
                                        </div>                               
                                    </div>
                                    <div class="slide-caption trigger-item-link-secondary">
                                        <div class="slide-title"><span>VX Lab</span></div>
                                        <div class="slide-date"><span>2025</span></div>
                                        <div class="slide-cat"><span>Photography</span></div>                                            
                                    </div>
                                </div>
                            </div>                                              -->
                                                                    
                        </div>
                        <!-- ClaPat Portfolio -->
                                                    
                    </div>                                                           
                </div>    
                <!-- Fit Thumb Screen Effects -->
            </div>
            <!--/Main Page Content -->
            
            
            
            
                    
            <!-- Page Navigation --> 
            <!-- <div id="page-nav" class="move-nav-onload">
                <div class="page-nav-wrap">
                    <div class="page-nav-caption nav-full-caption content-full-width text-align-center">                                 
                        <div class="inner">
                            <a class="next-ajax-link-page" data-type="page-transition" data-centerline="GO TO" href="index-playground.html">
                                <div class="next-hero-title caption-timeline" data-infoTextBefore="Go Ahead" data-infoTextAfter="Next Page"><span>archive</span></div>
                            </a>                                   
                        </div>               
                    </div>
                </div>
            </div>       -->
            <!--/Page Navigation -->
            
                    
        </div>
        <!--/Main Content --> 
    
    </div>
    <!--/Main -->
    
@endsection
            
            