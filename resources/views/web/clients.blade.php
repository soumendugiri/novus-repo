@extends('web.layouts.web-layout')

@section('content')    
    
    
    <!-- Main -->
    <div id="main">
        
        <!-- Main Content -->
        <div id="main-content">
            <!-- Main Page Content -->
            <div id="main-page-content">
                <!-- Fit Thumb Screen Effects -->                                                          
                <div id="itemsWrapperLinks">                               
                    <div id="itemsWrapper" class="webgl-fitthumbs fx-one">
                        
                        
                        <!-- Row -->
                        {{-- <div class="content-row has-clip-path full dark-section change-header-color disable-header-gradient" data-bgcolor="transparent">
                        
                            <div class="parallax-image-wrapper">
                            
                                <div class="parallax-image" data-bg-image="images/parallax.jpg">
                                </div>
                                
                                <div class="parallax-content-pin">
                                    <div class="parallax-content-animation"></div>
                                </div>
                                
                                <ul class="parallax-content">
                                    <li class="parallax-list">
                                        <div><span>We are Novus</span></div>
                                        <div><span>Digital forensics company</span></div>
                                    </li>
                                    <li class="parallax-list">
                                        <div><span>We bring ideas to life</span></div>
                                        <div><span>Some more text</span></div>
                                    </li>
                                    <li class="parallax-list">
                                        <div><span>Design with purpose</span></div>
                                        <div><span>Solutions for businesses</span></div>
                                    </li>
                                </ul>

                                
                            </div>
                            
                        </div>  --}}
                        <!--/Row -->
                        
                        
                        {{-- <!-- Row -->
                        <div class="content-row full row_padding_top row_padding_bottom light-section" data-bgcolor="#c1bbf0">
                            
                            <div class="team-list-wrapper">
                                
                                <ul class="team-list-captions">
                                    <li data-centerLine="Hello">
                                        <div class="tml-title"><span>Hannah</span> <span>Smith</span></div>
                                        <div class="tml-cat">Co-Founder</div>
                                    </li>
                                    <li data-centerLine="Bonjour">
                                        <div class="tml-title"><span>Lucas</span> <span>Martin</span></div>
                                        <div class="tml-cat">Co-Founder</div>
                                    </li>
                                    <li data-centerLine="Hallo">                                                    
                                        <div class="tml-title"><span>Emma</span> <span>Müller</span></div>
                                        <div class="tml-cat">Web Designer</div>
                                    </li>
                                    <li data-centerLine="Salut">
                                        <div class="tml-title"><span>Mark</span> <span>Spencer</span></div>
                                        <div class="tml-cat">Web Developer</div>
                                    </li>
                                    <li data-centerLine="Holla">
                                        <div class="tml-title"><span>Charlotte</span> <span>Dunn</span></div>
                                        <div class="tml-cat">SEO Specialis</div>
                                    </li>
                                    <li data-centerLine="Apply">
                                        <div class="tml-title"><span>John</span> <span>Doe</span></div>
                                        <div class="tml-cat">Join our Team</div>
                                    </li>
                                </ul>
                                
                                
                                <ul class="team-list-images">
                                    <li>
                                        <div class="img-mask">                                                    
                                            <div class="section-image">
                                                <img src="images/team1.jpg" class="item-image grid__item-img" alt="">
                                            </div>                            
                                        </div>                                            
                                    </li>
                                    <li>
                                        <div class="img-mask">
                                            <div class="section-image">
                                                <img src="images/team2.jpg" class="item-image grid__item-img" alt="">
                                            </div>                         
                                        </div>                                         
                                    </li>
                                    <li>
                                        <div class="img-mask">
                                            <div class="section-image">
                                                <img src="images/team3.jpg" class="item-image grid__item-img" alt="">
                                            </div>                   
                                        </div>
                                    </li>
                                    <li>
                                            <div class="img-mask">
                                            <div class="section-image">
                                                <img src="images/team4.jpg" class="item-image grid__item-img" alt="">                                                            
                                            </div>                          
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img-mask">
                                            <div class="section-image">
                                                <img src="images/team5.jpg" class="item-image grid__item-img" alt="">
                                            </div>         
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img-mask">
                                            <div class="section-image">
                                                <img src="images/team6.jpg" class="item-image grid__item-img" alt="">
                                            </div>               
                                        </div>
                                    </li>
                                    <li class="pixels-cover"></li>
                                </ul>
                                    
                            </div>                                        
                            
                        </div> 
                        <!--/Row --> --}}                            
                        
                        
                        <!-- Row -->
                        <div class="content-row row_padding_top text-align-center light-section" data-bgcolor="#d0cbf2">
                            
                            <p class="bigger has-shuffle secondary-font">Some text</p>
                            <h2 class="has-animation">Our Clients</h2>
                                                                
                            <hr>
                            
                            <!-- Flex Lists --> 
                            <ul class="flex-lists-wrapper">  
                                
                                @foreach ($images as $image)
                                    <li class="flex-list link has-animation">
                                        <a href="{{ $image['link'] }}" style="text-decoration: none; color: inherit; display: flex; width: 100%;" target="_blank">
                                            <span class="logo-container">
                                                <img class="" src="{{ custom_asset('web/images/clients/'.$image['name']) }}" alt="{{ $image['name'] }} Logo">
                                            </span>
                                            <span class="flex-list-center-custom">{{ $image['main_info'] }}</span>
                                            <span class="flex-list-right">{{ $image['second_info'] }}</span>
                                        </a>
                                    </li>
                                @endforeach                                                          
                                
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
    
   