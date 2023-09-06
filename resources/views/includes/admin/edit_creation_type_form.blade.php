<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    @if (Route::is('admin.types.create'))
        <form action="{{ route('admin.types.store') }}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{ route('admin.types.update', $type) }}" method="post" enctype="multipart/form-data">
                @method('put')
    @endif
    @csrf
    <div class="mb-3">
        <label for="label" class="form-label">Label</label>
        <input type="text"
            class="form-control @error('label') is-invalid @elseif(old('label')) is-valid @enderror"
            id="label" name="label" value="{{ old('label', $type->label ?? '') }}">
        @error('label')
            <div class="invalid-feedback">
                Please provide a valid title.
            </div>
        @enderror

    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input type="color"
            class="form-control @error('color') is-invalid @elseif(old('color')) is-valid  @enderror"
            id="color" name="color" value="{{ old('color', $type->color ?? '') }}">
        @error('color')
            <div class="invalid-feedback">
                Please provide a valid color.
            </div>
        @enderror
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.types.index') }}" class="btn btn-info">Back to main page</a>
        <button class="btn btn-success">Submit Changes</button>
    </div>
    </form>
</div>
