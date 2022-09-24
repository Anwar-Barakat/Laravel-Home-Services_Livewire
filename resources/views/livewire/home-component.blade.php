<div>
    <section class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"
                    data-title="Slide">
                    <img src="assets/img/slide/1.jpg" alt="fullslide1" data-bgposition="center center" data-kenburns="on"
                        data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100"
                        data-bgpositionend="right center">
                </li>
                <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="1000"
                    data-saveperformance="off" data-title="Slide">
                    <img src="assets/img/slide/2.jpg" alt="fullslide1" data-bgposition="top center" data-kenburns="on"
                        data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100"
                        data-bgpositionend="right center">
                </li>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div class="filter-title">
            <div class="title-header">
                <h2 style="color:#fff;">BOOK A SERVICE</h2>
                <p class="lead">Book a service at very affordable price, </p>
            </div>
            <div class="filter-header">
                <form id="sform" action="searchservices" method="post">
                    <input type="text" id="q" name="q" required="required"
                        placeholder="What Services do you want?" class="input-large typeahead" autocomplete="off">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
    </section>
    <section class="content-central">
        <div class="content_info content_resalt">
            <div class="container" style="margin-top: 40px;">
                <div class="row">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="sponsors" class="tooltip-hover">
                            @foreach ($categories as $category)
                                <li data-toggle="tooltip" title="" data-original-title="{{ $category->name }}"> <a
                                        href="{{ route('services_by_category', $category->slug) }}"><img
                                            src="{{ asset('images/categories/' . $category->image) }}"
                                            alt="{{ $category->name }}"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="semiboxshadow text-center">
            <img src="assets/img/img-theme/shp.png" class="img-responsive" alt="">
        </div>
        <div class="content_info">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <h2>SurfsideMedia <span>Choice</span> of Services</h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                    <div class="portfolioContainer" style="margin-top: -50px;">
                        @foreach ($featuredServices as $service)
                            <div class="col-lg-4 col-sm-3 col-md-6 hsgrids"
                                style="padding-right: 5px;padding-left: 5px;">
                                <a class="g-list" href="{{ route('service-detail', $service->slug) }}">
                                    <div class="img-hover">
                                        <img src="{{ asset('images/services/thumbnails/' . $service->thumbnail) }}"
                                            alt="{{ $service->name }}" class="img-responsive" width="100%">
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{ $service->name }}</h3>
                                        <hr class="separator">
                                        <p>{{ $service->name }}</p>
                                        <div class="content-btn"><a href="{{ route('service-detail', $service->slug) }}"
                                                class="btn btn-primary">Book Now</a></div>
                                        <div class="price"><span>&#36;</span><b>From</b>{{ $service->price }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="content_info">
            <div class="bg-dark color-white border-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="services-lines-info">
                                <h2>WELCOME TO DIVERSIFIED</h2>
                                <p class="lead">
                                    Book best services at one place.
                                    <span class="line"></span>
                                </p>

                                <p>Find a wide variety of home services.</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="services-lines">
                                @foreach ($serviceCategories as $category)
                                    <li>
                                        <a href="{{ route('services_by_category', $category->slug) }}">
                                            <div class="item-service-line">
                                                <img class="icon-img"
                                                    src="{{ asset('images/categories/' . $category->image) }}">
                                                <h5>{{ $category->name }}</h5>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="titles">
                        <h2><span>Appliance</span>Services</h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div id="boxes-carousel">
                @foreach ($aservices as $service)
                    <div>
                        <a class="g-list" href="{{ route('service-detail', $service->slug) }}">
                            <div class="img-hover">
                                <img src="{{ asset('images/services/thumbnails/' . $service->thumbnail) }}"
                                    alt="" class="img-responsive">
                            </div>

                            <div class="info-gallery">
                                <h3>{{ $service->name }}</h3>
                                <hr class="separator">
                                <p>{{ $service->name }}</p>
                                <div class="content-btn"><a href="{{ route('service-detail', $service->slug) }}"
                                        class="btn btn-primary">Book Now</a></div>
                                <div class="price"><span>&#36;</span><b>From</b>{{ $service->price }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
