<form method="post" action="{{ isset($item) ? route('admin.users.update', $item) : route('admin.users.store') }}"
    enctype="multipart/form-data">
    {{ csrf_field() }}
    @if (isset($item))
        @method('PATCH')
    @endif
    <div class="card-body">
        @if (isset($item))
            {{-- for unique validation when edit --}}
            <input type="hidden" name="user_id" value="{{ $item->id }}">
        @endif

        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.name') }}</label>
            <input type="text" class="form-control" id="inputAddress" name="name"
                value="{{ old('name') ?? (isset($item) ? $item->name : '') }}" required>
        </div>
        {{-- <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.last_name')}}</label>
            <input type="text" class="form-control" id="inputAddress" name="last_name" value="{{ old('last_name') ?? (isset($item) ? $item->last_name : '') }}" required>
        </div> --}}
        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.admins.Email') }}</label>
            <input type="email" dir="ltr" class="form-control" id="inputAddress" name="email"
                value="{{ old('email') ?? (isset($item) ? $item->email : '') }}">
        </div>

        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.admins.Mobile') }}</label>
            <input type="text" dir="ltr" class="form-control" id="inputAddress" name="mobile"
                value="{{ old('mobile') ?? (isset($item) ? $item->mobile : '') }}" required>
        </div>
        <div class="form-group half-width">
            <label for="inputAddress">{{ __('admin.admins.Password') }}</label>
            <input type="password" dir="ltr" class="form-control" id="inputAddress" name="password"
                {{ !isset($item) ? 'required' : '' }}>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label">{{ t('Status Deactive / Active') }}</label>
                    <div class="">
                        <span class="switch switch-lg">
                            <label>
                                <input type="checkbox" name="active"
                                    {{ isset($item) ? ($item->active ? 'checked' : '') : 'checked' }} />
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>


        </div>





        {{--
        @if (isset($user) && $user->image)
            @include('admin.includes.image-preview', ['item' =>  $user])
        @else
            @include('admin.includes.image-preview')
        @endif --}}
    </div>
    <div class="card-footer" style="text-align: center;">
        <button type="submit"
            class="btn btn-primary mr-2">{{ isset($item) ? __('admin.update') : __('admin.save') }}</button>
        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">{{ __('admin.cancel') }}</a>
    </div>
</form>
