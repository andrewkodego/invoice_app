<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\InvoiceService as IModelService;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    protected $modelService = null;
    
    public function __construct(IModelService $modelService){
        $this->modelService = $modelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resultList = $this->modelService->getList($request->all());
        return Inertia::render('Invoice/Index', [
            'invoices'=> $resultList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = new Invoice();

        return Inertia::render('Invoice/Edit', [
            'invoice'=> $invoice,
            'currencyList' => $invoice->getCurrencyList(),
            'statusList' => $invoice->getInvoiceStatusList(),
            'paymentMethodList' => $invoice->getInvoicePaymentMethodList(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {

        $validatedData = $request->validated();
        $recordData = new Invoice();
        $recordData->created_by = Auth::user()->id;
        $recordData->inv_number = $validatedData['inv_number'];
        $recordData->inv_to = $validatedData['inv_to'];
        $recordData->inv_contact_number = $validatedData['inv_contact_number'];
        $recordData->inv_date = $validatedData['inv_date'];
        $recordData->inv_currency = $validatedData['inv_currency'];
        $recordData->inv_status = $validatedData['inv_status'];
        $recordData->inv_payment_method = $validatedData['inv_payment_method'];
        $recordData->inv_delivery_address = $validatedData['inv_delivery_address'];
        $recordData->save();

        return redirect('/invoices');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return Inertia::render('Invoice/Edit', [
            'invoice'=> $invoice,
            'currencyList' => $invoice->getCurrencyList(),
            'statusList' => $invoice->getInvoiceStatusList(),
            'paymentMethodList' => $invoice->getInvoicePaymentMethodList(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $validatedData = $request->validated();

        $invoice->updated_by = Auth::user()->id;
        $invoice->inv_number = $validatedData['inv_number'];
        $invoice->inv_to = $validatedData['inv_to'];
        $invoice->inv_contact_number = $validatedData['inv_contact_number'];
        $invoice->inv_date = $validatedData['inv_date'];
        $invoice->inv_currency = $validatedData['inv_currency'];
        $invoice->inv_status = $validatedData['inv_status'];
        $invoice->inv_payment_method = $validatedData['inv_payment_method'];
        $invoice->inv_delivery_address = $validatedData['inv_delivery_address'];
        $invoice->save();

        return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
