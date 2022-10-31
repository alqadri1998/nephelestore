<form class="form" method="post" action="{{isset($role) ? route('admin.roles.update',$role) : route('admin.roles.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	@if(isset($role))
		@method('PATCH')
	@endif
    <div class="card-body">
        <div class="form-group">
            <label>{{ __('admin.Name')}}</label>
            <input type="text" class="form-control half-width" name="display_name" value="{{ old('display_name') ?? (isset($role) ? $role->display_name : '') }}" required/>
        </div>
        <div class="form-group">
            <label>{{ __('admin.roles.description')}}</label>
            <input type="text" class="form-control half-width" name="description" value="{{ old('description') ?? (isset($role) ? $role->description : '') }}" />
        </div>
        <div class="form-group">
            <label>{{ __('admin.roles.Permissions')}} <span class="asterisk">*</span></label>
            <hr>
            <div class="checkbox-list">
            	<div class="row">
	            	@foreach($permissions as $permission)
		            	<div class="col-lg-3" style="margin-bottom: 20px;">
			                <label class="checkbox">
			                <input type="checkbox" name="permissions[{{ $permission->id }}]" {{ isset($role) && in_array($permission->id, $role->permissions()->pluck('id','id')->toArray()) ? 'checked' : '' }}/>
			                <span></span>{{ $permission->display_name }}</label>
		            	</div>
	            	@endforeach
            	</div>
            </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: center;">
        <button type="submit" class="btn btn-primary mr-2">{{ isset($role) ? __('admin.update') : __('admin.save')}}</button>
        <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">{{ __('admin.cancel') }}</a>
    </div>
</form>


