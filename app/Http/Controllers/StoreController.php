<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getBooks(Request $request)
    {
        return Store::get();
    }

    public function getBook($book_id, Request $request)
    {
        return Store::where("id", $book_id)->first();
    }

    public function getBooksByCategory($cat_id, Request $request)
    {
        return Store::where("cat_id", $cat_id)->get();
    }

    public function createBook(Request $request)
    {

        request()->validate([
            'thumbnail'  => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        // dd($request->all());

        $thumbnailName = null;
        if ($img = $request->file('thumbnail')) {
            $imgdestination = 'thumbnails'; // upload path
            $imgfile = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($imgdestination, $imgfile);
            $thumbnailName = "$imgfile";
        }

        $book = Store::create([
            "cat_id" => $request->cat_id,
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "thumbnail" => $thumbnailName,
            "price" => $request->price,
            "contact" => $request->contact,
        ]);

        dd($book);

        // return $book;


        $book->save();
        return response($book);
    }

    public function deleteBook($book_id, Request $request)
    {
        $book = Book::where('id', $book_id)->delete();
        return redirect()->back()->with("book", $book)->with("status", 'Successfully deleted!');
    }
}
