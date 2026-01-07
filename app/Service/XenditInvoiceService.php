<?php

namespace App\Service;

use Xendit\Invoice\InvoiceApi;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;

class XenditInvoiceService
{
    protected InvoiceApi $invoiceApi;

    public function __construct()
    {
        Configuration::setXenditKey(config('services.xendit.secret_key'));
        $this->invoiceApi = new InvoiceApi();
    }

    public function createInvoice(array $data)
    {
        $request = new CreateInvoiceRequest([
            'external_id' => $data['external_id'],
            'amount' => $data['amount'],
            'description' => $data['description'],
            'invoice_duration' => 3600,
            'currency' => 'IDR',
            'success_redirect_url' => route('payment.success'),
            'failure_redirect_url' => route('payment.failed'),
        ]);

        return $this->invoiceApi->createInvoice($request);
    }
}
