<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Mail;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $latest_post = $posts->first();
        return view('pages.welcome')
            ->with('posts', $posts)
            ->with('latest_post', $latest_post);
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

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        $data = [
            'email'=> $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('espinoza-dev@gmail.com');
            $message->subject($data['subject']);
        }); // Mail:queue();

        Session::flash('success', 'Your Email was Sent!');
        return redirect('/');
    }
}
