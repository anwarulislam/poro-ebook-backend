<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function categories($type, Request $request)
    {
        return Category::where('type', $type)->get();
    }

    public function createCategory(Request $request)
    {

        $thumbnailName = null;
        if ($files = $request->file('thumbnail')) {
            $destinationPath = 'thumbnails'; // upload path
            $imgFileName = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFileName);
            $thumbnailName = "$imgFileName";
        }

        $category = Category::create([
            "parent_id" => $request->parent_id,
            "title" => $request->title,
            "type" => $request->type,
            "description" => $request->description,
            "thumbnail_id" => $thumbnailName
        ]);

        if ($thumbnailName) {
            $category->save();
        }

        return redirect()->back()->with("category", $category)->with("status", 'Successfully created!');
    }

    public function deleteCategory($category_id, Request $request)
    {

        $category = Category::where('id', $category_id)->delete();
        return redirect()->back()->with("category", $category)->with("status", 'Successfully deleted!');
    }
}
