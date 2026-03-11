@extends('layouts.app')

@section('content')
                <div class="content"  data-pagetitle="What We Do">
                    <div class="page-scroll-nav">
                        <nav class="scroll-init page-scroll-nav_wrap">
                            <ul class="no-list-style init_hidden_filter">
                              
                            </ul>
                            <div class="psn_button act-filter"><i class="fal fa-sort"></i> FIlter </div>
                        </nav>
                    </div>
                    <div class="hero-section-dec color-bg">
                        <div class="progress-indicator">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="-1 -1 34 34">
                                <circle cx="16" cy="16" r="15.9155"
                                    class="progress-bar__background" />
                                <circle cx="16" cy="16" r="15.9155"
                                    class="progress-bar__progress 
                                    js-progress-bar" />
                            </svg>
                        </div>
                    </div>
                    <div class="fixed-column-wrap">
                        <div class="pr-bg"></div>
                        <div class="fixed-column-wrap-content">
                            <div class="slideshow-container">
                                <div class="slideshow-container_wrap fl-wrap full-height">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="ms-item_fs fl-wrap">
                                                    <div class="bg par-elem"  data-bg="{{ asset('images/bg/festival.jpg') }}"  ></div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide ">
                                                <div class="ms-item_fs fl-wrap">
                                                    <div class="bg par-elem"  data-bg="{{ asset('images/bg/festival.jpg') }}"></div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ms-item_fs fl-wrap">
                                                    <div class="bg par-elem"  data-bg="{{ asset('images/bg/festival.jpg') }}"></div>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay"></div>
                            <div class="progress-bar-wrap bot-element">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="fixed-column-wrap_title first-tile_load">
                                <h2>What We Do <br> SK Technology</h2>
                            </div>
                            <div class="fixed-column-dec"></div>
                            <div class="scroll-notifer">Scroll Down  </div>
                            <div class="section-counter">
                                <div class="sc_current"><span>01</span></div>
                                <div class="sc_total"></div>
                            </div>
                            <div class="fcwc-pagination fcwc-wrap"></div>
                        </div>
                        </div>
                    <div class="column-wrap">
                        <div class="column-wrap-container fl-wrap">
                            <div class="col-wc_dec"></div>
                      
                            <div class="section-separator fl-wrap"><span></span></div>
                            <section class="scroll_sec" id="sec2">
                                <div class="container">
                                    <div class="section-title">
                                        <h3>Services Provided</h3>
                                    </div>
                                    <div class="process-wrap fl-wrap">
                                        <div class="row">
                                            <div class=" col-sm-6">
                                                <div class="process-details">
                                                    <span class="pd-icon">
                                                    <i class="fal fa-desktop"></i>
                                                    </span>
                                                    <h4>IT Consulting</h4>
                                                    <div class="clearfix"></div>
                                                    <p>We analyze business and operational needs to design practical, results-oriented digital transformation roadmaps.</p>
                                                    <span class="process-numder">01.</span>
                                                    
                                                </div>
                                            </div>
                                            <div class=" col-sm-6">
                                                <div class="process-details">
                                                    <span class="pd-icon">
                                                    <i class="fab fa-pagelines"></i>
                                                    </span>
                                                    <h4>Software Development</h4>
                                                    <div class="clearfix"></div>
                                                    <p>Custom-built applications and platforms designed for scalability, performance, and long-term sustainability.</p>
                                                    <span class="process-numder">02.</span>
                                                   
                                                </div>
                                            </div>
                                            <div class=" col-sm-6">
                                                <div class="process-details">
                                                    <span class="pd-icon">
                                                    <i class="fal fa-mobile-android"></i>
                                                    </span>
                                                    <h4>Network Solutions</h4>
                                                    <div class="clearfix"></div>
                                                    <p>Reliable and secure network infrastructure to support seamless business and government operations.</p>
                                                    <span class="process-numder">03.</span>
                                                   
                                                </div>
                                            </div>
                                            <div class=" col-sm-6">
                                                <div class="process-details">
                                                    <span class="pd-icon">
                                                    <i class="fal fa-camera-alt"></i>
                                                    </span>
                                                    <h4>Cloud Services</h4>
                                                    <div class="clearfix"></div>
                                                    <p>Private and hybrid cloud solutions that enhance flexibility, system performance, and operational efficiency.</p>
                                                    <span class="process-numder">04.</span>
                                                   
                                                </div>
                                            </div>

                                             <div class=" col-sm-6">
                                                <div class="process-details">
                                                    <span class="pd-icon">
                                                    <i class="fal fa-camera-alt"></i>
                                                    </span>
                                                    <h4>Cyber Security</h4>
                                                    <div class="clearfix"></div>
                                                    <p>PComprehensive security frameworks to protect systems, infrastructure, and sensitive data from evolving cyber threats.</p>
                                                    <span class="process-numder">05.</span>
                                                    
                                                </div>
                                            </div>
                                            <div class=" col-sm-6">
                                                <div class="process-details">
                                                    <span class="pd-icon">
                                                    <i class="fal fa-camera-alt"></i>
                                                    </span>
                                                    <h4>Data Center & IDC</h4>
                                                    <div class="clearfix"></div>
                                                    <p>Design, implementation, and management of scalable Internet Data Center (IDC) environments.</p>
                                                    <span class="process-numder">06.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="section-number"> <span>0</span>2. </div>
                            </section>
                            <div class="section-separator fl-wrap"><span></span></div>
                          
                                   
                        </div>
                        </div>
                    <div class="to-top-btn to-top"><i class="fal fa-long-arrow-up"></i></div>
                </div>
                @endsection