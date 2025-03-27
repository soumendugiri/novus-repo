@extends('web.layouts.web-layout')

@section('content')         

    <!-- Main -->
    <div id="main">
    
        <!-- Hero Section -->
        <div id="hero" class="fixed-hero">
            <div id="hero-styles">
                <div id="hero-caption" class="content-full-width parallax-scroll-caption text-align-center hero-full-caption">
                    <div class="inner">                                
                        <h1 class="hero-title caption-timeline onload-shuffle">
                            <span>Products</span>
                        </h1>                                                                       
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
                        
                        <!-- ClaPat Slider -->
                        <div id="clapat-webgl-slider" class="clapat-slider-wrapper showcase-gallery preview-mode-enabled">    
                            
                            <div id="trigger-slides" class="clapat-slider">
                                
                                <!-- ClaPat Main Slider -->
                                <div class="clapat-slider-viewport">
                                    @if(!$products->isEmpty())
                                        @foreach ($products as $product)
                                            <div class="clapat-slide">                                            	
                                                <div class="slide-effects align-center has-scale-large">                                            
                                                    <div class="slide-inner-height" data-centerLine="VIEW">
                                                        <div class="slide-moving">
                                                            <div class="trigger-item change-header" data-centerLine="OPEN" data-projectbgcolor="#c1bbf0">
                                                                <div class="img-mask">
                                                                    <a class="slide-link" data-type="page-transition" href="{{ route('web.product_desc',['pid'=>base64_encode($product->id)]) }}"></a>
                                                                    <div class="section-image trigger-item-link">
                                                                        <img src="{{ get_featured_image_thumbnail_url($product->featured_image) }}" class="item-image grid__item-img" alt="">
                                                                    </div>                                                
                                                                    <img src="{{ get_featured_image_thumbnail_url($product->featured_image) }}" class="grid__item-img grid__item-img--large" alt="">
                                                                </div>
                                                            </div>                                                         
                                                        </div>                                                            
                                                    </div>
                                                    <div class="slide-caption">
                                                        <div class="slide-date"><span>{{$product->price}}</span></div>
                                                        <div class="slide-title"><span>{{$product->product_name}}</span></div>
                                                        <div class="slide-cat"><span>{{$product->company->company_name}}</span></div>
                                                    </div>
                                                    <div class="slide-thumb speed-50">
                                                        @if ($product->images->count() > 1)
                                                        <img src="{{ get_featured_image_path($product->images[0]->image) }}" alt="">
                                                        @else
                                                        <img src="{{ get_featured_image_thumbnail_url($product->featured_image) }}" alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach  
                                    @else
                                        <div class="clapat-slide">                                            	
                                            <div class="slide-effects align-center has-scale-large">                                            
                                                <div class="slide-inner-height" data-centerLine="VIEW">
                                                    <div class="slide-moving">
                                                        <div class="trigger-item change-header" data-centerLine="OPEN" data-projectbgcolor="#c1bbf0">
                                                            <div class="img-mask">
                                                                <a class="slide-link" data-type="page-transition" href="#"></a>
                                                                <div class="section-image trigger-item-link">
                                                                    <img src="{{ custom_asset('web/images/no-product.png') }}" class="item-image grid__item-img" alt="">
                                                                </div>                                                
                                                                <img src="{{ custom_asset('web/images/no-product.png') }}" class="grid__item-img grid__item-img--large" alt="">
                                                            </div>
                                                        </div>                                                         
                                                    </div>                                                            
                                                </div>
                                                <div class="slide-caption">
                                                    <div class="slide-date"><span>0</span></div>
                                                    <div class="slide-title"><span>No product found</span></div>
                                                </div>
                                                <div class="slide-thumb speed-50">
                                                    <img src="{{ custom_asset('web/images/no-product.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!--/ClaPat Main Slider -->
                                
                                
                                <!-- ClaPat Sync Slider -->
                                <div class="clapat-sync-slider">      
                                    <div class="clapat-sync-slider-wrapper">
                                        <div class="clapat-sync-slider-viewport"> 
                                        @if (!$products->isEmpty())
                                                                           
                                            @foreach ($products as $product)
                                                <div class="clapat-sync-slide">                                                	
                                                    <div class="trigger-item" data-centerLine="OPEN" data-projectbgcolor="#e1dedf" data-projectcolor="#c1bbf0">
                                                        <div class="hover-reveal landscape1">
                                                            <div class="hover-reveal__inner">
                                                                <div class="hover-reveal__img">
                                                                    <img src="{{get_featured_image_thumbnail_url($product->featured_image)}}" class="item-image grid__item-img" alt="">                                             
                                                                    <img class="grid__item-img grid__item-img--large" src="{{get_featured_image_thumbnail_url($product->featured_image)}}" alt="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <a class="slide-link" data-type="page-transition" href="{{ route('web.product_desc',['pid'=>base64_encode($product->id)]) }}"></a>
                                                        <div class="slide-title trigger-item-link modify-color"><span>{{$product->product_name}}</span></div>
                                                    </div>
                                                </div>
                                            @endforeach  
                                        @else
                                            <div class="clapat-sync-slide">                                                	
                                                <div class="trigger-item" data-centerLine="OPEN" data-projectbgcolor="#e1dedf" data-projectcolor="#c1bbf0">
                                                    <div class="hover-reveal landscape1">
                                                        <div class="hover-reveal__inner">
                                                            <div class="hover-reveal__img">
                                                                <img src="{{ custom_asset('web/images/no-product.png') }}" class="item-image grid__item-img" alt="">                                             
                                                                <img class="grid__item-img grid__item-img--large" src="{{ custom_asset('web/images/no-product.png') }}" alt="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <a class="slide-link" data-type="page-transition" href="#"></a>
                                                    <div class="slide-title trigger-item-link modify-color"><span>No product found</span></div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        </div>
                                    </div>
                                </div>
                                <!-- ClaPat Sync Slider -->
                                
                                
                            </div>
                            <!-- ClaPat Slider --> 
                            
                            <div class="slider-zoom-wrapper"></div>                                    
                            <div class="slider-thumbs-wrapper"></div>
                            <div class="slider-close-preview"></div>
                                                                
                        </div>
                        <!--/ClaPat Slider Wrapper -->
                
                    </div>                                                           
                </div>    
                <!-- Fit Thumb Screen Effects -->
            </div>
            <!--/Main Page Content -->
            
                    
        </div>
        <!--/Main Content --> 
    
    </div>
    <!--/Main -->

    
    
@endsection
            
            