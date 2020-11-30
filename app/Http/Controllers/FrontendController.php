<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecondPart;
use App\SecondSectionImage;
use App\FirstSectionDesc;
use App\FirstSectionImage;

class FrontendController extends Controller
{
    public function index()
    {
    	$all_seconds = SecondPart::where('status',1)->get();
    	$all_seconds_image = SecondSectionImage::where('status',1)->get();
    	$all_first = FirstSectionDesc::where('status',1)->get();
    	$all_first_image = FirstSectionImage::where('status',1)->get();
    	return view('frontend.frontMain.frontMain',compact('all_seconds','all_seconds_image','all_first','all_first_image'));
    }
}
