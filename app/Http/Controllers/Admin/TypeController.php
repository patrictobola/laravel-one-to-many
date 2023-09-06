<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $types = Type::all();
            return view('admin.types.index', compact('types'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.types.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'label' => 'bail|required|string|max:255',
                'color' => 'bail|required',
            ],
            []
        );

        $data = $request->all();
        $new_project = new Type();
        $new_project->fill($data);
        $new_project->save();

        return to_route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
