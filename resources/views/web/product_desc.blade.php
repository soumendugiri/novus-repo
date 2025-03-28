@extends('web.layouts.web-layout')
@section('content')

    <!-- Main -->
    <div id="main">
    
        <!-- Hero Section -->
        <div id="hero" class="has-image autoscroll">
            <div id="hero-styles">
                <div id="hero-caption" class="content-full-width parallax-scroll-caption">
                    
                    <div class="inner">   
                        <h1 class="hero-title caption-timeline"><span>{{ $product['product']->company->company_name }}</span><span>{{ $product['product']->product_name }}</span></h1>
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
                <div id="hero-bg-image" style="background-image:url('{{ get_featured_image_thumbnail_url($product['product']->featured_image) }}')"></div>
            </div>
        </div>                        
        <!--/Hero Section -->   
                
        
        <!-- Main Content -->
        <div id="main-content">
            <div id="main-page-content">
                
                <div class="row_padding_top content-row small row_padding_bottom light-section text-align-center" data-bgcolor="transparent">          
                    <div><span>{{ $product['product']->product_name }}:</span></div> 
                    <div class="secondary-font"><span><span>{!! $product['product']->product_details !!}</span></span></div>    
                </div>

                <!-- Row -->
                <div class="content-row small row_padding_top light-section" data-bgcolor="#c1bbf0">
                    
                    <figure>
                        <a href="{{ get_featured_image_thumbnail_url($product['product']->featured_image) }}" class="image-link"><img src="{{ get_featured_image_thumbnail_url($product['product']->featured_image) }}" alt="Image Title"></a>               
                        <figcaption>Price:{{ $product['product']->price }}</figcaption>
                    </figure>       
                    
                </div> 
                <!--/Row -->
                
                
                <!-- Row -->
                {{-- <div class="content-row full light-section disable-header-gradient change-header-color" data-bgcolor="#c1bbf0">
                    
                    <figure class="has-parallax">
                        <img src="images/projects/son02.jpg" alt="Image Title">
                    </figure>
                    
                </div>  --}}
                <!--/Row -->
                
                
                <!-- Row -->
                <div class="content-row small row_padding_top row_padding_bottom light-section text-align-center" data-bgcolor="#c1bbf0">
                    
                    <div class="pinned-lists-wrapper scale-mode" data-duration="2x">
                        <p class="has-shuffle-onscroll">Best Features</p>                               
                        <ul class="pinned-lists2">
                            @foreach(explode(',',$product['product']->product_fetures ?? []) as $feture)
                             <li>{{ $feture }}</li>
                            @endforeach
                        </ul>
                    </div>
            
                </div> 
                <!--/Row -->
                
                
                <!-- Row -->
                <div class="content-row full light-section" data-bgcolor="#c1bbf0">
                    
                    <div class="clapat-slider-wrapper content-slider small-looped-carousel has-animation autocenter light-cursor">
                        <div class="clapat-slider">
                            <div class="clapat-slider-viewport">
                                @foreach ($product['product']->images as $prod_img) 
                                 <div class="clapat-slide"><div class="slide-img"><img src="{{ get_featured_image_url($prod_img['image']) }}" alt="Image Title"></div></div>
                                @endforeach
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
                            <a class="next-ajax-link-project" data-type="page-transition" href="{{ route('web.product_desc',['pid'=>base64_encode($product['next_product']->id ?? $product['product']->id)]) }}" data-firstline="Next" data-secondline="Project"></a>
                            <div class="next-caption">
                                <div class="next-hero-title caption-timeline has-shuffle-title" data-firstline="Keep" data-secondline="Scrolling"><span>{{ $product['product']->product_name }}</span></div>
                                <div class="next-hero-subtitle caption-timeline secondary-font"><span>Keep Scrolling</span></div> 
                            </div>                            
                        </div>                   
                    </div>
                    
                    <div class="next-hero-progress"><span></span></div>
                    
                    <div class="next-project-image-wrapper">
                        <div class="next-project-image next-project-image-effects">
                            <div class="next-project-image-bg" style="background-image:url('{{ get_featured_image_thumbnail_url($product['product']->featured_image) }}')"></div>
                        </div>            
                    </div>
                    
                </div>
            </div>      
            <!--/Project Navigation -->                                                
                    
        </div>
        <!--/Main Content --> 
    </div>
    <!--/Main --> 
        
@endsection