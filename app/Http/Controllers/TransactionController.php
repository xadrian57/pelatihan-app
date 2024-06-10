<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Requests\BorrowBookRequest;
use App\Http\Requests\ReturnBookRequest;
use App\Models\Book;
use App\Models\User;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::with('user', 'book')->latest()->filter(request(['search']))->paginate(10);
        return view('transaction.index', compact('transaction'));
    }

    public function borrow()
    {
        $user = User::all();
        $book = Book::all();
        return view('transaction.borrow', compact('user', 'book'));
    }

    public function BorrowBook(BorrowBookRequest $request)
    {
        //dd($request->validated());
        try {
        $Validated = $request->validated();

        $book = Book::findOrFail($Validated['book_id']); //dd();
        if($book->currentTransaction) {
            return redirect()->back()->with('error', 'Book is already borrowed');
        } else {
            Transaction::create([
                'user_id' => $Validated['user_id'],
                'book_id' => $Validated['book_id'],
                'borrow_at' => now(),
                'return_at' => null,
            ]);
            return redirect('/transactions')->with('success', 'Book borrowed successfully');
        }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    public function ReturnBook(ReturnBookRequest $request)
    {
        //dd($request->validated());
        try {
        $Validated = $request->validated();
        $transactions = Transaction::find($Validated['id']);
        $transactions->update([
            'return_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Book returned successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    } 
}
