@if (isset($errors) && $errors->has($key))
    @foreach($errors->get($key) as $error)
        <div class="invalid-feedback" role="alert" style="display: block;text-align: left;">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif