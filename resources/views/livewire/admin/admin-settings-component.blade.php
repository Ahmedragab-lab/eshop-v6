<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard1">
                    <h3>Add New Setting</h3>
                    {{-- <a href="{{ route('admin.section') }}" class="btn btn-primary mb-3">Add Settings</a> --}}
                    <section>
                       <form  wire:submit.prevent="store" autocomplete="off" >
                        <div class="form-group col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text"
                                    name="email" class="form-control @error('name') is-invalid @enderror  required"
                                    placeholder="Email"
                                    wire:model='email'
                                    >
                            @error('section_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">phone</label>
                            <input type="text" name="phone" class="form-control @error('name') is-invalid @enderror  required"
                                    placeholder="phone" wire:model='phone'>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">phone</label>
                            <input type="text" name="phone" class="form-control @error('name') is-invalid @enderror  required"
                                    placeholder="phone" wire:model='phone'>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">phone</label>
                            <input type="text" name="phone" class="form-control @error('name') is-invalid @enderror  required"
                                    placeholder="phone" wire:model='phone'>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">phone</label>
                            <input type="text" name="phone" class="form-control @error('name') is-invalid @enderror  required"
                                    placeholder="phone" wire:model='phone'>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">phone</label>
                            <input type="text" name="phone" class="form-control @error('name') is-invalid @enderror  required"
                                    placeholder="phone" wire:model='phone'>
                            @error('phone')
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
