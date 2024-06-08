<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use App\Models\Bible;
use App\Models\Helio;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Generalsetting;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
       
        $partners  =Team::orderBy('id', 'desc')->first();
        $projects =Portfolio::orderBy('id', 'desc')->take(3)->get();
        return view('frontend.index', compact( 'partners','projects'));
    }

    public function portfolio()
    {
        
        $portfolios = Portfolio::get();
        return view('frontend.portfolio', compact('portfolios'));
    }
    
    public function FutureProject()
    {
        
        $futureprojects = Service::orderBy('id', 'desc')->get();
        return view('frontend.future-project', compact('futureprojects'));
    }

    public function FutureProjectDetails($slug)
    {
        $future = Service::where('slug', $slug)->first();
        return view('frontend.future-details', compact('future'));
    }

    public function SuccessfullExist()
    {
        $successfully = Team::orderBy('id', 'desc')->get();
        return view('frontend.successfull-exist', compact('successfully'));
    }

    public function SuccessfullExistDetails($slug)
    {
        $success = Team::where('slug', $slug)->first();
        return view('frontend.successfull-details', compact('success'));
    }
    

    public function portfolioDetails($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->first();
        return view('frontend.portfolio-details', compact('portfolio'));
    }

    public function service(){
        $services = Page::get();
        return view('frontend.service', compact('services'));
    }

    public function stripeCharge(Request $request){
        $gs = Generalsetting::findOrFail(1);

        \Stripe\Stripe::setApiKey($gs->header_text);


        $session = \Stripe\Checkout\Session::create([
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => 'usd',
                        "unit_amount" =>$request->amount*100,
                        "product_data" => [
                            "name" => 'Donation'
                        ]
                    ]
                ]
                ],
            'mode' => 'payment',
            "locale" => "auto",
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
          ]);
          return redirect($session->url);


    }

    public function success(Request $request)
    {

       
        $gs= Generalsetting::first();
        
        $sessionId = $request->get('session_id');

        try{
            
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

        
            if (!$session) {
                throw new NotFoundHttpException;
            }
          
          

            if ($session->payment_status == 'paid'  && $session->status=='complete') {

                return redirect()->route('donate')->with('success', 'Payment completed successfully !');
            } else {
                return redirect()->route('donate')->with('unsuccess', 'Payment failed !');
                
               
            }

        }catch (Exception $e){
            return back()->with('unsuccess', $e->getMessage());
        }

    }

    public function cancel()
    {
        return redirect()->route('donate')->with('unsuccess', 'Payment failed !');
    }

    public function donate()
    {
        return view('frontend.donate');
    }

    public function serviceDetails($slug)
    {
        $service = Page::where('slug', $slug)->first();
        return view('frontend.service-details', compact('service'));
    }

   

   



    
    
}
