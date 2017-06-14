<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('pages.welcome');
    }

    public function getAbout()
    {
        $author = array(
            'firstname' => 'Jorman',
            'lastname' => 'Espinoza',
            'username' => 'l3inadz',
            'email' => 'espinoza.dev@gmail.com'
        );

        return view('pages.about')->withAuthor($author);
    }

    public function getContact()
    {
        return view('pages.contact');
    }
}
