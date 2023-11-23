@if (count($sliders) > 0)
    @php
        $sliders->loadMissing('metadata');
        $slick = [
            'autoplay'       => ($shortcode->is_autoplay ?: 'yes') == 'yes',
            'infinite'       => ($shortcode->is_autoplay ?: 'yes') == 'yes',
            'autoplaySpeed'  => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 5000,
            'speed'          => 1000,
            'slidesToShow'   => 1,
            'slidesToScroll' => 1,
            'appendArrows'   => '.arrows-wrapper',
            'appendDots'     => '.dots-wrapper',
            'fade'           => true,
        ];
        
        $baseURL = env('APP_URL');
    @endphp
    
    <div class="section-content section-content__slider lazyload"
         @if ($shortcode->background) data-bg="{{ RvMedia::getImageUrl($shortcode->background) }}" @endif>
        <div class="container-xxxl">
            <div class="row gx-0 gx-md-4">
                <div class="col-md-4">
                    <div class="section-banner-wrapper my-3">
                        <div class="banner-medium" style="padding-top: 10vw;">
                            <div class="banner-item__image"> 
                                <strong><h1 class="header-text" > New Technology in Your Hands </h1> </strong> 
                                <h4 class="header-text1">Premium Collection!</h4>
                                <br> <br>
                                <button class="shop_now">Learn More </button>   
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="@if (is_plugin_active('ads') && $shortcode->ads) col-md-8 @else col-md-12 @endif" style="width: 60%;">
                    <div class="section-slides-wrapper my-3">
                        <div class="slide-body slick-slides-carousel" data-slick="{{ json_encode($slick) }}">
                            @foreach($sliders as $slider)
                                <div class="slide-item">
                                    <div class="slide-item__image">
                                        @if ($slider->link)
                                            <a href="{{ url($slider->link) }}"> @endif
                                                @php
                                                    $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
                                                    $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                                                @endphp
                                                <picture>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 1200px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 768px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($mobileImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(max-width: 767px)"/>
                                                    <img src="{{ image_placeholder($slider->image) }}"
                                                         alt="{{ $slider->title }}"/>
                                                </picture>
                                            @if ($slider->link) </a>
                                        @endif
                                        <!-- Dynamic Text and Button -->
                                        <!--<div class="slide-content">
                                            <div class="text">
                                                <strong>
                                                    <h1>JBL Headphones</h1>
                                                </strong>
                                                <h4 style="font-weight: bold; font-size:1.2rem;">Quantum 900</h4>
                                            </div>
                                            <div class="button">
                                                <button class="shop_now">Dhs. 299</button>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="arrows-wrapper">
                            <button (click)="this.Slides.slidePrev()" class="backBtn"> 
                                <ion-icon name="arrow-back"></ion-icon> 
                            </button>
                            <button (click)="this.Slides.slideNext()" class="nextBtn"> 
                                <ion-icon name="arrow-forward"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
                
                        
                </div>
                @if (is_plugin_active('ads') && $shortcode->ads)        
                
                <div class="carousel-container">
                    <div class="carousel-slide active">
                        <img src="<?php echo $baseURL; ?>storage/hd-wallpaper-xiaomi-android-mobile-phone-2019-thumbnail.jpg" alt="Image 1">
                        <div class="caption">
                            <h3>Mobile Phones</h3>
                            <a href="<?php echo $baseURL; ?>product-categories/mobile">
                            <button class="shop_now1">Shop Now</button>
                        </a>
                        </div>
                    </div>
                    <div class="carousel-slide">
                        <img src="<?php echo $baseURL; ?>storage/pexels-cottonbro-studio-6686442.jpg" alt="Image 2">
                        <div class="caption">
                            <h3>Head Phones</h3>
                            <a href="<?php echo $baseURL; ?>product-categories/head-phone">
                            <button class="shop_now1">Shop Now</button>
                        </a>
                        </div>
                    </div>
                    <div class="carousel-slide">
                        <img src="<?php echo $baseURL; ?>storage/pexels-torsten-dettlaff-437038.jpg" alt="Image 3">
                        <div class="caption">
                            <h3>Smart Watches</h3>
                            <a href="<?php echo $baseURL; ?>product-categories/smart-watches">
                            <button class="shop_now1">Shop Now</button>
                        </a>
                        </div>
                    </div>
                    <div class="carousel-slide">
                        <img src="<?php echo $baseURL; ?>storage/pexels-spencer-selover-706136.jpg" alt="Image 3">
                        <div class="caption">
                            <h3>Speaker</h3>
                            <a href="<?php echo $baseURL; ?>product-categories/speaker">
                            <button class="shop_now1">Shop Now</button>
                        </a>
                        </div>
                    </div>
                    <button class="carousel-prev" id="prevBtn">&lt;</button>
                    <button class="carousel-next" id="nextBtn">&gt;</button>
                </div>
            
                
                <div class="section">
                    <div class="square square1" style="background-color: azure">
                        <div class="overlay">
                            <a href="<?php echo $baseURL; ?>product-categories/mobile">
                                <img src="<?php echo $baseURL; ?>storage/bedad1cb7f7e3ce5ad4b228da2b97c0d.jpg" alt="Mobile Icon">
                            <h1 class="square-heading">Head Phones</h1>
                            <p class="square-content">Premium Collection</p></a>
                        </div>

                    </div>
                    <div class="square square2" style="background-color: azure">
                        <div class="overlay">
                            <a href="<?php echo $baseURL; ?>product-categories/smart-watches">
                                <img src="<?php echo $baseURL; ?>storage/download-1.jpeg" alt="Mobile Icon">
                                <h1 class="square-heading">Smart Watches</h1>
                            <p class="square-content">Premium Collection</p>
                        </a></div>

                    </div>
                </div>
                <br>
                <br>
                <div>
                    <h1 class="category-heading1"> Category </h1>
                </div>
                <div class="card-container-98" style="margin-top: 15vh;">
                    <div class="card-98 active" id="card-category1" onclick="showImages('category1')">
                        <div class="card-content-98">
                            <img src="<?php echo $baseURL; ?>storage/general/191.png" alt="Mobile Icon">
                            <p>Phone</p>
                        </div>
                    </div>
                    <div class="card-98" onclick="showImages('category2')">
                        <div class="card-content-98">
                            <img src="<?php echo $baseURL; ?>storage/general/touchscreen.png" alt="Mobile Icon">
                            <p>Smartwatches</p>
                        </div>
                    </div>
                    <div class="card-98" onclick="showImages('category3')">
                        <div class="card-content-98">
                            <img src="<?php echo $baseURL; ?>storage/general/audio-speaker.png" alt="Mobile Icon">
                            <p>Speakers</p>
                        </div>
                    </div>
                    <div class="card-98" onclick="showImages('category4')">
                        <div class="card-content-98">
                            <img src="<?php echo $baseURL; ?>storage/general/icons8-headphones-80.png" alt="Mobile Icon">
                            <p>Head Phones</p>
                        </div>
                    </div>
                </div>
                <div id="squaresDiv-category1" class="squares8x8">
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/a.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                    </div>
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/a.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                    </div>
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/e.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                    </div>
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/d.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                    </div>
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/f.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                    </div>
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/h.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                    </div>
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/6.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                    </div>
                    <div class="square8x8" id="square1">
                        <a href="page1.html" target="_blank">
                            <img src="<?php echo $baseURL; ?>storage/3.png" alt="Image 1">
                            <div class="info">
                                <h3>Title 1</h3>
                                <p>Description 1</p>
                                <button class="arrow">View Detail &#10148;</button>
                            </div>
                        </a>
                        
                    </div>
                    <!-- Repeat similar structure for other squares -->
                </div>
                <div id="squaresDiv-category2" class="squares8x8" style="display: none;">
                    <!-- ... squares for category 2 ... -->
                </div>
                <div id="squaresDiv-category3" class="squares8x8" style="display: none;">
                    <!-- ... squares for category 3 ... -->
                </div>
                <div id="squaresDiv-category4" class="squares8x8" style="display: none;">
                    <!-- ... squares for category 4 ... -->
                </div>
                <!--<div id="image-container" class="hidden">

                </div>-->
                <div class="centered-button-container3">
                  <a href="<?php echo $baseURL; ?>products">  <button class="view-all-products-button3">Show all Products</button></a>
                </div>
                
                <div class="black-section">
                    <div class="text-center-left">
                        <h2 class="black-section-half">Stay Updated <br> with </h2>
                        <h2 class="black-section-half2"style="">cellphonedaily</h2>

                    </div>
                    <div class="text-center-right">
                        <p class="black-section-half3" >we just want you to get the most out of your digital life, <br>and we'll go to any lengths to make that happen. <br>Serious is the only language we know.</p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="white-bordered-div-1">
                                    <div class="content1">
                                        <img src="<?php echo $baseURL; ?>storage/q.png" alt="Support Icon">
                                        
                                        <h3>Trusted Platform</h3>
                                        <p>
                                            We provide differentiated service for
                                            mobility products.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="white-bordered-div-2">
                                    <div class="content1">
                                        <img src="<?php echo $baseURL; ?>storage/w.png" alt="Support Icon">
                                        
                                        <h3>Many Discounts
                                            </h3>
                                        <p>We continuously innovate to be the
                                            best destination for our customers
                                            and partners.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="white-bordered-div-3">
                                    <div class="content1">
                                        <img src="<?php echo $baseURL; ?>storage/screenshot-2023-10-22-132258.png" alt="Support Icon">
                                       
                                        <h3>24/7 Support</h3>
                                        <p>
                                            We want to turn connections into
                                            conversations and transactions into
                                            relationships</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <div class="app-download-section" style="width: 100vw!important;">
                    <strong><p class="app-download-text">Download our new app today! Don't miss our mobile-only offers and shop with Android only</p></strong>
                </div>
                <div class="side-by-side-container1">
                    <div class="left-div1">
                        <a href="<?php echo $baseURL; ?>products/xiaomi-redmi-note-11-pro-plus-dual-sim"> <h3 class="subtitle1">MAY PROMO</h3> </a>
                        <a href="<?php echo $baseURL; ?>products/xiaomi-redmi-note-11-pro-plus-dual-sim"><h2 class="title1">JBL Harman Kardon Speaker &nbsp;&nbsp; ONYX Studio 7</h2></a>
                        <div class="paragraph1-container">
                        <p class="paragraph1">General Specifications<br>
                            TransducersWoofer 1 x 120mm, Tweeter 2 x 25mm<br>
                            Rated output power50 W RMS<br>
                            Power supply19 V / 2 A<br>
                            Frequency response50 Hz-<br>
                            20 kHz (-6dB) ....</p>
                      <a href="<?php echo $baseURL; ?>products/xiaomi-redmi-note-11-pro-plus-dual-sim">  <button class="button1">Dhs 899</button></a>
                    </div>
                    </div>
                    <div class="right-div1">
                        <a href="<?php echo $baseURL; ?>products/xiaomi-redmi-note-11-pro-plus-dual-sim"> <img src="<?php echo $baseURL; ?>storage/e.png" alt="Image"></a>
                        <div class="discount-text1"><strong>10%</strong> <br>OFF</div>
                    </div>
                </div>
                <div class="unique-featured-brands">
                    <h2 class="unique-featured-brands-heading">Featured Brands</h2>
                    <div class="unique-brand-container">
                        <a href="<?php echo $baseURL; ?>brands/jbl"><img src="<?php echo $baseURL; ?>storage/brands/jbl-logo-4dfd3fca95-seeklogocom.png" alt="Brand 1" class="unique-brand-image"></a>
                        <a href="<?php echo $baseURL; ?>brands/xiaomi"><img src="<?php echo $baseURL; ?>storage/brands/xiaomi-logo-768x432.png" alt="Brand 2" class="unique-brand-image"></a>
                        <a href="<?php echo $baseURL; ?>brands/apple"><img src="<?php echo $baseURL; ?>storage/brands/apple-logo-6-1024x1024.png" alt="Brand 3" class="unique-brand-image"></a>
                        <a href="<?php echo $baseURL; ?>brands/samsung"><img src="<?php echo $baseURL; ?>storage/brands/samsung-logo-2.png" alt="Brand 4" class="unique-brand-image"></a>
                        <a href="<?php echo $baseURL; ?>brands/fitbit"><img src="<?php echo $baseURL; ?>storage/brands/fitbit-logo-png-transparent.png" alt="Brand 5" class="unique-brand-image"></a>
                        <a href="<?php echo $baseURL; ?>brands/bose"><img src="<?php echo $baseURL; ?>storage/brands/bose-logo.png" alt="Brand 6" class="unique-brand-image"></a>
                        <a href="<?php echo $baseURL; ?>brands/vivo"><img src="<?php echo $baseURL; ?>storage/brands/vivo-logo-1.png" alt="Brand 6" class="unique-brand-image"></a>
                    </div>
                </div>
                
                <div class="black-section-1675">
                    <div class="left-div-1675">
                        <h2 class="flash-sale">Flash Sale</h2>
                        <p class="clock-sale">Sale ends in</p>
                        <div id="countdown-clock">
                            <div class="time-box">
                                <span id="hours">24</span>
                                <span>Hrs</span>
                            </div>
                            <div class="time-box">
                                <span id="minutes">00</span>
                                <span>Min</span>
                            </div>
                            <div class="time-box">
                                <span id="seconds">00</span>
                                <span>Sec</span>
                            </div>
                        </div>
                        <h5 id="subtitle-1965" >Everyday Discount upto <br> 30% Off</h5>
                        <p class="sale-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="shop_now11">Shop Now </button>  
                    </div>
                    <div class="right-div-16751" id="right-div-16751">
                        <div class="sales-tag">20% off</div>
                        <img src="<?php echo $baseURL; ?>storage/h.png" alt="Product Image">
                        <h3 style="font-size:1.1rem;">Samsung Galaxy <br> Buds 2 Pro</h3>
                        <p>
                            <span style="color: white; text-decoration:line-through; font-size:0.9rem">Dhs. 800</span>
                            <span style="color: #FCD927;font-size:0.9rem; font-weight:bold"> - Dhs. 749</span>
                          </p>
                          <div class="progress-container">
                            <span class="progress-label1">Available: 10</span>
                            <div class="progress-bar">
                              <div class="progress-bar-inner"></div>
                            </div>
                            <span class="progress-label2" >Sold: 12 </span>
                          </div>
                    </div>
                    
                    <div class="right-div-16752" id="right-div-16752">
                        <div class="sales-tag">20% off</div>
                        <img src="<?php echo $baseURL; ?>storage/6.png" alt="Product Image">
                        <h3 style="font-size:1.1rem;">VIVO V23E 8GB 128GB <br>
                            DUAL SIM 5G</h3>
                        <p>
                            <span style="color: white; text-decoration:line-through; font-size:0.9rem">Dhs. 1,455</span>
                            <span style="color: #FCD927;font-size:0.9rem; font-weight:bold"> - Dhs. 1,399</span>
                          </p>
                          <div class="progress-container">
                            <span class="progress-label1"">Available: 8</span>
                            <div class="progress-bar">
                              <div class="progress-bar-inner"></div>
                            </div>
                            <span class="progress-label2">Sold: 15 </span>
                          </div>
                    </div>
                    
                    <div class="right-div-16753" id="right-div-16753">
                        <div class="sales-tag">20% off</div>
                        <img src="<?php echo $baseURL; ?>storage/5.png" alt="Product Image">
                        <h3 style="font-size:1.1rem;">Apple Homepod Mini <br>
                            Smart Speaker</h3>
                        <p>
                            <span style="color: white; text-decoration:line-through; font-size:0.9rem">Dhs. 500</span>
                            <span style="color: #FCD927;font-size:0.9rem; font-weight:bold"> - Dhs. 469</span>
                          </p>
                          <div class="progress-container">
                            <span class="progress-label1">Available: 20</span>
                            <div class="progress-bar" >
                              <div class="progress-bar-inner"></div>
                            </div>
                            <span class="progress-label2" >Sold: 5 </span>
                          </div>
                          
                    </div>
                    
                </div>
                
                <div class="unique-container-232323232">
                    <div class="small-heading-232323232">New Products</div>
                    <div class="large-heading-232323232">Popular Products</div>
                    <div class="clickable-headings-232323232">
                        <div class="clickable-heading-232323232" onclick="showDiv('recentArrival232323232')">RECENT ARRIVAL</div>
                        <div class="clickable-heading-232323232" onclick="showDiv('bestSeller232323232')">BEST SELLER</div>
                    </div>
                    <div id="recentArrival232323232" class="content-div">
                        <div class="grid-container">
                         <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                             <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                             <div class="product-details">
                                 <h3>XIAOMI REDMI
                                     NOTE 11 PRO</h3>
                                 <div class="product-price">
                                     <span style="color:black;">Dhs. 1,299.00</span>
                                 </div>
                                 <div class="rating-container">
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                 </div>
                             </div>
                         </div></a></div>
                         <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                             <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                             <div class="product-details">
                                 <h3>XIAOMI REDMI
                                     NOTE 11 PRO</h3>
                                 <div class="product-price">
                                     <span style="color:black;">Dhs. 1,299.00</span>
                                 </div>
                                 <div class="rating-container">
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                     <span class="rating-star">★</span>
                                 </div>
                             </div>
                         </div></a></div>
                 <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                     <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                     <div class="product-details">
                         <h3>XIAOMI REDMI
                             NOTE 11 PRO</h3>
                         <div class="product-price">
                             <span style="color:black;">Dhs. 1,299.00</span>
                         </div>
                         <div class="rating-container">
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                         </div>
                     </div>
                 </div></a></div>
                 <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                     <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                     <div class="product-details">
                         <h3>XIAOMI REDMI
                             NOTE 11 PRO</h3>
                         <div class="product-price">
                             <span style="color:black;">Dhs. 1,299.00</span>
                         </div>
                         <div class="rating-container">
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                         </div>
                     </div>
                 </div></a></div>
                 <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                     <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                     <div class="product-details">
                         <h3>XIAOMI REDMI
                             NOTE 11 PRO</h3>
                         <div class="product-price">
                             <span style="color:black;">Dhs. 1,299.00</span>
                         </div>
                         <div class="rating-container">
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                         </div>
                     </div>
                 </div></a></div>
                 <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                     <img class="product-image" src="<?php echo $baseURL; ?>storage/4.png" alt="Product Image">
                     <div class="product-details">
                         <h3>Fitbit Charge 4 Fitness
                             tracker with Built-in GPS</h3>
                         <div class="product-price">
                             <span style="color:black;">Dhs. 699</span>
                         </div>
                         <div class="rating-container">
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                         </div>
                     </div>
                 </div></a></div>
                 <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                     <img class="product-image" src="<?php echo $baseURL; ?>storage/3.png" alt="Product Image">
                     <div class="product-details">
                         <h3>Samsung Galaxy Buds 2
                             Wireless Earphones</h3>
                         <div class="product-price">
                             <span style="color:black;">Dhs. 349</span>
                         </div>
                         <div class="rating-container">
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                         </div>
                     </div>
                 </div></a></div>
                 <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                     <img class="product-image" src="<?php echo $baseURL; ?>storage/aaa.png" alt="Product Image">
                     <div class="product-details">
                         <h3>JBL Partybox Portable
                             Bluetooth Party Speaker</h3>
                         <div class="product-price">
                             <span style="color:black;">Dhs. 3,399</span>
                         </div>
                         <div class="rating-container">
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                         </div>
                     </div>
                 </div></a></div>
                 <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                     <img class="product-image" src="<?php echo $baseURL; ?>storage/bbb.png" alt="Product Image">
                     <div class="product-details">
                         <h3>Fitbit Charge 4 Fitness
                             and Activity Tracker</h3>
                         <div class="product-price">
                             <span style="color:black;">Dhs. 699</span>
                         </div>
                         <div class="rating-container">
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                             <span class="rating-star">★</span>
                         </div>
                     </div>
                 </div></a></div>
             </div> 
                     </div>
                     <div id="bestSeller232323232" class="content-div" style="display: block;">
                         <div class="grid-container">
                             <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             <div class="grid-item" ondragover="allowDrop(event)" ondrop="drop(event)"><a href="#"><div class="right-div-1675312" id="right-div-1675312">
                                 <img class="product-image" src="<?php echo $baseURL; ?>storage/d.png" alt="Product Image">
                                 <div class="product-details">
                                     <h3>XIAOMI REDMI
                                         NOTE 11 PRO</h3>
                                     <div class="product-price">
                                         <span style="color:black;">Dhs. 1,299.00</span>
                                     </div>
                                     <div class="rating-container">
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                         <span class="rating-star">★</span>
                                     </div>
                                 </div>
                             </div></a></div>
                             
                 </div>
                     </div>
                     <div class="centered-button-container4">
                         <a href="<?php echo $baseURL; ?>products">  <button class="view-all-products-button3">Show all Products</button></a>
                       </div>
                 </div>
                
             @endif
            </div>
        </div>
        
@endif

<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var draggedElement = document.getElementById(data);
    draggedElement.style.display = "none";
    
    showMoreProducts(); // Show the next item when dropped
}

function showMoreProducts() {
    const gridItems = document.querySelectorAll('.content-div .grid-item');
    const increment = 1; // Number of items to show on each drop
    let startIndex = 0;

    for (let i = startIndex; i < startIndex + increment; i++) {
        if (gridItems[i] && gridItems[i].style.display !== "none") {
            gridItems[i].style.display = 'block';
        }
    }

    startIndex += increment;

    if (startIndex >= gridItems.length) {
        document.querySelector('.show-more-button-container').style.display = 'none';
    }
}


const cards = document.querySelectorAll('.card-98');

// Define a function to handle card clicks
function handleCardClick(card) {
  cards.forEach((c) => {
    // Remove 'active' class from all cards
    c.classList.remove('active');
  });

  // Add 'active' class to the clicked card
  card.classList.add('active');

  // Get the category from the card ID
  const category = card.id.split('-')[1];

  var allSquaresDivs = document.querySelectorAll('.squares8x8');

  allSquaresDivs.forEach(function(div) {
      div.style.opacity = '0';
      div.style.display = 'none';
  });

  var selectedSquaresDiv = document.getElementById('squaresDiv-' + category);
  if (selectedSquaresDiv) {
      selectedSquaresDiv.style.display = 'block';
      selectedSquaresDiv.style.opacity = '1';
  }
}

// Add click event listeners to all cards
cards.forEach((card) => {
  card.addEventListener('click', () => {
    handleCardClick(card);
  });
});

function showDiv(divId) {
            var divToShow = document.getElementById(divId);
            var divToHide = (divId === 'recentArrival232323232') ? document.getElementById('bestSeller232323232') : document.getElementById('recentArrival232323232');
            divToShow.style.display = "block";
            divToHide.style.display = "none";
        }

     

function updateProgress(sold, available, containerId) {
    const total = sold + available;
    const soldPercentage = (sold / total) * 100;
    const availablePercentage = (available / total) * 100;

    const progressBarInner = document.querySelector(`#${containerId} .progress-bar .progress-bar-inner`);
    progressBarInner.style.width = soldPercentage + '%';

    const soldLabel = document.querySelector(`#${containerId} .progress-container .progress-label2`);
    const availableLabel = document.querySelector(`#${containerId} .progress-container .progress-label1`);

    soldLabel.textContent = 'Sold: ' + sold;
    availableLabel.textContent = 'Available: ' + available;

    const progressContainer = document.querySelector(`#${containerId} .progress-bar`);
    progressContainer.style.background = `linear-gradient(to right, #FFD700 ${soldPercentage}%, #ccc ${availablePercentage}%)`;
}

// Example usage:

updateProgress(10, 12, 'right-div-16751');
updateProgress(8, 15, 'right-div-16752');
updateProgress(5, 20, 'right-div-16753');


document.addEventListener("DOMContentLoaded", function () {
            let currentSlide = 0;
            const slides = document.querySelectorAll(".carousel-slide");

            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                slides[index].classList.add('active');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

            showSlide(currentSlide);

            let carouselInterval = setInterval(nextSlide, 5000);

            document.querySelector(".carousel-container").addEventListener("mouseenter", function() {
                clearInterval(carouselInterval);
            });

            document.querySelector(".carousel-container").addEventListener("mouseleave", function() {
                carouselInterval = setInterval(nextSlide, 5000);
            });

            document.getElementById("prevBtn").addEventListener("click", prevSlide);
            document.getElementById("nextBtn").addEventListener("click", nextSlide);
        });


function startCountdown() {
    // Check if there's a stored end time
    var endTime = new Date(localStorage.getItem('endTime'));

    if (!endTime || endTime <= new Date()) {
        // Set the end time to 36 hours from now if it doesn't exist or has already passed
        endTime = new Date();
        endTime.setHours(endTime.getHours() + 36);

        // Store the end time
        localStorage.setItem('endTime', endTime);
    }

    function updateCountdown() {
        var now = new Date();
        var timeDifference = endTime - now;

        if (timeDifference <= 0) {
            // Reset the countdown to 36 hours if it reaches zero
            endTime = new Date();
            endTime.setHours(endTime.getHours() + 36);
            localStorage.setItem('endTime', endTime);
            return;
        }

        var hours = Math.floor(timeDifference / (1000 * 60 * 60));
        var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
        document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');
    }

    var countdownInterval = setInterval(updateCountdown, 1000);
    updateCountdown(); // Initial update to avoid delay
}

startCountdown();


</script>