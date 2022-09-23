<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Add Service</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Add Service</li>
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
                                            Add New Service
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.services.index') }}"
                                                class="btn btn-info pull-right">All Services</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" wire:submit.prevent="createNewService">
                                        <div
                                            style="    display: grid !important;grid-template-columns: repeat(auto-fill,minmax(230px,auto));gap: 0.5rem;">
                                            @if ($image)
                                                <img src="{{ $image->temporaryUrl() }}" alt=""
                                                    class="img img-thumbnail m-auto mb-3 d-block">
                                                <br>
                                            @endif
                                            @if ($thumbnail)
                                                <img src="{{ $thumbnail->temporaryUrl() }}" alt=""
                                                    class="img img-thumbnail m-auto mb-3 d-block">
                                                <br>
                                            @endif
                                        </div>
                                        <div class="form-group">

                                            <label for="name" class="control-label col-sm-3">Name</label>
                                            <div class="col-sm-9">
                                                <input id="name" class="form-control " type="text"
                                                    wire:model="name" wire:keyup="generateSlug">
                                                @error('name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Slug</label>
                                            <div class="col-sm-9">
                                                <input id="slug" class="form-control " type="text"
                                                    wire:model="slug">
                                                @error('slug')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tagline" class="control-label col-sm-3">Tagline</label>
                                            <div class="col-sm-9">
                                                <input id="tagline" class="form-control " type="text"
                                                    wire:model="tagline">
                                                @error('tagline')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="service_category_id" class="control-label col-sm-3">Service
                                                Category</label>
                                            <div class="col-sm-9">
                                                <select id="service_category_id" wire:model="service_category_id"
                                                    class="form-control">
                                                    <option value="" selected>Select..</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('service_category_id')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="control-label col-sm-3">Price</label>
                                            <div class="col-sm-9">
                                                <input id="price" class="form-control" type="text"
                                                    wire:model="price">
                                                @error('price')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount" class="control-label col-sm-3">Discount</label>
                                            <div class="col-sm-9">
                                                <input id="discount" class="form-control " type="number"
                                                    wire:model="discount">
                                                @error('discount')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount_type" class="control-label col-sm-3">Discount
                                                Type</label>
                                            <div class="col-sm-9">
                                                <select id="discount_type" wire:model="discount_type"
                                                    class="form-control">
                                                    <option value="" selected>Select..</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                                @error('discount_type')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label col-sm-3">Description</label>
                                            <div class="col-sm-9">
                                                <textarea wire:model="description" id="" cols="30" rows="5" class="form-control"></textarea>
                                                @error('description')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inclusion" class="control-label col-sm-3">Inclusion</label>
                                            <div class="col-sm-9">
                                                <textarea wire:model="inclusion" id="" cols="30" rows="5" class="form-control"></textarea>
                                                @error('inclusion')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exclusion" class="control-label col-sm-3">Exclusion</label>
                                            <div class="col-sm-9">
                                                <textarea wire:model="exclusion" id="" cols="30" rows="5" class="form-control"></textarea>
                                                @error('exclusion')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="thumbnail" class="control-label col-sm-3">Thumbnail</label>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        wire:model="thumbnail">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                    @error('thumbnail')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="control-label col-sm-3">Image</label>
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
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-plus"></i> &nbsp; Add
                                                </button>
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
