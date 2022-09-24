<div>
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
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row" style="display: flex;align-items: center">
                                        <div class="col-md-6">
                                            <h4>All Service Categories</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.add.service.categories') }}"
                                                class="btn btn-info pull-right">
                                                Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="categories" class="table  table-striped">
                                        <thead>
                                            <td>#</td>
                                            <td>image</td>
                                            <td>name</td>
                                            <td>slug</td>
                                            <td>Actions</td>
                                        </thead>
                                        <tbody>
                                            @foreach ($serviceCategories as $serviceCategory)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src="{{ asset('images/categories/' . $serviceCategory->image) }}"
                                                            alt=""></td>
                                                    <td>{{ $serviceCategory->name }}</td>
                                                    <td>{{ $serviceCategory->slug }}</td>
                                                    <td style="display: flex;justify-content: space-evenly;">
                                                        <a
                                                            href="{{ route('admin.services_by_category', $serviceCategory->slug) }}" title="Display Category's Services">
                                                            <i class="fa fa-eye text-warning"></i>
                                                        </a>
                                                        <a
                                                            href="{{ route('admin.edit.service.categories', $serviceCategory->id) }}">
                                                            <i class="fas fa-edit text-success"></i>
                                                        </a>
                                                        <a href="#"
                                                            wire:click.prevent="deleteServiceCategory({{ $serviceCategory->id }})"
                                                            onclick="confirm('Are You Sure, You Want to Delete This Service Category') || event.stopImmediatePropagation()">
                                                            <i class="fa fa-trash-alt text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            var table = $('#categories').DataTable();
        });
    </script>
@endsection
