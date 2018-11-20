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

            case 'about-us':

                $data['menus'] = Menus::get();

                $data['about'] = Pages::where('menu_id',$id)->first();
                $data['caption'] = Attachments::where('menu_id',1)->first();
                $data['banner']= DB::table('attachments')
                    ->join('menus','menus.menu_id','=','attachments.menu_id')
                    ->where('attachments.menu_id' ,$id)
                    ->first();
               
                $data['corevalues'] = SubPages::join('pages','pages.page_id','=','sub_pages.pages_page_id')
                    ->leftjoin('attachments','attachments.subpages_page_id','=','sub_pages.sub_page_id')
                    ->orderBy('sub_page_id', 'asc')
                    ->where('pages.menu_id',$id)->get();

                $view = 'frontend.about';
                break;

            case 'executive-team':

            $data['reviews'] = Reviews::get();
            $data['caption'] = Attachments::where('menu_id',2)->first();
            $data['menus'] = Menus::get();

                $view = 'frontend.team';

                break;

            case 'services':

                $data['about'] = Pages::where('menu_id',$id)->first();

                $view = 'frontend.service';
                break;

            case 'digital-transformation':

                $data['banner1'] = Attachments::where('menu_id',9)->first();
                $data['service_pages'] =DB::table('service_pages')->select('service_pages.*','service_type.type_name')
                    ->join('service_type' ,'service_type.service_type_id','=','service_pages.service_type_id')
                    ->where('service_pages.service_page_id',1)->first();
                    
                $data['inner_service_pages'] =DB::table('inner_service_pages')->select('inner_service_pages.*')
                    ->join('service_pages' ,'service_pages.service_page_id','=','inner_service_pages.service_page_id')
                    ->where('inner_service_pages.service_page_id',1)
                    ->get();
                  $data['menus'] = Menus::get();
                $view = 'frontend.digital_trans';
                break;
            
            case 'experience-transformation':

                $data['banner2'] = Attachments::where('menu_id',11)->first();
                $data['menus'] = Menus::get();
                $data['service_pages'] =DB::table('service_pages')->select('service_pages.*','service_type.type_name')
                    ->join('service_type' ,'service_type.service_type_id','=','service_pages.service_type_id')
                    ->where('service_pages.service_page_id',2)->first();
                $data['inner_service_pages'] =DB::table('inner_service_pages')->select('inner_service_pages.*')
                    ->join('service_pages' ,'service_pages.service_page_id','=','inner_service_pages.service_page_id')
                    ->where('inner_service_pages.service_page_id',2)
                    ->get();

                $view = 'frontend.experience_trans';
                break;
            case 'itstaffing-transformation':

                $data['banner3'] = Attachments::where('menu_id',13)->first();
                $data['menus'] = Menus::get();

                $data['service_pages'] =DB::table('service_pages')->select('service_pages.*','service_type.type_name')
                    ->join('service_type' ,'service_type.service_type_id','=','service_pages.service_type_id')
                    ->where('service_pages.service_page_id',3)->first();
                $data['inner_service_pages'] =DB::table('inner_service_pages')->select('inner_service_pages.*')
                    ->join('service_pages' ,'service_pages.service_page_id','=','inner_service_pages.service_page_id')
                    ->where('inner_service_pages.service_page_id',3)
                    ->get();
                $view = 'frontend.itstaffing';
                break;

                case 'contact-us':

                $data['menus'] = Menus::get();
                $data['caption'] = Attachments::where('menu_id',7)->first();
             
                $view = 'frontend.contact';
                break;


        }

        return view($view)->with($data);
    }
    public function postManage( Request $request)
    {
        $status=0;
        $data=Array();
        $html='';
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
            }

            return response()->json(['status' => $status,'data' =>$data,'html' =>$html]);
    
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