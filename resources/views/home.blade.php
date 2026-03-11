@extends('layouts.app')
@section('content')
<div class="content full-height" data-pagetitle="Home slider">
    <div class="fl-wrap full-height hero-conatiner">
        <div class="hero-wrapper fl-wrap full-height hidden-item">
            <span class="hc_dec"></span>
            <!-- fs-slider-wrap  -->
            <!-- hero-slider-wrap -->
            <div class="hero-slider-wrap home-half-slider fl-wrap full-height">
                <div class="hero-slider fs-gallery-wrap fl-wrap full-height">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" >
                            <!-- swiper-slide-->
                            <div class="swiper-slide">
                                <div class="half-hero-wrap">
                                    <div class="hhw_header">SK Tecnology</div>
                                    <h1><span>Secure IT Solutions</span><br> </h1>
                                    <h4>We deliver cutting-edge technology solutions with enterprise-grade security to protect your digital assets and ensure business continuity. </h4>
                                    <div class="clearfix"></div>
                                    <a href="portfolio.html" class="btn ajax  fl-btn color-bg"><span>My portfolio</span></a>
                                </div>
                            </div>
                            <!-- swiper-slide end-->
                            <!-- swiper-slide-->
                            <div class="swiper-slide">
                                <div class="half-hero-wrap">
                                   <div class="hhw_header">SK Tecnology</div>
                                    <h1><span>Digital Transformation</span><br> </h1>
                                    <h4>Empowering businesses with innovative technology to streamline operations, enhance productivity, and drive sustainable growth in the digital era.</h4>
                                    <div class="clearfix"></div>
                                    <a href="portfolio.html" class="btn ajax  fl-btn color-bg"><span>My portfolio</span></a>
                                </div>
                            </div>
                            <!-- swiper-slide end-->
                            <!-- swiper-slide-->
                            <div class="swiper-slide">
                                <div class="half-hero-wrap">
                                   <div class="hhw_header">SK Tecnology</div>
                                    <h1><span>Data Center Excellence</span><br> </h1>
                                    <h4>esigning and managing robust data infrastructure with 99.9% uptime guarantee, ensuring your critical systems are always available and secure.</h4>
                                    <div class="clearfix"></div>
                                    <a href="portfolio.html" class="btn ajax  fl-btn color-bg"><span>My portfolio</span></a>
                                </div>
                            </div>
                            <!-- swiper-slide end-->
                            <!-- swiper-slide-->
                            <div class="swiper-slide">
                                <div class="half-hero-wrap">
                                    <div class="hhw_header">12 april 2020</div>
                                    <h1>Original Design <br> Features <br>With High  <span> Quality  Code.</span></h1>
                                    <h4>Praesent eu massa vel diam laoreet elementum ac sed felis. Donec suscipit ultricies risus sed mollis. Donec volutpat porta risus posuere imperdiet. </h4>
                                    <div class="clearfix"></div>
                                    <a href="about.html" class="btn ajax  fl-btn color-bg"><span>About me</span></a>
                                </div>
                            </div>
                            <!-- swiper-slide end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- hero-slider-wrap  end-->
            <!-- hero-slider-img-->
            <div class="hero-slider-img hero-slider-wrap_halftwo hidden-item">
                <div class="swiper-container">
                    <div class="swiper-wrapper" >
                        <!-- swiper-slide-->
                        <div class="swiper-slide">
                            <div class="bg"  data-bg="images/bg/service.jpg" data-swiper-parallax="20%"></div>
                            <div class="overlay"></div>
                        </div>
                        <!-- swiper-slide end-->
                        <!-- swiper-slide-->
                        <div class="swiper-slide">
                            <div class="bg"  data-bg="images/bg/digital.png" data-swiper-parallax="20%"></div>
                            <div class="overlay"></div>
                        </div>
                        <!-- swiper-slide end-->
                        <!-- swiper-slide-->
                        <div class="swiper-slide">
                            <div class="bg"  data-bg="images/bg/data_center.jpg" data-swiper-parallax="20%"></div>
                            <div class="overlay"></div>
                        </div>
                        <!-- swiper-slide end-->
                        <!-- swiper-slide-->
                        <div class="swiper-slide">
                            <div class="bg"  data-bg="images/bg/festival.jpg" data-swiper-parallax="20%"></div>
                            <div class="overlay"></div>
                        </div>
                        <!-- swiper-slide end-->
                    </div>
                </div>
                <div class="hero-corner-dec"></div>
                <div class="hero-corner-dec2"></div>
            </div>
            <!-- hero-slider-img  end-->
            <!-- slider-controls -->
            <div class="slider-progress-bar">
                <span>
                    <svg class="circ" width="50" height="50">
                        <circle class="circ2" cx="25" cy="25" r="23" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none"/>
                        <circle class="circ1" cx="25" cy="25" r="23" stroke="#fff" stroke-width="2" fill="none"/>
                    </svg>
                </span>
            </div>
            <div class="clone-counter">
                <div class="current">01</div>
            </div>
            <div class="swiper-counter hs_counter">
                <div class="current">01</div>
                <div class="total"></div>
            </div>
            <div class="hero-slider_control-wrap">
                <div class="hsc hsc-prev"><span><i class="fal fa-angle-left"></i></span> </div>
                <div class="hsc hsc-next"><span><i class="fal fa-angle-right"></i></span></div>
            </div>
            <!-- slider-controls end-->
            <a href="about.html" class="ajax start-btn"><span> Start explore <i class="fal fa-long-arrow-right"></i></span></a>
            <div class="play-pause_slider hsc_pp auto_actslider"><i class="fas fa-play"></i></div>
        </div>
        <!-- hero-container end-->
        <div class="hero-decor-numb"><span>40.7143528  </span><span>-74.0059731 </span> <a href="https://www.google.com.ua/maps/" target="_blank" class="hero-decor-numb-tooltip">Based In NewYork</a></div>
        <div class="hero-slider-wrap_pagination"></div>
        <div class="hero-scroll-down-notifer">
            <div class="scroll-down-wrap ">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
            </div>
            <i class="far fa-angle-down"></i>
        </div>
    </div>
</div>
    @endsection