<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WebBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','detail']);
    }

    public function index()
    {
        $data = Book::latest()->paginate(5);

        return view('books.index', ['books' => $data ]);
    }

    public function detail($id) {

        $data = Book::find($id);

        return view('books.detail',['book' => $data]);
    }



}
