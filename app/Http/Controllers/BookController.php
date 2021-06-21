<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('book.show');
        return \view('book.show', [
            'books' => Book::all()->toArray()
        ]);
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:120|min:3',
            'author' => 'required|max:80|min:2',
            'year' => 'required|digits:4|integer'
          ]);
          
          // save
          $book = new Book();
          $data = $request->only($book->getFillable());
          $book->fill($data)->save();
          
          return \redirect()->route('book');          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return \view('book.form', Book::findOrFail($id)->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:120|min:3',
            'author' => 'required|max:80|min:2',
            'year' => 'required|digits:4|integer'
          ]);
          
          // update
          $book = Book::find($id);
          $data = $request->only($book->getFillable());
          $book->title = $data['title'];
          $book->author = $data['author'];
          $book->year = $data['year'];
          $book->save();
          
          return \redirect()->route('book');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return \redirect()->route('book');

    }
}
