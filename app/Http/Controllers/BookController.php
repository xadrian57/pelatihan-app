<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = book::latest()->filter(request(['search']))->Paginate(10);
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete this Book?";
        confirmDelete($title, $text);
        return view('books.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebookRequest $request)
    {
        try {
            $validated = $request->validated();
            book::create($validated);
            return redirect('/books')->with('success', 'Data Added Successfully');
        } catch (\Throwable $th) {
            return redirect('/books')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        //dd($book);
        return view('books.edit', [
            'data' => $book,
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebookRequest $request, book $book)
    {
        try {
            $validated = $request->validated();
            $book->update($validated);
            return redirect('/books')->with('success', 'Data Updated Successfully');
        } catch (\Throwable $th) {
            return redirect('/books')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        try {
            $book->delete();
            return redirect('/books')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/books')->with('error', $th->getMessage());
        }
    }
}
