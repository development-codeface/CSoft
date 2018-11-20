<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permissions;
use App\Models\RoleHasPermissions;
use App\Models\Roles;
use App\Models\SubPermissions;
use App\Models\Tokens;
use App\Models\User;
use App\Models\Tocken;
use App\Models\UserHasRoles;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\Route;
use Request;
use Hash;
use DB;
use Auth;
use URL;
use Redirect;

class SettingsController extends Controller
{


    public function getView($id = 0)
    {
        $view = '';
        $data = Array();

        switch(Request::segment(1)) {


            case '':
                $view = 'admin.settings.login';
             break;

             case 'dashboard':
             $view = 'admin.settings.dashboard';
          break;

            case 'forgot':
                $view = 'admin.settings.forgotPassword';
                break;

            case 'adminReset':
                $query = DB::table('tokens');
                $query->where('token_status',1);
                $query->where('token_code',Request::segment(2));
                $token = $query->first();
                if($token!=null){
                    $data['resetId'] =$token;
                }else{
                    return Redirect::to(URL::route('AdminLogin'));
                }

                $view = 'admin.settings.resetPassword';
                break;


            case 'admin-profile':
                $data['userProfile'] = User::where('id',Auth::user()->id)->first();
                
                $view = 'admin.settings.profile';
                break;
            case 'admin-password':
                $view = 'admin.settings.password';
            break;

            case 'permissions':
                $data['permissions']=  DB::table('permissions')->where('permission_type' ,'main')->orderBy('permission_id' ,'asc')->get();
                $view = 'admin.settings.permissions.list';
            break;
            case 'create-permission':
                $data['routes']= DB::table('permissions')->where('permission_type' ,'main')->orderBy('permission_id' ,'asc')->get();
                if($id!='') {
                    $data['permission'] = DB::table('permissions')->where('permission_slug', $id)->first();
                    if ($data['permission'] == null) {
                        return Redirect::to(URL::route('Permissions'));
                    }
                }
                $view = 'admin.settings.permissions.edit';
             break;
            case 'roles':
                $data['roles']= DB::table('roles')->where('role_id','<>' ,1)->orderBy('role_id' ,'asc')->get();
                $view = 'admin.settings.roles.list';
            break;
            case 'create-role':
                $data['permissions']= DB::table('permissions')->orderBy('permission_id' ,'asc')->get();

                if($id!='') {
                    $data['role'] = DB::table('roles')->where('role_slug', $id)->first();
                    if ($data['role'] == null) {
                        return Redirect::to(URL::route('Roles'));
                    }
                }
                $view = 'admin.settings.roles.edit';
             break;

            case 'user-roles':
                $data['users']= DB::table('users')
                    ->join('user_has_roles','user_has_roles.users_user_id' , '=', 'users.id')
                    ->join('roles','roles.role_id' , '=', 'user_has_roles.roles_role_id')
                    ->where('id','<>' ,1)->orderBy('id' ,'asc')->get();
                $view = 'admin.settings.user_roles.list';
            break;
            case 'create-user-role':
                $data['roles']= DB::table('roles')->where('role_id','<>' ,1)->orderBy('role_id' ,'asc')->get();
                if($id!='') {
                    $data['user']= DB::table('users')
                        ->join('user_has_roles','user_has_roles.users_user_id' , '=', 'users.id')
                        ->join('roles','roles.role_id' , '=', 'user_has_roles.roles_role_id')
                        ->where('id','<>' ,1)->where('role_slug' ,$id)->first();
                    if ($data['user'] == null) {
                        return Redirect::to(URL::route('UserRoles'));
                    }
                }
                $view = 'admin.settings.user_roles.edit';
             break;
            case '$2y$10$V091JdZYAeUEdnuQZaEUUe24XOd9gcp3eqi27jUbU43uFrMJR':
                  $view = 'admin.settings.404';
             break;
        }

        return view($view)->with($data);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //common post function
    public function authManage(){
        $message = "";
        $status = 0;
        $html = "";
        $data = "";


        switch (Request::input('type')) {
            case 'login':
                if (Auth::attempt(['email' => Request::input('email'), 'password'=> Request::input('password'),'roles_role_id'=> 1]))
                {
                    $status = 1;
                }else{
                    $status = 0;
                }
            break;

            case 'forgotPassword':
                $email =Request::input('forgot_email');
                if(isset($email)) {

                    $query = DB::table('users');
                    $query->where('users.email', $email);
                    $user = $query->first();
                    $token = md5(uniqid(rand(), true ));
                    if(!empty($user)) {
                        Tokens::create([
                            'token_code' => $token,
                            'user_id' => $user->id,
                            'token_status' => 1,
                        ]);

                        $data['type'] = "AdminResetPassword";
                        $data['url'] = URL::route("AdminResetPassword") . '/' . $token;
                        $data['userId'] = $user->id;
                        $data['tocken'] = $token;
                        Mail::send('layouts.email', $data, function ($message) {
                            $message->to(Request::input('forgot_email'), 'Reset Password ')->from('amil@kawikatechgnologies.com')->subject('Reset Password');
                        });
                        $html = 'Your Mail Successfiully Updated';
                        $status = 1;
                    }else{
                        $status = 2;
                        $html = '<p style="color: red;">Invalid Email Address</p>';

                    }


                }

                break;

            case 'AdminResetPassword':
                $adminResetPassword = User::find(Request::input('userId'));
                $adminResetPassword->password = Hash::make(Request::input('password'));
                $adminResetPassword->save();
                $delete = Tokens::where('user_id',Request::input('userId'))->delete();

            break;

            case 'AdminUpdateProfile':
                $adminUpdateProfile = User::find(Request::input('user_id'));
                $adminUpdateProfile->name = Request::input('username');
                $adminUpdateProfile->email = Request::input('email');
                $adminUpdateProfile->save();
            break;

            case 'AdminUpdatePassword':
      
                $adminUpdatePassword = User::find(Request::input('user_id'));

                $adminUpdatePassword->password = Hash::make(Request::input('password'));
                $adminUpdatePassword->save();
                $status=1;
            break;

            case 'addPermissions':

                if(Request::input('permission_id')!=''){
                    $update = Permissions::find(Request::input('permission_id'));
                    $update->update(Request::all());
                }else{
                    if(Request::input('permissions_permission_id')!=''){
                        $createPermission =Permissions::create(Request::all()+ ['permission_type' => 'sub']+ ['permission_route_id' => Request::input('permissions_permission_id')]);
                    }else{
                        $createPermission =Permissions::create(Request::all()+ ['permission_type' => 'main']);

                    }
                }

            break;
            case 'deletePermision':
                if(Request::input('delete_id')!=''){
                    $delete = RoleHasPermissions::where('permissions_permission_id',Request::input('delete_id'))->delete();
                    $delete = Permissions::find(Request::input('delete_id'))->delete();
                }

            break;

            case 'addUserRoles':
                if(Request::input('id')!='') {
                    $updateUser = User::find(Request::input('id'));
                    $updateUser->username = Request::input('username');
                    $updateUser->email = Request::input('email');
                    $updateUser->password = Hash::make(Request::input('password'));
                    $updateUser->roles_role_id = Request::input('roles_role_id');
                    $updateUser->save();

                    $UserRole =UserHasRoles::where('users_user_id',Request::input('id'))->first();
                    $updateUserRole =UserHasRoles::find($UserRole->user_has_role_id);
                    $updateUserRole->users_user_id = $updateUser->id;
                    $updateUserRole->roles_role_id = Request::input('roles_role_id');
                    $updateUserRole->save();
                }else{

                    $createUser = User::create([
                        'username' => Request::input('username'),
                        'email' => Request::input('email'),
                        'password' => Hash::make(Request::input('password')),
                        'roles_role_id' => Request::input('roles_role_id'),
                    ]);
                    $create = UserHasRoles::create([
                        'users_user_id' => $createUser->id,
                        'roles_role_id' => Request::input('roles_role_id'),
                    ]);
                }

                $data['type'] = "RolePassword";
                $data['password'] = Request::input('password');
                $data['email'] = Request::input('email');
                Mail::send('layouts.email', $data, function ($message) {
                    $message->to(Request::input('email'), 'Role Password ')->from('amil@kawikatechgnologies.com')->subject('Role Password');
                });
                $status =1;

            break;
            case 'deleteUserRole':
                return Request::input('delete_id');
                if(Request::input('delete_id')!=''){
                    $delete = UserHasRoles::where('users_user_id',Request::input('delete_id'))->delete();
                    $delete = User::find(Request::input('delete_id'))->delete();
                }

            break;
            case 'addRoles':
                $mainPermissions =Request::input('permissions_permission_id');

                if(Request::input('role_id')!=''){
                    $update = Roles::find(Request::input('role_id'));
                    $update->update(Request::all());

                    $delete =RoleHasPermissions::where('roles_role_id',Request::input('role_id'))->delete();
                    foreach ($mainPermissions as $mainPermission ) {
                        $createRoleHasPermissions =RoleHasPermissions::create([
                            'permissions_permission_id' => $mainPermission,
                            'roles_role_id' => $update->role_id,
                        ]);
                    }
                }else{
                    $create =Roles::create(Request::all());
                    foreach ($mainPermissions as $mainPermission ) {
                        $createRoleHasPermissions =RoleHasPermissions::create([
                            'permissions_permission_id' => $mainPermission,
                            'roles_role_id' => $create->role_id,
                        ]);
                    }
                }

            break;
            case 'deleteRole':
                if(Request::input('delete_id')!=''){
                   $delete = RoleHasPermissions::where('roles_role_id',Request::input('delete_id'))->delete();
                   $delete = Roles::find(Request::input('delete_id'))->delete();
                }

            break;
        }
        return response()->json(['status' => $status, 'message' => $message, 'html' => $html, 'data' => $data]);

    }


}
