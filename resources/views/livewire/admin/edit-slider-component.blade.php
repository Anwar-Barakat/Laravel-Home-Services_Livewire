<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Slide</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Edit Slide</li>
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
                                            Edit Slide
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.slider.index') }}"
                                                class="btn btn-info pull-right">All Slides</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" wire:submit.prevent="updateSlide">
                                        <div>
                                            @if ($newImage)
                                                <img src="{{ $newImage->temporaryUrl() }}" alt=""
                                                    class="img img-thumbnail m-auto mb-3 d-block">
                                                <br>
                                            @else
                                                <img src="{{ asset('images/slider/' . $image) }}" alt=""
                                                    class="img img-thumbnail m-auto mb-3 d-block">
                                                <br>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="title" class="control-label col-sm-3">Title</label>
                                            <div class="col-sm-9">
                                                <input id="title" class="form-control " type="text"
                                                    wire:model="title">
                                                @error('title')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="control-label col-sm-3">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="" wire:model="status">
                                                    <option value="" selected>Select..</option>
                                                    <option value="0" {{ $status == '0' ? 'selected' : '' }}>
                                                        Inactive</option>
                                                    <option value="1" {{ $status == '1' ? 'selected' : '' }}>Active
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="newImage" class="control-label col-sm-3">Image</label>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        wire:model="newImage">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                    @error('newImage')
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
                                                    <i class="fas fa-edit"></i> &nbsp; Update
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
