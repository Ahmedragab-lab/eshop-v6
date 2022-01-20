<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard1">
                    <h3>Edit Product</h3>
                    <a href="{{ route('admin.product') }}" class="btn btn-primary mb-3">All Products</a>
                    <section>
                       <form  wire:submit.prevent="update" autocomplete="off" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Section Name</label>
                                <select name="section_id" id="" wire:model='section_id' class="form-control @error('name') is-invalid @enderror  required">
                                    <option  readonly> --- choose section ---</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                                @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Product Name</label>
                                <input type="text"
                                        name="product_name" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="Product Name"
                                        wire:model='product_name'
                                        wire:keyup='generateslug' >
                                @error('product_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="Slug" wire:model='slug'>
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Description</label>
                                <textarea name="desc"
                                          class="form-control @error('name') is-invalid @enderror  required"
                                          placeholder="description"
                                          wire:model='desc'>
                                </textarea>
                                @error('desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Small Description</label>
                                <textarea name="small_desc"
                                          class="form-control @error('name') is-invalid @enderror  required"
                                          placeholder="short description"
                                          wire:model='small_desc'>
                                </textarea>
                                @error('small_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Original Price</label>
                                <input type="number" name="original_price" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="original_price" wire:model='original_price'>
                                @error('original_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Selling Price</label>
                                <input type="number" name="selling_price" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="selling_price" wire:model='selling_price'>
                                @error('selling_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">SKU</label>
                                <input type="text" name="sku" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="sku" wire:model='sku'>
                                @error('sku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Stock</label>
                                <select name="stock" id="" wire:model='stock' class="form-control @error('name') is-invalid @enderror  required" >
                                    <option  readonly> --- choose stock ---</option>
                                    <option value="instock">In stock</option>
                                    <option value="outofstock">Out of stock</option>
                                </select>
                                @error('stock')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Featured</label>
                                <select name="feature" id="" wire:model='feature' class="form-control @error('name') is-invalid @enderror  required" >
                                    <option  readonly> --- choose feature ---</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('feature')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="qty" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="qty" wire:model='qty'>
                                @error('qty')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Product Image</label>
                                <input type="file" name="image"
                                       class="form-control  @error('name') is-invalid @enderror  required"
                                       accept="image/*"
                                       wire:model='newimage'>
                                {{-- <img src="{{ asset('assets/images/products/default.jpg') }}" class="img-thumbnail img-preview" width="100" alt="no photo"> --}}
                                @if($newimage)
                                    <img src="{{ $newimage->temporaryUrl() }}" alt="" width="120" class="img-thumbnail" >
                                @else
                                    <img src="{{ asset('assets/images/products') }}/{{ $image }}" alt="" width="120" class="img-thumbnail" >
                                @endif
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-success mt-3" >Update</button>
                            </div>
                        </div>
                       </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
