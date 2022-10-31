<form method="post" action="{{isset($admin) ? route('admin.admins.update',$admin) : route('admin.admins.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if(isset($admin))
        @method('PATCH')
    @endif
    <div class="card-body">
        @if(isset($admin))
            {{-- for unique validation when edit --}}
            <input type="hidden" name="user_id" value="{{ $admin->id }}">
        @endif
                
        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.Name')}}</label>
            <input type="text" class="form-control" id="inputAddress" name="name" value="{{ old('name') ?? (isset($admin) ? $admin->name : '') }}" required>
        </div>
        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.admins.Email')}}</label>
            <input type="email" dir="ltr" class="form-control" id="inputAddress" name="email" value="{{ old('email') ?? (isset($admin) ? $admin->email : '') }}" >
        </div>

        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.admins.Mobile')}}</label>
            <input type="text" dir="ltr" class="form-control" id="inputAddress" name="mobile" value="{{ old('mobile') ?? (isset($admin) ? $admin->mobile : '') }}">
        </div>
        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.admins.Password')}}</label>
            <input type="password" dir="ltr" class="form-control" id="inputAddress" name="password" {{ !isset($admin) ? 'required' : '' }}>
        </div>

        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.admins.Role')}}</label>
            <select name="role_id" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ isset($admin) && $admin->roles->first() && $admin->roles->first()['id'] == $role->id ? 'selected' : ''}}>{{ $role->display_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
             <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">{{ t('Status Deactive / Active') }}</label>
                            <div class="">
                                <span class="switch switch-lg">
                                    <label>
                                        <input type="checkbox" name="active" {{ isset($item) ? ($item->active ? 'checked' : '')  : 'checked' }}/>
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
            
        </div>
        
        

        {{-- @if(isset($admin) && $admin->image)
            @include('admin.includes.image-preview', ['path' => '/uploads/user_media/'. $admin->image])            
        @else
            @include('admin.includes.image-preview')            
        @endif --}}
    </div>
    <div class="card-footer" style="text-align: center;">
        <button type="submit" class="btn btn-primary mr-2">{{ isset($admin) ? __('admin.update') : __('admin.save')}}</button>
        <a class="btn btn-secondary" href="{{ route('admin.admins.index') }}">{{ __('admin.cancel') }}</a>
    </div>
</form>


