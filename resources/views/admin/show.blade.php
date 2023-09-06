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
                    <th scope="col">Date of creation</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $project->title }}</th>
                    <td>{{ substr($project->description, 0, 50) . '...' }}</td>
                    <td>{{ $project->date }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-warning me-2" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
