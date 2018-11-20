<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Libraries\UploadFileHandler;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Menus;
use App\Models\Pages;
use App\Models\SubPages;
use App\Models\Attachments;
use App\Models\Testimonials;
use App\Models\Reviews;
use App\Models\ServiceType;
use App\Models\ServicePages;

use Request;
use Hash;
use DB;
use Auth;
use URL;
use App;
use Redirect;


class AdminController extends Controller
{

    public function getView($id = 0)
    {
        $view = '';
        $data = Array();

        switch(Request::segment(1)) {

            case 'categories':
                $data['categories']= Categories::where('is_active',1)->get();
                $view = 'admin.categories.list';
            break;
            case 'new-category':

                if($id!=''){
                    $data['category']= Categories::where('category_token' ,$id)->first();
                    if(empty($data['category'])){
                        return Redirect::to(URL::route('Categories'));
                    }
                    $view = 'admin.categories.edit';
                }else{
                    $view = 'admin.categories.edit';
                }

            break;


            case 'brands':
                $data['brands']= Brands::where('is_active',1)->get();
                $view = 'admin.brands.list';
             break;

            case 'new-brand':

                if($id!=''){
                    $data['brand']= Brands::where('brand_token' ,$id)->first();
                    if(empty($data['brand'])){
                        return Redirect::to(URL::route('Brands'));
                    }
                    $view = 'admin.brands.edit';
                }else{
                    $view = 'admin.brands.edit';
                }

            break;
            case 'menus':

                $data['menus']= Menus::get();

                $view = 'admin.menus.list';
                break;

            case 'new-menu':

                if($id!=''){
                    $data['menu']= Menus::where('menu_id' ,$id)->first();

                    if(empty($data['menu'])){
                        return Redirect::to(URL::route('Menus'));
                    }
                    $view = 'admin.menus.edit';
                }else{
                    $view = 'admin.menus.edit';
                }

                break;

            case 'pages':

                $data['pages']= Pages::join('menus','menus.menu_id','=','pages.menu_id')
                ->WhereNull('pages.page_type')
                ->where('pages.menu_id',1)->get();



                $view = 'admin.pages.list';
                break;

            case 'new-page':

                $data['menus']= Menus::get();
                
                if($id!=''){
                    $data['page']= DB::table('pages')
                        ->select('pages.*','menus.menu_name')
                        ->join('menus','menus.menu_id','=','pages.menu_id')
                        ->where('page_id' ,$id)
                        ->first();
                    $data['service_types'] = ServiceType::get();

                    if(empty($data['page'])){
                        return Redirect::to(URL::route('Pages'));
                    }
                    $view = 'admin.pages.edit';
                }else{
                    $data['service_types'] = ServiceType::get();
                    $view = 'admin.pages.edit';
                }

                break;

            case 'sub-pages':

                $data['page_id']=$id;

                $data['subpages']= SubPages::join('pages','pages.page_id','=','sub_pages.pages_page_id')
                                            ->leftjoin('service_type','service_type.service_type_id','=','sub_pages.service_type_id')
                                            ->where('pages_page_id' ,$id)
                                            ->get();
                $data['type']= SubPages::join('pages','pages.page_id','=','sub_pages.pages_page_id')
                    ->join('service_type','service_type.service_type_id','=','sub_pages.service_type_id')
                    ->where('sub_page_id' ,$id)
                    ->first();


                $view = 'admin.subpages.list';
                break;

            case 'new-sub-page':
                
                $data['page_id']=$id;
                
                $data['service_types'] = ServiceType::get();

                    $view = 'admin.subpages.edit';

                break;
            case 'edit-sub-page':

                $data['attachments'] = Attachments::where('subpages_page_id','=',$id)->get();
            

                $data['service_types'] = ServiceType::get();

                $data['sub_service']= SubPages::join('service_type','service_type.service_type_id','=','sub_pages.service_type_id')
                                            ->where('sub_page_id' ,$id)
                                            ->first();
                $data['sub_about']= SubPages::where('sub_page_id' ,$id)
                                            ->first();

                    $view = 'admin.subpages.edit';

                break;
            case 'banners':

                $data['banners']= Attachments::join('menus','menus.menu_id','=','attachments.menu_id')->get();


                $view = 'admin.banners.list';
                break;

            case 'new-banner':

                $data['menus']= Menus::get();

                if($id!=''){
                    
                    $data['banner']= DB::table('attachments')
                        ->join('menus','menus.menu_id','=','attachments.menu_id')
                        ->where('attachments.attachment_id' ,$id)
                        ->first();
                       
                    $data['attachments'] = Attachments::where('attachment_id','=',$id)->get();
                    //$data['service_types'] = ServiceType::get();
                    if(empty($data['banner'])){
                        return Redirect::to(URL::route('Banners'));
                    }
                    $view = 'admin.banners.edit';
                }else{
                    $view = 'admin.banners.edit';
                }

                break;

               
               

            case 'create-testimonial' :


                $view = 'admin.testimonials.create';
                break;

            case 'testimonials' :

                $data['tests'] =Testimonials::get();

                $view = 'admin.testimonials.list';

                break;
            case 'testimonial-edit' :

                $data['test'] =Testimonials::where('testimonial_id',$id)->first();

                $view = 'admin.testimonials.edit';

                break;

                case 'create-review' :

                $view = 'admin.clients.create';
                break;
                case 'create-about' :

                $view = 'admin.about.create';
                break;
                case 'about_list' :

                $data['pages'] =Pages::leftjoin('attachments','attachments.pages_page_id','=','pages.page_id')->where('type','=','about_us')->get();

                $view = 'admin.about.list';
               
                break;
                case 'about_edit' :

                $data['test'] =Pages::leftjoin('attachments','attachments.pages_page_id','=','pages.page_id')
                ->where('type','=','about_us')
                ->where('page_id',$id)->first();

                $view = 'admin.about.edit';

                break;
                case 'create-armour' :

                $view = 'admin.armour.create';
                break;
                case 'armour' :

                $data['pages'] =Pages::leftjoin('attachments','attachments.pages_page_id','=','pages.page_id')->where('type','=','armour_levels')->get();

                $view = 'admin.armour.list';
               
                break;
                case 'armour_edit' :

                $data['test'] =Pages::leftjoin('attachments','attachments.pages_page_id','=','pages.page_id')
                ->where('type','=','armour_levels')
                ->where('page_id',$id)->first();

                $view = 'admin.armour.edit';

                break;
            case 'reviews' :

                $data['tests'] =Reviews::get();

                $view = 'admin.clients.list';

                break;
            case 'review-edit' :

                $data['test'] =Reviews::where('review_id',$id)->first();

                $view = 'admin.clients.edit';

                break;
                case 'service-page-edit' :

                $data['service'] =Pages::where('page_type','service')->first();

                $view = 'admin.service_page.edit';

                break;



                case 'client-page-edit' :

                $data['client'] =Pages::where('page_type','client')->first();

                $view = 'admin.client_page.edit';

                break;
               case 'service-pages' :
                $data['service_pages'] =DB::table('service_pages')->select('service_pages.*','service_type.type_name')->join('service_type' ,'service_type.service_type_id','=','service_pages.service_type_id')->get();
                $view = 'admin.service_pages.list';

                break;
                case 'edit-service-page' :
                    $data['service_types'] = ServiceType::get();

                    $data['service_page'] =DB::table('service_pages')->select('service_pages.*','service_type.type_name')->join('service_type' ,'service_type.service_type_id','=','service_pages.service_type_id')
                    ->where('service_pages.service_page_id',$id)->first();
                $view = 'admin.service_pages.edit';
               break;
                case 'inner-service-page' :
                    $data['inner_service_pages'] =DB::table('inner_service_pages')->select('inner_service_pages.*')
                        ->join('service_pages' ,'service_pages.service_page_id','=','inner_service_pages.service_page_id')
                        ->where('inner_service_pages.service_page_id',$id)
                        ->get();
                $view = 'admin.inner_service_pages.list';

                break;
                case 'new-inner-service-page' :
                    $data['service_page_id'] =ServicePages::find($id);
                   $view = 'admin.inner_service_pages.edit';
               break;
           case 'edit-inner-service-page' :

               $data['inner_service_pages'] =DB::table('inner_service_pages')->select('inner_service_pages.*')
                   ->join('service_pages' ,'service_pages.service_page_id','=','inner_service_pages.service_page_id')
                   ->where('inner_service_pages.inner_service_page_id',$id)->first();
               $view = 'admin.inner_service_pages.edit';
               break;
        }

        return view($view)->with($data);
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
