<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>All Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>All Services</li>
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
                                            <a href="{{ route('admin.add.service') }}" class="btn btn-info pull-right">
                                                Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="services" class="table  table-striped">
                                        <thead>
                                            <td>#</td>
                                            <td>image</td>
                                            <td>name</td>
                                            <td>price</td>
                                            <td>status</td>
                                            <td>Featured</td>
                                            <td>category</td>
                                            <td>created at</td>
                                            <td>Actions</td>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/services/thumbnails/' . $service->thumbnail) }}"
                                                            alt="" width="170px" class="img img-thumbnail">
                                                    </td>
                                                    <td>{{ $service->name }}</td>
                                                    <td>{{ $service->price }}</td>
                                                    <td>{{ $service->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                    <td>{{ $service->featured == '1' ? 'Yes' : 'No' }}</td>
                                                    <td>{{ $service->category->name }}</td>
                                                    <td>{{ $service->created_at }}</td>
                                                    <td style="display: flex;justify-content: space-evenly;">
                                                        <a href="{{ route('admin.edit.service', $service->slug) }}">
                                                            <i class="fa fa-edit text-success"></i>
                                                        </a>
                                                        <a href="#"
                                                            wire:click.prevent="deleteService({{ $service->id }})"
                                                            onclick="confirm('Are You Sure, You Want to Delete This Service') || event.stopImmediatePropagation()">
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
            var table = $('#services').DataTable();
        });
    </script>
@endsection
