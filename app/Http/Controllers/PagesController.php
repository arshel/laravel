<?php

namespace App\Http\Controllers;
use App;
use DB;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {


        $title = 'welcome to Laravel';

        return view('pages.index')->with('title', $title);

    }


        public function about()
        {
            $title = 'about us';
            return view('pages.about')->with('title', $title);




        }

    public function services()
    {
       $data = array(
        'title' => 'services',
           'services' => ['webdesign', 'programming', 'seo', ' Frond-end ']
       );

        return view('pages.services')->with($data);
    }
}
