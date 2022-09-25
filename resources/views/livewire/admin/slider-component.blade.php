<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>All Sliders</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>All Sliders</li>
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
                                            <h4>All Sliders</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.slider.create') }}"
                                                class="btn btn-info pull-right">
                                                Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="sliders" class="table  table-striped">
                                        <thead>
                                            <td>#</td>
                                            <td>image</td>
                                            <td>name</td>
                                            <td>status</td>
                                            <td>created at</td>
                                            <td>Actions</td>
                                        </thead>
                                        <tbody>
                                            @foreach ($slides as $slide)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/slider/' . $slide->image) }}"
                                                            alt="" width="170px" class="img img-thumbnail">
                                                    </td>
                                                    <td>{{ $slide->title }}</td>
                                                    <td>{{ $slide->status == 0 ? 'Inactive' : 'Active' }}</td>
                                                    <td>{{ $slide->created_at }}</td>
                                                    <td style="display: flex;justify-content: space-evenly;">
                                                        <a href="{{ route('admin.slider.edit', $slide->id) }}">
                                                            <i class="fa fa-edit text-success"></i>
                                                        </a>
                                                        <a href="#"
                                                            wire:click.prevent="delete({{ $slide->id }})"
                                                            onclick="confirm('Are You Sure, You Want to Delete This Slide') || event.stopImmediatePropagation()">
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
            var table = $('#sliders').DataTable();
        });
    </script>
@endsection
