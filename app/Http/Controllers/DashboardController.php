<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea; // Import the Idea model

class DashboardController extends Controller
{
    public function index(){

        $ideas = Idea::with('user', 'comments.user')->orderBy('created_at', 'DESC');

        if(request()->has('search')){
            $ideas = $ideas->where('content', 'like' , '%' . request()->get('search','') . '%');
        }

        return view('dashboard', [
            'ideas' => $ideas -> paginate(5)
        ]);
    }
}
