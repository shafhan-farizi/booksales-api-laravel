<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(): JsonResponse
    {
        $transactions = Transaction::with(['user', 'book'])->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found!'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Transactions',
            'data' => $transactions
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        // 1. validator & cek validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 2. generate orderNumber -> unique | ORD-0003
        $uniqueCode = 'ORD-' . strtoupper(uniqid());

        // 3. ambil user yang sedang login & cek login apakah ada data user
        $user = auth()->guard('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!'
            ], 401);
        }

        // 4. mencari data buku dari request
        $book = Book::find($request->book_id);

        // 5. cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup!'
            ], 400);
        }

        // 6. hitung total harga = price * quantity
        $totalAmount = $book->price * $request->quantity;

        // 7. kurangi stok buku (update) 
        $book->stock -= $request->quantity;
        $book->save();

        // 8. simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'quantity' => $request->quantity,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transactions created successfully!',
            'data' => $transactions
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $transactions = Transaction::with(['user', 'book'])->findOrFail($id);

        if (!$transactions) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail transaction',
            'data' => $transactions
        ], 200);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        // 1. mencari data
        $transactions = Transaction::find($id);

        if (!$transactions) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        // 2. validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. update data buku baru
        $book = Book::find($request->book_id);
        
        // 4. normalkan jumlah stock terlebih dahulu
        $oldBook = Book::find($transactions->book_id);
        $oldBook->stock += $transactions->quantity;
        $oldBook->save();

        // 5. refresh data buku baru karena mungkin saja masih buku yang sama
        $book->refresh();

        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup!'
            ], 400);
        }

        // 6. kurangi stok buku (update) 
        $book->stock -= $request->quantity;
        $book->save();

        // 7. hitung total harga = price * quantity
        $totalAmount = $book->price * $request->quantity;

        // 8. siapkan data yang ingin diupdate
        $data = [
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount
        ];

        // 9. update data baru ke database
        $transactions->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully!',
            'data' => $transactions
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $transactions = Transaction::find($id);

        if (!$transactions) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        // update stok buku
        $book = Book::find($transactions->book_id);

        if($book) {
            $book->stock += $transactions->quantity;
            $book->save();
        }

        $transactions->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete transaction'
        ], 200);
    }
}
