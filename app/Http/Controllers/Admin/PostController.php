<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Menus;
use App\Models\Pages;
use App\Models\SubPages;
use App\Models\Attachments;
use App\Models\ServiceType;
use App\Models\ServicePages;
use App\Models\InnerServicePages;
use App\Models\Testimonials;
use App\Models\Reviews;
use App\Libraries\UploadFileHandler;


use Request;
use Hash;
use DB;
use Auth;
use URL;
use App;

class PostController extends Controller
{
    //common post function
    public function postManage(){
        $message = "";
        $status = 0;
        $html = "";
        $data = null;

        $url = "";

        switch (Request::input('type')) {
            case 'newCategory':
             
                if(Request::input('category_id')!=''){
                    $update = Categories::find(Request::input('category_id'));
                    $update->update(Request::all()+['category_slug' =>str_slug(Request::input('category_name'))]);
                }else{

                    $create =Categories::create(Request::all()+['category_slug' =>str_slug(Request::input('category_name'))]);
                }
            break;

            case 'newBrand':
                if(Request::input('brand_id')!=''){
                    $update = Brands::find(Request::input('brand_id'));
                    $update->update(Request::all()+['brand_slug' =>str_slug(Request::input('brand_name'))]);
                }else{
                    $create =Brands::create(Request::all()+['brand_slug' =>str_slug(Request::input('brand_name'))]);
                }
            break;
            case 'newMenu':

                if(Request::input('menu_id')!=''){
                    $update = Menus::find(Request::input('menu_id'));
                   
                    $update->update(Request::all());
                }else{

                    $create =Menus::create(Request::all());
                }
                break;
    
                case 'newAbout':

                $addPages = Pages::create([
                    'title' => Request::input('title'),
                    'sub_title' => Request::input('sub_title'),
                    'content' => Request::input('content'),
                    'type' => 'about_us',
                ]);
                    $imageURL = Request::input('fileURLs');
                    if ($imageURL) {
                        $totalUrls = count(Request::input('fileURLs'));

                        for ($i = 0; $i < $totalUrls; $i++) {
                            $filepath = 'data/pages/' . time() . '-' . $imageURL[$i];

                            $oldpath = 'data/temp/' . $imageURL[$i];

                            if (file_exists($oldpath)) {
                                if (rename($oldpath, $filepath) == FALSE) {
                                    copy($oldpath, $filepath);
                                } elseif (file_exists('data/temp/' . $imageURL[$i])) {
                                    unlink('data/temp/' . $imageURL[$i]);
                                }
                            }
                            $image =Attachments::create([
                                'attachment_url' => time() . '-' . $imageURL[$i],
                                'pages_page_id' => $addPages->page_id,
                            ]);
                        }
                    }
                
            break;

            case 'editAbout':

            $update = Pages::find(Request::input('page_id'));
            
            $update->title =Request::input('title') ;
            $update->sub_title =Request::input('sub_title') ;
            $update->content =Request::input('content') ;
            $update->save();

                    $totalUrls = count(Request::input('fileURLs'));
                    
                    $imageURLs = Request::input('fileURLs');
                    $fileURLs = Request::input('fileURLs');
                    $fileLabels = Request::input('fileLabels');
                if(!empty($fileURLs)){

                    for ($i = 0; $i < $totalUrls; $i++) {

                        $ext = explode(".", $fileURLs[$i]);

                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($j = 0; $j < 30; $j++) {
                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                        $filename = md5($randomString);

                        $filepath = 'data/pages/' . $filename . "." . $ext[1];
                        //$oldpath = str_replace(url(),"",$storeImageURLs[$i]);
                        $oldpath = 'data/temp/' . $fileURLs[$i];

                        if (file_exists($oldpath)) {
                            if (rename($oldpath, $filepath) == FALSE) {
                                copy($oldpath, $filepath);

                            }

                            $filename = $filename . "." . $ext[1];
                            $attachment_ext = explode(".", $filename);

                        } else {
                            $filename = $imageURLs[$i];
                            $attachment_ext = explode(".", $filename);

                        }
                        $attachment =Attachments::create([
                            'attachment_url' => $filename,
                            
                            'pages_page_id' => $update->page_id
                        ]);
                    }
                }
            break;
            
         case 'newArmour':
         $image =Pages::create([
            'title' => Request::input('title'),
            'sub_title' => Request::input('sub_title'),
            'content' => Request::input('content'),
            'type' => 'armour_levels',

        ]);
         break;

           case 'editArmour':
          
           $update = Pages::find(Request::input('page_id'));
                    $update->title =Request::input('title') ;
                    $update->sub_title =Request::input('sub_title') ;
                    $update->content =Request::input('content') ;
                    $update->save();
           break;
            case 'newBanner':

                if(Request::input('page_id')!=''){
                 
                    $update = Attachments::find(Request::input('page_id'));
                    $update->caption =Request::input('caption') ;
                    $update->sub_caption =Request::input('sub_caption') ;
                    $update->save();

                    $imageURL = Request::input('fileURLs');
                    if ($imageURL) {
                       
                        $totalUrls = count(Request::input('fileURLs'));

                        for ($i = 0; $i < $totalUrls; $i++) {
                            $filepath = 'data/banners/' . time() . '-' . $imageURL[$i];

                            $oldpath = 'data/temp/' . $imageURL[$i];

                            if (file_exists($oldpath)) {
                                if (rename($oldpath, $filepath) == FALSE) {
                                    copy($oldpath, $filepath);
                                } elseif (file_exists('data/temp/' . $imageURL[$i])) {
                                    unlink('data/temp/' . $imageURL[$i]);
                                }
                            }
                        
                         $brd=Attachments::find($update->attachment_id);
                        $brd->attachment_url =time() . '-' . $imageURL[$i];
                        $brd->save();
                        }
                    }
                    
                }else{

                    $imageURL = Request::input('fileURLs');
                    if ($imageURL) {
                        $totalUrls = count(Request::input('fileURLs'));

                        for ($i = 0; $i < $totalUrls; $i++) {
                            $filepath = 'data/banners/' . time() . '-' . $imageURL[$i];

                            $oldpath = 'data/temp/' . $imageURL[$i];

                            if (file_exists($oldpath)) {
                                if (rename($oldpath, $filepath) == FALSE) {
                                    copy($oldpath, $filepath);
                                } elseif (file_exists('data/temp/' . $imageURL[$i])) {
                                    unlink('data/temp/' . $imageURL[$i]);
                                }
                            }
                            $image =Attachments::create([
                                'attachment_url' => time() . '-' . $imageURL[$i],
                                'menu_id' => Request::input('menu_id'),
                               
                                'caption' => Request::input('caption'),
                                'sub_caption' => Request::input('sub_caption'),
                                'service_type_id' => Request::input('service_type_id'),

                            ]);
                        }
                    }
                }
                break;
         
                



        }
        return response()->json(['status' => $status, 'message' => $message, 'html' => $html, 'data' => $data, 'url' => $url]);

    }


    public function postRemove(){
        $message = "";
        $status = 0;
        $html = "";
        $data = "";


        switch (Request::input('type')) {

            case 'deleteOurTeam':
                $get =OurTeam::find(Request::input('our_team_id'));
                if (file_exists('data/pooja/' . $get->image) )
                    unlink('data/pooja/' . $get->image);
                $delete =OurTeam::where('our_team_id', Request::input('our_team_id'))->delete();
            break;

            case 'deleteQuestion':
                $delete =CategoryHasQuestions::where('questions_question_id', Request::input('delete_id'))->delete();
                $delete =Answers::where('questions_question_id', Request::input('delete_id'))->delete();
                $delete =Questions::where('question_id', Request::input('delete_id'))->delete();
            break;



            case 'deleteENcategory':
                $getList =CategoryHasQuestions::where('categories_category_id', Request::input('delete_id'))->get();
                foreach ($getList as $get){
                    $delete =Answers::where('questions_question_id', $get->question_id)->delete();
                    $delete =Questions::where('question_id', $get->question_id)->delete();
                }
                $get = Attachments::where('categories_category_id', Request::input('delete_id'))->first();
                if (file_exists('data/category/' . $get->attachment_url) && $get->attachment_url != '')
                    unlink('data/category/' . $get->attachment_url);
                $delete = Attachments::where('categories_category_id', Request::input('delete_id'))->delete();
                $delete =EnCategories::where('category_id', Request::input('delete_id'))->delete();
            break;
            case 'deleteAvatar':
                $get = Avatar::where('avatar_id', Request::input('delete_id'))->first();
                if (file_exists('data/avatar/' . $get->avatar) && $get->avatar != '')
                    unlink('data/avatar/' . $get->avatar);
                $delete =Avatar::where('avatar_id', Request::input('delete_id'))->delete();
            break;
            case 'removeImage':

                $getattachment = Attachments::where('attachment_id', Request::input('id'))->get();

                foreach ($getattachment as $attachment) {
                    $image_path = public_path("data/pages/{$attachment->attachment_url}");
                    unlink($image_path);

                }
                DB::table('attachments')->where('attachment_id', '=', Request::input('id'))->delete();
                $status=1;
            break;
            case 'removeSubPageImage':

                $getattachment = Attachments::where('attachment_id', Request::input('id'))->get();

                foreach ($getattachment as $attachment) {
                    $image_path = public_path("data/subpages/{$attachment->attachment_url}");
                    unlink($image_path);

                }

                DB::table('attachments')->where('attachment_id', '=', Request::input('id'))->delete();
                $status=1;
            break;
            case 'removeBanner':

                $getattachment = Attachments::where('attachment_id', Request::input('id'))->get();

                foreach ($getattachment as $attachment) {
                    $image_path = public_path("data/banners/{$attachment->attachment_url}");
                    unlink($image_path);

                }

                DB::table('attachments')->where('attachment_id', '=', Request::input('id'))->delete();
                $status=1;
                break;
            case 'removeTestImage':

                $getattachment = Attachments::where('attachment_id', Request::input('id'))->get();

                foreach ($getattachment as $attachment) {
                    $image_path = public_path("data/testimonials/{$attachment->attachment_url}");
                    unlink($image_path);

                }

                DB::table('attachments')->where('attachment_id', '=', Request::input('id'))->delete();
                $status=1;
                break;

                case 'removeclientImage':

                $getattachment = Reviews::where('review_id', Request::input('id'))->get();
            

                foreach ($getattachment as $attachment) {
                    $image_path = public_path("data/reviews/{$attachment->client_img}");
                    unlink($image_path);

                }

                /* DB::table('reviews')->where('attachment_id', '=', Request::input('id'))->delete(); */
                $status=1;
                break;
            case 'delete_banner':

                $getattachment = Attachments::where('attachment_id', Request::input('delete_id'))->delete();


/*                DB::table('attachments')->where('attachment_id', '=', Request::input('id'))->delete();*/
                $status=1;
                break;
                case 'delete_testimonials':

                Testimonials::find(Request::input('delete_id'))->delete();

                $status = 1;
                break;
                case 'delete_reviews':

                Reviews::find(Request::input('delete_id'))->delete();

                $status = 1;
                break;
                
                case 'delete_inner_pages':

                InnerServicePages::find(Request::input('delete_id'))->delete();

                $status = 1;
                break;

        }
        return response()->json(['status' => $status, 'message' => $message, 'html' => $html, 'data' => $data]);

    }


    public function postFileUpload(){

        $option = array(

            'upload_dir' => 'data/temp/',
        );
       
        $upload_handler = new UploadFileHandler($option);
    }


}
