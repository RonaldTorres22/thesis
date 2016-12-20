<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Letter;
use PDF;
use App\Event;
class PDFController extends Controller
{
    public function getPDF($id){

    	 $letter = Letter::find($id);
    	$pdf = PDF::loadView('pdf.sample',['Letter'=>$letter]);
    	return $pdf->download('Letter.pdf');
    }
}
