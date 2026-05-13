<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Ambil data customer sekaligus memuat relasi wilayahnya
    $customer = Customer::with(['province', 'regency'])->get();// ambil semua data
        return view('pages.admin.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'nullable',
            'provinces_id' => 'required',
            'regencies_id' => 'required',
            'zip_code' => 'nullable',
            'phone_number' => 'required',
        ]);
        customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'provinces_id' => $request->provinces_id,
            'regencies_id' => $request->regencies_id,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
        ]);
        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
        $customer = customer::findOrFail($customer->id);
        return view('pages.admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        //
        $customer = customer::findOrFail($customer->id);
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        return redirect()->route('customer.index')->with('success', 'Customer berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
        $customer = customer::findOrFail($customer->id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus');
    }
}
