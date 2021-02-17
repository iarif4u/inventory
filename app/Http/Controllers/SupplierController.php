<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Models\Receive;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return Inertia::render('Supplier/Suppliers', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Supplier/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SupplierStoreRequest $request)
    {
        Supplier::create($request->validated());
        return redirect()->back()->with('success','Supplier created success');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Supplier $supplier
     * @return Response
     */
    public function show(Supplier $supplier)
    {
        $receives = Receive::with(['product'])->where(['supplier_id'=>$supplier->id])->latest()->get();
        return Inertia::render('Supplier/SupplierDetails',['receives'=>$receives,'supplier'=>$supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
