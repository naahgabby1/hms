<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class ReceiptMailed extends Mailable
{
use Queueable, SerializesModels;

public $printing_data;
public $printing_paid_data;
public $hotel_details;
public $title;

public function __construct($printing_data, $printing_paid_data, $hotel_details, $title)
{
$this->printing_data = $printing_data;
$this->printing_paid_data = $printing_paid_data;
$this->hotel_details = $hotel_details;
$this->title = $title;
}

public function build()
{
$pdf = Pdf::loadView('pages.pdf.receipt', [
'printing_data' => $this->printing_data,
'printing_paid_data' => $this->printing_paid_data,
'hotel_details' => $this->hotel_details,
'title' => $this->title
]);
$pdf->save(storage_path('app/receipt/receipt_' . $this->printing_paid_data->code . '.pdf'));
return $this->subject('Receipt: ' . $this->title)
->view('pages.email.mail_content')
->attachData($pdf->output(), 'receipt.pdf', [
'mime' => 'application/pdf',
]);
}
}

