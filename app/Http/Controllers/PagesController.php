<?php

namespace App\Http\Controllers;

class pagesController extends Controller
{
    public function getIndex() {
        $first= "Mohammed ";
        $last= "Alshammari ";

        $fullname = $first."".$last;
        $email="mohammed.gharbi@outlook.com";
        $data['email']=$email;
        $data['fullname']=$fullname;        

        return view('main')->withData($data);
    }

    public function getAbout() {
        $first= "Mohammed ";
        $last= "Alshammari";

        $fullname = $first."".$last;
        $email="mohammed.gharbi@outlook.com";
        $data['email']=$email;
        $data['fullname']=$fullname;        

        return view('about')->withData($data);
    }

    public function getContact() {
        $first= "Mohammed ";
        $last= "Alshammari";

        $fullname = $first."".$last;
        $email="mohammed.gharbi@outlook.com";
        $data['email']=$email;
        $data['fullname']=$fullname;              
        return view('contact')->withData($data);
    }

    public function getPost() {
        $data = Post::find($id);
        return view('post')->withData($data);
    }

}
