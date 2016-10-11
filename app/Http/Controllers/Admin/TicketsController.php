<?php

namespace StartPoint\Http\Controllers\Admin;

use StartPoint\Http\Controllers\Controller;
use StartPoint\Http\Requests;

class TicketsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.tickets.create');
    }
}
