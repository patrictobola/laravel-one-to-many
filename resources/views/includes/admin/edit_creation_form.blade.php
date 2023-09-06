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
    @if (Route::is('admin.projects.create'))
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
                @method('put')
    @endif
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text"
            class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
            id="title" name="title" value="{{ old('title', $project->title) }}">
        @error('title')
            <div class="invalid-feedback">
                Please provide a valid title.
            </div>
        @enderror

    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="text"
            class="form-control @error('description') is-invalid @elseif(old('description')) is-valid  @enderror"
            id="description" name="description" rows="4">{{ old('description', $project->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">
                Please provide a valid description.
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date"
            class="form-control @error('date') is-invalid @elseif(old('date')) is-valid  @enderror"
            id="date" name="date" value="{{ old('date', $project->date) }}">
        @error('date')
            <div class="invalid-feedback">
                Please provide a valid date.
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="thumb" class="form-label">Screenshot</label>
        <input type="file"
            class="form-control @error('thumb') is-invalid @elseif(old('thumb')) is-valid  @enderror"
            id="thumb" name="thumb" value="{{ old('thumb', $project->thumb) }}">
        @error('thumb')
            <div class="invalid-feedback">
                Please provide a valid screenshot URL.
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Type of project</label>
        <select class="form-select" id="type_id" name="type_id">
            <option value="{{ null }}" selected>None</option>
            @foreach ($types as $type)
                <option @if (old('type_id', $project->type_id) == $type->id) selected @endif value="{{ $type->id }}">
                    {{ $type->label }}</option>
            @endforeach
        </select>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Back to main page</a>
        <button class="btn btn-success">Submit Changes</button>
    </div>
    </form>
</div>
