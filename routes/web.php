<?php
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\PersonalInfo;

use App\Profile;
use App\User;
use App\Appointment;
use App\PageModel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','HomePageController@index')->name('home.index');
Route::post('/search',function(){
    $msg = [];
    $q = Input::get('q');
    $query = Input::get('query');
    if($q != "" || $query != ""){
        $user = DB::table('personal_info')
        ->leftJoin('profile', 'personal_info.user_id', '=', 'profile.user_id')->where('pincode','LIKE',$q . '%')
        ->Where('name','LIKE',$query . '%')
        ->get();
        $details = DB::table('personal_info')
        ->leftJoin('profile', 'personal_info.user_id', '=', 'profile.user_id')->where('pincode','LIKE',$q . '%')
        ->Where('name','LIKE',$query . '%')
        ->get();
        if(count($user)> 0)
            return view('listing')->withDetails($user)->withQuery($q);
    }
    elseif($q == "" || $query != ""){
        return view('home');
    }
    if(!empty($query)){
        return view('listing')->withMessage("No Doctors found");
    }
    return view('listing')->withMessage("No Doctors found with ".$q ." zipcode");
    
});
Route::get('/login','LoginController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/***
 * User Route
 */
Route::get('/find/{type}',function($type){
    $q = $type;
    $model = new Profile();
    $user = $model->search($q);
    if(count($user)> 0){
        return view('listing')->withDetails($user)->withQuery($q);
}
elseif($q == ""){
    return view('home');
}
return view('listing')->withMessage("No $q found");
});

Route::get('/profile','ProfileController@index')->name('profile');
Route::POST('/profileDetail','ProfileController@userDeatail')->name('profileDetail');
Route::get('/info','ProfileController@info')->name('PersonalInfo');
Route::POST('/imageUpload','ProfileController@ImageUpload')->name('imageUpload');
Route::get('/list','ListingController@index')->name('Listing');
Route::get('/ajaxSearch/{value}','ListingController@ajaxSearch')->name('Listing');

Route::get('/appointment/{userID}',function($userID){  
    if( !empty(input::all()['date']) &&
        !empty(input::all()['user_id']) &&
        !empty(input::all()['name']) &&
        !empty(input::all()['time'])
        ){
        $output = [];
            $timestamp = strtotime(input::all()['date']);
            $model = new Appointment();
            $model->user_id = input::all()['user_id'];
            $model->patient_email = input::all()['name'];
            $model->date = date('D', $timestamp);
            $model->time = input::all()['time'];
            if($model->save()){
                
            }
    }else{
        echo "Please fill all input values";
    }
});

Route::get('/state/{id}',function($id){
    $model = new Profile();
    $states = $model->states($id);
    foreach ($states as $state){
        $options = "<option value=".$state->id.">".$state->name."</option>";
        echo $options;
    }
    //echo "<option>".$states."</option>";
});
Route::get('/city/{id}',function($id){
    $model = new Profile();
    $cities = $model->cities($id);
    foreach ($cities as $city){
        $options = "<option value=".$city->id.">".$city->name."</option>";
        echo $options;
    }
});
    Route::get('/page/{url}',function($url){
        if(!empty($url)){
            $data = PageModel::where('template_name',$url)->first();
            if(!empty($data)){
                return view("pages.frontend",compact('data'));
                //eturn view('pages.register');
            }
            else{
                return abort(404);
            }
        }
    });
    Route::POST('/ajaxSubscribe','HomePageController@subscribe');
 /***
  * Admin Route
  */

Route::prefix('admin')->group(function(){
    Route::get('/', function(){
        $admin = User::where('admin',User::USER_ADMIN)->first();
        if(!empty($admin) && Auth::guest() == null){
            return view('dashboard');
        }else{
            return redirect('/login');
        }
        
    });
    Route::get('/dashboard','AdminController@dashboard')->name('Dashboard');
    Route::get('category','CategoryController@category')->name('Category');
    Route::get('page','PageController@index')->name('Page');
    Route::POST('ajaxSubmit','AdminController@ajaxSubmit')->name('ajaxSubmit');
    Route::get('fetchPage/{id}',function($id){
        $model = new PageModel();
        return $model->getByTypeId($id);
    });
    Route::get('/subscriber','AdminController@subscriber')->name('Subscriber');
});

   Route::prefix('admin/category')->group(function(){
   Route::get('add','CategoryController@addCategory')->name('Add');
   Route::match(['get','post'],'edit/{id}','CategoryController@editCategory')->name('Edit');
   Route::get('delete/{id}','CategoryController@deleteCategory')->name('delete');

   Route::POST('create','CategoryController@create')->name('Create');
});

// Route::group(array('prefix'=>'admin','middleware' => ['auth', 'admin']), function ()
//   {
//      Route::get('admin/login',function(){
//          return "Welcome to Administration";
//      });
//   });

Route::get('/redirect', 'ProfileController@redirectToFacebook');
Route::get('/callback', 'ProfileController@callback');
Route::get('/paypal', 'ProfileController@membership');
Route::get('/execute', 'ProfileController@executeMembership')->name("executeMembership");