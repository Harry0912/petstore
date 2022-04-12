<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndexModel;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function index()
    {
        $data = IndexModel::find(1)->first();

        return view('front/contact/contact', [
            'data' => $data
        ]);
    }

    public function table()
    {
        $data = ContactModel::orderBy('id', 'desc')->get();

        return view('back/contact/contact_table', [
            'contact' => $data
        ]);
    }

    public function show($id)
    {
        $data = ContactModel::find($id);

        return view('back/contact/contact_info', [
            'contact' => $data
        ]);
    }
}
