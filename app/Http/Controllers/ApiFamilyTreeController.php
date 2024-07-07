<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyTree;

class ApiFamilyTreeController extends Controller
{
    public function index()
    {
        return FamilyTree::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_trees,id'
        ]);

        $family = FamilyTree::create($request->all());

        return response()->json($family, 201);
    }

    public function show($id)
    {
        return FamilyTree::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_trees,id'
        ]);

        $family = FamilyTree::findOrFail($id);
        $family->update($request->all());

        return response()->json($family, 200);
    }

    public function destroy($id)
    {
        $family = FamilyTree::findOrFail($id);
        $family->delete();

        return response()->json(null, 204);
    }
}
