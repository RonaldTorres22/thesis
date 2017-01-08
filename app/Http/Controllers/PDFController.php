<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Letter;
use PDF;
use App\Event;
use App\Participant;
class PDFController extends Controller
{
    public function getPDF($id){

    	 $letter = Letter::find($id);
    	$pdf = PDF::loadView('pdf.sample',['Letter'=>$letter]);
    	if($letter->status == "pending" || $letter->status == "disapproved"){
    		return back();
    	}
    	else{
    	return $pdf->stream($letter->eventletter->title.'.pdf');
   		 }
    }

    public function participants($id)
    {
        $event = Event::findOrFail($id);
        $parti = Event::find($id)->registration()->get();
        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'part'          => $parti

        ];
        $pdf = PDF::loadView('registeronline.participants',$data);
        return $pdf->stream($event->title.'.pdf');
    }

}
