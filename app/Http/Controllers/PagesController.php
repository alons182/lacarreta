<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CotizarRequest;
use App\Mail\ContactForm;
use App\Mail\CotizarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {
        $isHome = true;
        
        return view('pages.index')->with(compact('isHome'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }
    public function postContact(ContactRequest $request)
    {
    	$data = $request->all();

        Mail::to('ocastilloleal@gmail.com')->send(new ContactForm($data));

        Flash('Consulta enviada correctamente','success');

        return Redirect()->back();
    }
    public function cotizar()
    {
        return view('pages.cotizar');
    }
    public function postCotizar(CotizarRequest $request)
    {
        $data = $request->all();
       
        Mail::to('ocastilloleal@gmail.com')->send(new CotizarForm($data));

        Flash('Cotización enviada correctamente','success');

        return Redirect()->back();
    }
}
