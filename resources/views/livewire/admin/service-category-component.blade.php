<div>
    <x-master-layout>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Service Categories</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>/</li>
                            <li>Service Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer">
                            <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                            </div>
                            <div class="col-md-12 profile1" style="min-height: 300px;">
                                <table class="table table-responsive table-striped">
                                    <thead>
                                        <td>#</td>
                                        <td>image</td>
                                        <td>name</td>
                                        <td>slug</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($serviceCategories as $serviceCategory)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('images/categories/' . $serviceCategory->image) }}"
                                                        alt=""></td>
                                                <td>{{ $serviceCategory->name }}</td>
                                                <td>{{ $serviceCategory->slug }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $serviceCategories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-master-layout>

</div>
