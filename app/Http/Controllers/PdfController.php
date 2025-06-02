<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function __invoke(Order $order)
    {
        return Pdf::loadView('pdf', ['record' => $order])
            ->download($order->number . '.pdf');
    }
}
