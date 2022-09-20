<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Add Service Category</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Add Service Category</li>
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
                        <div class="col-xs-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row" style="display: flex;align-items: center">
                                        <div class="col-md-6">
                                            Add New Service Category
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.service.categories') }}"
                                                class="btn btn-info pull-right">All Categories</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" wire:submit.prevent="createNewCategory">

                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" alt=""
                                                class="img img-thumbnail m-auto mb-3 d-block" width="100">
                                                <br>
                                        @endif
                                        <div class="form-group">

                                            <label for="name" class="control-label col-sm-3">Category
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input id="name" class="form-control " type="text"
                                                    wire:model="name" wire:keyup="generateSlug">
                                                @error('name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Category
                                                Slug</label>
                                            <div class="col-sm-9">
                                                <input id="name" class="form-control " type="text"
                                                    wire:model="slug">
                                                @error('slug')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Image</label>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        wire:model="image">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                    @error('image')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">&nbsp;</label>
                                            <div class="col-sm-9">
                                                <button class="btn btn-success" type="submit">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
