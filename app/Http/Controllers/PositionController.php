<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('position.index',compact('positions'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name',
            'level' => 'required|integer'
        ]);

        Position::create($validated);
        return redirect()->back()->with('success','berhasil menambahkan data');
    }

    public function update(Request $request, Position $position){
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $position->id,
            'level' => 'required|integer'
        ]);

        $position->update($validated);
        return redirect()->back()->with('success','berhasil mengubah data');
    }

    public function destroy(Position $position){
        $position->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
