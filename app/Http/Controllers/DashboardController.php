<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea; // Import the Idea model

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'ideas' => Idea::orderBy('created_at', 'DESC') -> get()
        ]);
    }
}
