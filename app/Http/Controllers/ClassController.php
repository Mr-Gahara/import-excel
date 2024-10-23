<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassController extends Controller
{
    
    public function index()
    {
        return ClassModel::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_name' => 'required|string',
        ]);

        return ClassModel::create($request->all());
    }

    public function show($id)
    {
        return ClassModel::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_name' => 'required|string',
        ]);

        $classes = ClassModel::findOrFail($id);
        $classes->update($request->all());

        return $classes;
    }

    public function destroy($id)
    {
        ClassModel::findOrFail($id)->delete();

        return response()->noContent();
    }
}
