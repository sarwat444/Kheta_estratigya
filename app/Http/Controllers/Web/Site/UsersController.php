<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\users\StoreUserRequest;
use App\Http\Requests\Web\Admin\users\UpdateUserRequest;
use App\Models\Execution_year;
use App\Models\Mangement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct( private  User $user)
    {
    }
    public function index()
    {
        $users  =  $this->user->where(['geha_id'=>Auth::user()->id])->get() ;
        return  view('gehat.users.index')->with(compact('users')) ;
    }
    public function create()
    {
        $mangements =  Mangement::get() ;
        return  view('gehat.users.create')->with(compact('mangements')) ;
    }
    public function store(StoreUserRequest $storeUserRequest): \Illuminate\Http\RedirectResponse
    {
        $userData = $storeUserRequest->safe()->except(['_token']);
        $userData['password'] = Hash::make($userData['password']);

        $this->user->create($userData);

        return redirect()->back()->with('success', 'تم أضافة الجهة بنجاح');
    }
    public function  edit($id = null ):\Illuminate\View\View
    {
        $user  = User::with('mangemnet')->find($id) ;
        $mangements = Mangement::get() ;
        return view('gehat.users.edit-user')->with(compact('user' ,'mangements')) ;
    }
    public function update(UpdateUserRequest $userRequest , $id):\Illuminate\Http\RedirectResponse
    {
        $user_data  =  User::find($id) ;
        $old_password = $user_data['password'] ;
        $is_manger = $userRequest->is_manger ;

        $new_user_request  =  $userRequest->safe()->except(['_token']) ;
        if($user_data)
        {
            if(!empty($new_user_request['password']))
            {
                $new_user_request['password'] = Hash::make($new_user_request['password']) ;
            }else
            {
                $new_user_request['password'] =  $old_password ;
            }

            if(!empty($new_user_request['is_manger']) && $new_user_request['is_manger'] =='on' )
            {
                $new_user_request['is_manger'] = 1 ;
            }else
            {
                $new_user_request['is_manger']  = 0 ;
            }


            $user_data->update($new_user_request) ;
            return  redirect()->back()->with('success' ,  'تم تعديل  بيانات الجهه بنجاح') ;
        }
        else
        {
            return  redirect()->back()->with('error' ,  'الجهه ليست موجوده') ;
        }
    }
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = $this->user->find($id) ;
        if($user)
        {
            $user->delete() ;
            return  redirect()->back()->with('success' , 'User Deleted successfully') ;
        }
        return  redirect()->back()->with('error' , 'User Not Found ') ;
    }

}
