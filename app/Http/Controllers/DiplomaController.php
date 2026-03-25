<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diploma;
use App\Models\Block;
use App\Services\BlockchainService;

class DiplomaController extends Controller
{

    public function index()
    {
        $diplomas = Diploma::all();
        return view('dashboard', compact('diplomas'));
    }

    public function create()
    {
        return view('add_diploma');
    }

    public function store(Request $request)
    {
        $data = [
            "student_name" => $request->student_name,
            "student_id" => $request->student_id,
            "degree" => $request->degree,
            "issue_date" => $request->issue_date
        ];

        $blockchain = new BlockchainService();

        $hash = $blockchain->createBlock($data);

        Diploma::create([
            "student_name" => $request->student_name,
            "student_id" => $request->student_id,
            "degree" => $request->degree,
            "issue_date" => $request->issue_date,
            "hash" => $hash
        ]);

        return redirect('/');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Handle login logic here
    }

    public function getRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'agree' => 'accepted'
        ]);

        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('success', 'Account created successfully! Please login.');
    }

    public function search(Request $request)
    {

        $diploma = Diploma::where(
            'student_id',
            $request->student_id
        )->first();

        return view('search', compact('diploma'));
    }

    // Handle transaction creation from API
    public function storeTransaction(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'amount' => 'required|numeric|min:0.01',
            'fee' => 'numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $timestamp = now();

        // Create Block entry for transaction
        $blockData = [
            'transaction_type' => $request->type,
            'from_address' => $request->from,
            'to_address' => $request->to,
            'amount' => $request->amount,
            'fee' => $request->fee ?? 1.0,
            'description' => $request->description ?? 'No description',
            'timestamp' => $timestamp
        ];

        $blockchain = new BlockchainService();
        $hash = $blockchain->createBlock($blockData);

        // Save to database
        $block = Block::create([
            'hash' => $hash,
            'transaction_type' => $request->type,
            'from_address' => $request->from,
            'to_address' => $request->to,
            'amount' => $request->amount,
            'fee' => $request->fee ?? 1.0,
            'description' => $request->description ?? 'No description',
            'status' => 'success',
            'block_height' => Block::count() + 1,
            'created_at' => $timestamp
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'hash' => $hash,
            'block' => $block
        ], 201);
    }

    // Display transaction details
    public function showTransaction($hash)
    {
        $transaction = Block::where('hash', $hash)->first();

        if (!$transaction) {
            return redirect('/')->with('error', 'Transaction not found');
        }

        return view('add_diploma', compact('transaction'));
    }

    // Get all transactions
    public function getTransactions()
    {
        $transactions = Block::orderBy('created_at', 'desc')->get();
        return response()->json($transactions);
    }
}
