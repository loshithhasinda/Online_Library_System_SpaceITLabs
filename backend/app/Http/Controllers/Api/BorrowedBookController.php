<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = BorrowedBook::all();

        return response()->json([
            'status' => true,
            'books' => $book
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = BorrowedBook::create($request->all());

        return response()->json([
            'status'=> true,
            'book'=> $book
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowedBook $borrowedBook)
    {
        BorrowedBook::where('id', $borrowedBook)->delete();

        return response()->json([
            'status'=> true,
            'message'=> "Book Deleted Successfully"
        ], 200);
    }
}
