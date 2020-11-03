<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookTicket extends Controller
{
    
    public function book_ticket($id_film)
    {
        
        return view('pages.book_ticket');
    }
}
