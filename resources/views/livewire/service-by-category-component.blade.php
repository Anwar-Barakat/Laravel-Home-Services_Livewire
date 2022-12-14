<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{ $serviceCategory->name }} Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>{{ $serviceCategory->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="container">
            <div class="row" style="margin-top: -30px;">
                <div class="titles">
                    <h2>{{ $serviceCategory->name }} <span>Services</span></h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <div class="content_info" style="margin-top: -70px;">
            <div>
                <div class="container">
                    <div class="portfolioContainer">
                        @forelse ($serviceCategory->services as $service)
                            <div class="col-xs-12 col-sm-6 col-md-4 nature hsgrids"
                                style="padding-right: 5px;padding-left: 5px;">
                                <a class="g-list" href="{{ route('service-detail', $service->slug) }}">
                                    <div class="img-hover">
                                        <img src="{{ asset('images/services/thumbnails/' . $service->thumbnail) }}"
                                            alt="{{ $service->name }}" class="img-responsive" width="100%">
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{ $service->name }}</h3>
                                        <hr class="separator">
                                        <p>{{ $service->tagline }}</p>
                                        <div class="content-btn"><a href="{{ route('service-detail', $service->slug) }}"
                                                class="btn btn-primary">Book Now</a></div>
                                        <div class="price">
                                            <span>&#36;</span><b>From</b>{{ number_format($service->price, 2) }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <h2 class="text-center d-block" style="position: initial">No Result Found !!</h2>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
