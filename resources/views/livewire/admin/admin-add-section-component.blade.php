<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard1">
                    <h3>Add New Section</h3>
                    <a href="{{ route('admin.section') }}" class="btn btn-primary mb-3">All Sections</a>
                    <section>
                       <form  wire:submit.prevent="store" autocomplete="off" >
                        <div class="form-group col-md-6">
                            <label class="form-label">Section Name</label>
                            <input type="text"
                                    name="section_name" class="form-control @error('name') is-invalid @enderror  required"
                                    placeholder="Section Name"
                                    wire:model='section_name'
                                    wire:keyup='generateslug'>
                                    
                            @error('section_name')
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
                        <button type="submit" class="btn btn-success mt-3" >save</button>
                       </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
