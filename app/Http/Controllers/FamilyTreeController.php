<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyTree;

class FamilyTreeController extends Controller
{
    public function index()
    {
        $families = FamilyTree::all();
        return view('family.index', compact('families'));
    }

    public function create()
    {
        return view('family.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_trees,id'
        ]);

        FamilyTree::create($request->all());

        return redirect()->route('family.index')->with('success', 'Family member added successfully.');
    }

    public function show($id)
    {
        $family = FamilyTree::findOrFail($id);
        return view('family.show', compact('family'));
    }

    public function edit($id)
    {
        $family = FamilyTree::findOrFail($id);
        return view('family.edit', compact('family'));
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

        return redirect()->route('family.index')->with('success', 'Family member updated successfully.');
    }

    public function destroy($id)
    {
        $family = FamilyTree::findOrFail($id);
        $family->delete();

        return redirect()->route('family.index')->with('success', 'Family member deleted successfully.');
    }
}
