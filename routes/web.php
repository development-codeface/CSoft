<?php

Route::group(['middleware' => ['web']], function () {
   $adminDomainUrl = "admin.csoft.test";
  $domainUrl = "csoft.test";

//    if (App::environment() != 'local') {
//        $DomainUrl = "netproclivity.test";
//        $adminDomainUrl = "admin.e-learning.kawikatech.com";
//    }
    //

    Route::group(['domain' => $adminDomainUrl], function(){
        //ssdd('dfdds');
        //User methods
           Route::group(['middleware' => ['guest']], function () {
                Route::get('', ['as' => 'AdminLogin', 'uses' => 'Admin\SettingsController@getView']);
                Route::post('user/auth', ['as' => 'AdminAuthManage', 'uses' => 'Admin\SettingsController@authManage']);
                Route::get('adminReset/{token?}', ['as' => 'AdminResetPassword', 'uses' => 'Admin\SettingsController@getView']);

           });

           Route::group(['middleware' => ['auth']], function () {
               
                Route::post('post/manage', ['as' => 'AdminPostManage', 'uses' => 'Admin\SettingsController@authManage']);
                Route::post('post-data', ['as' => 'postData', 'uses' => 'Admin\PostController@postManage']);
                Route::post('post-image', ['as' => 'PostImageUpload', 'uses' => 'Admin\PostController@postFileUpload']);
                Route::post('post-remove', ['as' => 'PostRemove', 'uses' => 'Admin\PostController@postRemove']);
                Route::post('validate/{id?}', ['as' => 'Validation', 'uses' => 'Admin\ValidationController@postValidation']);
                Route::post('post/dropdowns', ['as' => 'PostDropdowns', 'uses' => 'Admin\PostController@postDropdowns']);
    //Authentication
                Route::get('logout', ['as' => 'AdminLogout', 'uses' => 'Admin\SettingsController@logout']);
                Route::get('admin-profile', ['as' => 'AdminProfile', 'uses' => 'Admin\SettingsController@getView']);
                Route::get('admin-password', ['as' => 'AdPostImageUploadminPassword', 'uses' => 'Admin\SettingsController@getView']);
                Route::get('dashboard', ['as' => 'DashBoard', 'uses' => 'Admin\SettingsController@getView']);

               /*Admin permissions*/
               Route::get('permissions', ['as' => 'Permissions', 'uses' => 'Admin\SettingsController@getView']);
               Route::get('create-permission/{token?}', ['as' => 'CreatePermission', 'uses' => 'Admin\SettingsController@getView']);

               /*Admin Roles*/
               Route::get('roles', ['as' => 'Roles', 'uses' => 'Admin\SettingsController@getView']);
               Route::get('create-role/{token?}', ['as' => 'CreateRole', 'uses' => 'Admin\SettingsController@getView']);
               /*Admin Roles*/
               Route::get('user-roles', ['as' => 'UserRoles', 'uses' => 'Admin\SettingsController@getView']);
               Route::get('create-user-role/{token?}', ['as' => 'CreateUserRoles', 'uses' => 'Admin\SettingsController@getView']);
             
               Route::get('create-about',['as' => 'AdminAboutCreate', 'uses' => 'Admin\AdminController@getView']);
               Route::get('about_list',['as' => 'AdminAboutList', 'uses' => 'Admin\AdminController@getView']);

               Route::get('about_edit/{id}', ['as' => 'AdminAboutUsEdit', 'uses' => 'Admin\AdminController@getView']);

               Route::get('create-armour',['as' => 'AdminArmourCreate', 'uses' => 'Admin\AdminController@getView']);
               Route::get('armour',['as' => 'AdminArmourList', 'uses' => 'Admin\AdminController@getView']);

               Route::get('armour_edit/{id}', ['as' => 'AdminArmourUsEdit', 'uses' => 'Admin\AdminController@getView']);

/*Menus*/
               Route::get('menus', ['as' => 'Menus', 'uses' => 'Admin\AdminController@getView']);
               Route::get('new-menu/{token?}', ['as' => 'NewMenu', 'uses' => 'Admin\AdminController@getView']);
/*Brands*/
               Route::get('brands', ['as' => 'Brands', 'uses' => 'Admin\AdminController@getView']);
               Route::get('new-brand/{token?}', ['as' => 'NewBrand', 'uses' => 'Admin\AdminController@getView']);
               /*Brands*/
               

               Route::get('banners', ['as' => 'Banners', 'uses' => 'Admin\AdminController@getView']);
               Route::get('new-banner/{token?}', ['as' => 'NewBanner', 'uses' => 'Admin\AdminController@getView']);

               Route::get('testimonials',['as' => 'AdminTestimonial', 'uses' => 'Admin\AdminController@getView']);
               Route::get('create-testimonial',['as' => 'AdminTestimonialCreate', 'uses' => 'Admin\AdminController@getView']);
               Route::get('testimonial-edit/{id}', ['as' => 'AdminTestimonialEdit', 'uses' => 'Admin\AdminController@getView']);

               Route::get('reviews',['as' => 'AdminReview', 'uses' => 'Admin\AdminController@getView']);
               Route::get('create-review',['as' => 'AdminReviewCreate', 'uses' => 'Admin\AdminController@getView']);
               Route::get('review-edit/{id}', ['as' => 'AdminReviewEdit', 'uses' => 'Admin\AdminController@getView']);
               Route::get('service-page-edit/{id}', ['as' => 'AdminServicePageEdit', 'uses' => 'Admin\AdminController@getView']);
               Route::get('client-page-edit/{id}', ['as' => 'AdminClientPageEdit', 'uses' => 'Admin\AdminController@getView']);
           });
        Route::get('$2y$10$V091JdZYAeUEdnuQZaEUUe24XOd9gcp3eqi27jUbU43uFrMJR', ['as' => '404', 'uses' => 'Admin\SettingsController@getView']);


    });

    Route::group(['domain' => $domainUrl], function () {



        Route::group(['middleware' => ['guest']], function () {

            Route::get('',['as' => 'Csoft', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('sign-in',['as' => 'SignIn', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('sign-up',['as' => 'SignUp', 'uses' => 'Frontend\FrontendController@getView']);

            Route::get('about-us/{token?}',['as' => 'AboutUs', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('executive-team/{token?}',['as' => 'ExecutiveTeam', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('services/{token?}',['as' => 'Services', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('digital-transformation/{token?}',['as' => 'Digitaltransformation', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('experience-transformation/{token?}',['as' => 'Experiencetransformation', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('itstaffing-transformation/{token?}',['as' => 'Itstaffingtransformation', 'uses' => 'Frontend\FrontendController@getView']);
            Route::get('contact-us/{token?}',['as' => 'Contact', 'uses' => 'Frontend\FrontendController@getView']);

            Route::post('post-contact', ['as' => 'PostManage', 'uses' => 'Frontend\FrontendController@postManage']);
        });

        Route::group(['middleware' => ['auth']], function () {

        });

    });
});





