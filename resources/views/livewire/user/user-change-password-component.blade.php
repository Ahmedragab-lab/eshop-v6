<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                   Change Password
               </div>

               <div class="panel-body">
                   @if (session()->has('password_message'))
                   <div class="alert alert-success" role="alert">
                       <strong style="padding-right: 35px;">{{ session()->get('password_message') }}</strong>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   @endif
                   @if (session()->has('password_error'))
                   <div class="alert alert-warning" role="alert">
                       <strong style="padding-right: 35px;">{{ session()->get('password_error') }}</strong>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   @endif
                   <form action="" class="form-horizontal" wire:submit.prevent='changePassword'>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">Current Password</label>
                           <div class="col-md-4">
                               <input type="password" placeholder="Current Password"
                                      class="form-control input-md"
                                      name="current_password" wire:model='current_password'>
                           </div>
                           @error('current_password')
                               <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">New Password</label>
                           <div class="col-md-4">
                               <input type="password" placeholder="New Password"
                                      class="form-control input-md"
                                      name="password" wire:model='password'>
                           </div>
                           @error('password')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label">confirm Password</label>
                           <div class="col-md-4">
                               <input type="password" placeholder="Confirm Password"
                                      class="form-control input-md"
                                      name="password_confirmation" wire:model='confirm_password'>
                           </div>
                           @error('confirm_password')
                               <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="" class="col-md-4 control-label"></label>
                           <div class="col-md-4">
                               <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                       </div>
                   </form>
               </div>
            </div>
        </div>
    </div>
</div>
