<?php

namespace App\Http\Controllers;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home', [
            'restaurantes' => Restaurante::all()
						->where('user_id', '=', Auth::user()->id)
						
        ]);
    }
}
