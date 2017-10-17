<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;
use App\User;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
	public function index(){
		$offers = Offer::Paginate(10);
		return view('offers.index')->with('offers',$offers);
	}

	public function add(){
		return view('offers.add');
	}

	public function store(Request $request){
	    $offer = new Offer($request->all());
        $offer->user_id = Auth::id();
        $offer->save();
        return redirect(route('offers.index'));
	}

}
