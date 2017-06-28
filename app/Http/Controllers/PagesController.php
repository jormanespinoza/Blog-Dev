<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $latest_post = $posts->first();
        return view('pages.welcome')->with('posts', $posts)->with('latest_post', $latest_post);
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
