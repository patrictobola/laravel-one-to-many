@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date of creation</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th>{{ $project->title }}</th>
                        @if (strlen($project->description) > 30)
                            <td>{{ substr($project->description, 0, 50) . '...' }}</td>
                        @else
                            <td>{{ $project->description }}</td>
                        @endif
                        <td>{{ $project->types?->label }}</td>
                        <td>{{ $project->date }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-success me-2" href="{{ route('admin.projects.show', $project) }}">Show</a>
                                <a class="btn btn-warning me-2" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Create a new project</a>

    </div>
@endsection
