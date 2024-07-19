<?php

use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
Route::get('Home', function () {
    return Inertia::render('Home');
});

Route::get('/Users', function () {
    return Inertia::render('Users', [
        'users' => User::query()->orderBy('id','DESC')
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'can' => [
                    'edit' => Auth::user()->can('edit',$user)
                ]
            ]),
        'filters' => Request::only(['search']),
        'can' => [

            'createUser' => Auth::user()->can('create',User::class)
        ],
    ]);
});
Route::get('/users/{id}/edit',function ($id){
    dd($id);
})->middleware('can:edit,App\Models\User');

Route::get('/Setting',function (){
   return Inertia::render('Setting');
});

Route::get('/Users/Create',function (){
   return Inertia::render('Users/create');
//})->middleware('can:create,App\Models\User');
})->can('create,App\Models\User');

Route::post("/Users",function (){
  $createUser =  Request::validate([
     'name' => 'required',
     'email' => 'required|email',
     'password' => 'required',
  ]);
  User::create($createUser);
  return redirect('/Users');
});

Route::post('/logout',[LoginController::class,'destroy'])->middleware('auth');
});
//Route::get('/login',function (){
//    return "FFf";
//})->name('login');
Route::get('/login',[LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'store']);
//nav>ul>li*3>a[href=#

//php artisan make:policy UserPolicy --model=User
