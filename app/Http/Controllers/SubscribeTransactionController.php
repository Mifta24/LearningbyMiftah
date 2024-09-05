<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubscribeTransaction;
use Carbon\Carbon;

class SubscribeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = SubscribeTransaction::orderByDesc('id')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('admin.transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubscribeTransaction $subscribeTransaction)
    {
        return view('admin.transactions.show', compact('subscribeTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubscribeTransaction $subscribeTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubscribeTransaction $subscribeTransaction)
    {
        DB::transaction(function () use ($request, $subscribeTransaction) {

            $subscribeTransaction->update([
                'is_paid' => '1',
                'subscription_start_date' => Carbon::now(),
            ]);
        });

        return redirect()->route('admin.subscribe_transactions.show',$subscribeTransaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubscribeTransaction $subscribeTransaction)
    {
        //
    }
}
