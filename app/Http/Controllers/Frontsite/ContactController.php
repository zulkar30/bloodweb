<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\Operational\FeedBack;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('pages.frontsite.contact');
    }

    public function store(Request $request){
        $data = $request->all();

        $feedback = FeedBack::create($data);
        // Sweetalert
        alert()->success('Success Create Message', 'Successfully Give FeedBack Message');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('contact.success');
    }

    public function success(){
        return view('pages.frontsite.success.feedback_success');
    }
}
