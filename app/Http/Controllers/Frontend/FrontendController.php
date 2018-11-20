<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Events;
use App\Models\Attachments;
use App\Models\Pages;
use App\Models\SubPages;
use App\Models\Menus;
use App\Models\Testimonials;
use App\Models\Reviews;
use App\Models\ServiceType;
use App\Libraries\UploadFileHandler;
use Illuminate\Support\Facades\Mail;
use Request;
use Hash;
use DB;
use Auth;
use URL;
use App;
use Redirect;


class FrontendController extends Controller
{

    public function getView($id = 0)
    {
        $view = '';
        $data = Array();

        switch(Request::segment(1)) {

            case '':



                $view = 'frontend.index';
                break;
            case 'sign-in':
                $view = 'frontend.signin';
                break;
            case 'sign-up':
                $view = 'frontend.signup';
                break;



        }

        return view($view)->with($data);
    }
    public function postManage( Request $request)
    {
        $status=0;
        $data=Array();
        $html='';
        $message='';
        $url='';
        switch (Request::input('type')) {


            case 'add-contact' :

                /*  $tomail = DB::table('contacts')
                     ->first(); */
                $to ='sherin@kawikatechnologies.com';

                $data['type'] = 'add-contact';
                $data['name'] = Request::input('name');
                $data['email'] = Request::input('email');
                $data['subject'] = Request::input('subject');
                $data['messages'] = Request::input('message');
                $fromemail=$data['email'];
                Mail::send('layouts.email', $data, function($message) use ($to)
                {
                    $message->to($to)->from('dfgdgf@gmail.com')->subject('Contact Mail!');
                });
                $status = 1;
                break;


            case 'signUp':

                $customer='';

                $rad1=Request::input('radio1');

                if($rad1)
                {

                    $pass=Request::input('password');
                    $password=md5($pass);
                    $uers = User::create([

                        'email' => Request::input('email'),
                        'password' => $password,
                        'phone' => Request::input('phone'),
                        'roles_role_id' =>2 ,

                    ]);


                }
                $rad2=Request::input('radio2');
                if($rad2)
                {
                    $pass=Request::input('password');
                    $password=md5($pass);
                    $uers = User::create([

                        'email' => Request::input('email'),
                        'password' => $password,
                        'phone' => Request::input('phone'),
                        'roles_role_id' =>3 ,

                    ]);
                }


                break;
        }

        return response()->json(['status' => $status, 'message' => $message, 'html' => $html, 'data' => $data, 'url' => $url]);

    }
    public function postFileUpload(){

        $option = array(
            /* some options */
            'upload_dir' => 'data/temp/',

            /* .... */
        );


        $upload_handler = new UploadFileHandler($option);
    }




}