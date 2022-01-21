<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard1">
                    <h3>Edit Home Slider</h3>
                    <a href="{{ route('admin.homeslider') }}" class="btn btn-primary mb-3">Home Slider</a>
                    <section>
                       <form  wire:submit.prevent="update" autocomplete="off" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Title</label>
                                <input type="text"
                                        name="title" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="title"
                                        wire:model='title' >
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Subtitle</label>
                                <input type="text" name="subtitle" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="Subtitle" wire:model='subtitle'>
                                @error('subtitle')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="price" wire:model='price'>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Link</label>
                                <input type="text" name="link" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="http://www.xxx" wire:model='link'>
                                @error('link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Status</label>
                                <select name="status" id="" wire:model='status' class="form-control @error('name') is-invalid @enderror  required" >
                                    <option  readonly> --- choose status ---</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Image</label>
                                <input type="file" name="image"
                                       class="form-control  @error('name') is-invalid @enderror  required"
                                       accept="image/*"
                                       wire:model='newimage'>
                                  @if($newimage)
                                       <img src="{{ $newimage->temporaryUrl() }}" alt="" width="120" class="img-thumbnail" >
                                   @else
                                       <img src="{{ asset('assets/images/sliders') }}/{{ $image }}" alt="" width="120" class="img-thumbnail" >
                                   @endif
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-success mt-3" >save</button>
                            </div>
                        </div>
                       </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
