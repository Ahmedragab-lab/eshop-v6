<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard1">
                    <h3>Edit Coupon</h3>
                    <a href="{{ route('admin.coupon') }}" class="btn btn-primary mb-3">All coupons</a>
                    <section>
                       <form  wire:submit.prevent="update" autocomplete="off" >
                            <div class="row">
                             <div class="form-group col-md-4">
                                <label class="form-label">Coupon Code</label>
                                <input type="text"
                                        name="code" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="coupon Code"
                                        wire:model='code' >
                                @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label">Type</label>
                                    <select name="type" id="" wire:model='type' class="form-control @error('name') is-invalid @enderror  required" >
                                        <option  readonly> --- choose type ---</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Value</label>
                                <input type="text" name="value" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="Enter Value" wire:model='value'>
                                @error('value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           </div>
                           <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Cart Value</label>
                                <input type="text" name="cart_value" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="Enter Cart Value" wire:model='cart_value'>
                                @error('cart_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           </div>
                           <button type="submit" class="btn btn-success mt-3" >save</button>
                       </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
