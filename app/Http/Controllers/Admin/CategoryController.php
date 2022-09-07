<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catagory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Show All Catagories
     *
     * @return void
     */
    public function index() {
        $caragories = Catagory::orderBy('id', 'desc')->paginate(3);
        return view('admin.catagory.index', compact('caragories'));
    }

    /**
     * Open Catagory Form
     *
     * @return void
     */
    public function create() {
        return view('admin.catagory.create');
    }

    /**
     * Sote Data in Catagory Table
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required|string|unique:catagories|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif:max:10000',
            'status' => 'nullable',
        ]);

        $catagory = new Catagory;

        $catagory->name = $request->name;
        $catagory->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('upload/catagory', $filename);
            $catagory->image = $filename;
        }
        $catagory->description = $request->description;
        $catagory->status = $request->status == true ? "0": "1";

        $catagory->save();


        return redirect('admin/catagory')->with('message', 'Catagory added Successfully');

    }

    public function destroy($id) {
        $catagory = Catagory::find($id);
        $file = 'upload/catagory/'.$catagory->image;
        if(File::exists($file)) {
            File::delete($file);
        }
        $catagory->delete();
        return redirect('admin/catagory')->with('message', 'Catagory Delete Successfully');
    }
}
