<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 14.09.2016
 * Time: 0:09
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::OrderBy('id', 'desc')->limit(4)->get();
        return view('pages/welcome')->with('posts', $posts);

    }

    public function getAbout()
    {
        $first = 'Alex';
        $last = 'Voluk';
        $full = $first . " " . $last;
        $email = 'alex12486@gmail.com';
        $data = array('email' => $email, 'fullname' => $full);
        return view('pages/about')->with("data", $data);

    }

    public function getContact()
    {
        return view('pages/contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, array(
            'email' => 'email|required',
            'subject' => 'min:3',
            'message' => 'min:10'
        ));

        $data = array(
            'email' => $request -> email,
            'subject' => $request -> subject,
            'bodyMessage' => $request -> message
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message -> from($data['email']);
            $message -> to('alex12486@gmailcom');
            $message -> subject($data['subject']);
        });

        Session::flash('success', 'The email was successfully sent!');
        return redirect()->route('/');
    }

}