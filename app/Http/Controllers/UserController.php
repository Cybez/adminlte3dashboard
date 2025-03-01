<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    






public function createregister(){
    return view('AdminDashboard.Auth.register');
}

public function createlogin(){
    return view('AdminDashboard.Auth.login');
}


public function dashboard()
{ return view('welcome');
}



public function storeregister(Request $request)
{
    $user = new User();
    $request->validate([
        'name' => 'required|max:28',
        'email' => 'required|email|unique:users,email',
        'password' => 'nullable|max:38',
        'ConfirmPassword' => 'nullable|same:password',
        'role' => 'required|in:user,admin',
       
     ]);

   
    $user->name = $request->name;
   
    $user->email = $request->email;
  
    $user->password =bcrypt($request->password); 

    $user->role = $request->role; // Store role
      
    $user->save();

    return redirect()->back()->with('success', 'User inserted successfully');
   
}


public function storelogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|max:38',
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->back()->with('success', 'User logged in successfully');
    }

    return redirect()->back()->with('error', 'Your credentials are incorrect');
}




public function view()
{
    $users = User::latest()->get();
    return view('AdminDashboard.Auth.view', compact('users'));
}

public function updateRole(Request $request, $id)
{
    $user = User::find($id);

    $request->validate([
        'role' => 'required|in:user,admin',
    ]);

    $user->role = $request->role;
    $user->save();

    return redirect()->back()->with('success', 'User role updated successfully');
}



public function delete($id)
{
    $user = User::find($id);
    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully');
 }


 
 public function edit($id){
    $user = User::find($id);
   
    return view('AdminDashboard.Auth.edit',compact('user'));
}




public function update(Request $request ){

     $user = User::find($request->id);
    $request->validate([
        'name' => 'required|max:28',
        'email' => 'required|email',
        'password' => 'nullable|max:38',
        'ConfirmPassword' => 'nullable|same:password',
        'role' => 'required|in:user,admin',
       
    ]);

  
    if ($request->password === null){
$request['password'] = $user->password;
}else{ 
    $request['password'] = Hash::make($request->password);
}
unset($request['confirePassword ']);
$user->name = $request->name;

$user->email = $request->email;

$user->password =$request->password;

$user->role = $request->role; // Update role

  
    $user->save();
    return redirect('/viewusers')->with('success', 'User updated successfully');
}
}

