<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Category;
use App\PersonalInfo;

class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        if( !Auth::guest() ){
            $user = User::find($user->id);
            $profile = Profile::find($user->id);
            $categories = Category::all();
            return view('profile', compact('user','profile','categories'));
        }else{
            return redirect('/');
        }
        
    }
    
    public function userDeatail(Request $request){
        $user = auth()->user();
        if($request->has('submit')){
            $checkUser = Profile::find($user->id);
            $message=[
                'phone_no.required'=>'Please enter phone number',
                'user_email.required'=>'Please enter email',
                'user_dob.required'=>'Please enter date of birth',
                'time_zone.required'=>'Please enter time zone',
                'user_hno.required'=>'Please enter house number',
                'user_street.required'=>'Please enter street',
                'user_city.required'=>'Please enter city',
                'user_state.required'=>'Please enter state',
                'user_pincode.required'=>'Please enter pincode',
                'file_content.required'=>'Please select image',
                
            ];
            $validator = $request->validate([
                'phone_no' => 'required|numeric',
                'user_email' => 'required',
                'user_gender' => 'required',
                'user_dob' => 'required',
                // 'user_blod_grp' => 'required',
                'time_zone' => 'required',
                'user_hno' => 'required',
                'user_street' => 'required',
                'user_city' => 'required',
                'user_state' => 'required',
                'user_pincode' => 'required',
                //                 'user_ext_no' => 'required',
            // //                 'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],$message);
            if( !empty($checkUser) ){
                if ($request->hasFile('input_img')) {
                    $image = $request->file('input_img');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('assets/profile_images');
                    $image->move($destinationPath, $name);
                    $checkUser->file_content = $name;
                    $checkUser->save();
                }
                
                $checkUser->phone_no = Input::post('phone_no');
                $checkUser->email = Input::post('user_email');
                $checkUser->gender = Input::post('user_gender');
                $checkUser->dob = date('Y-m-d H:i:s',strtotime(Input::post('user_dob')));
                //  $checkUser->blood_group = Input::post('user_blod_grp');
                $checkUser->time_zone = Input::post('time_zone');
                $checkUser->house_no = Input::post('user_hno');
                $checkUser->street = Input::post('user_street');
                $checkUser->city = Input::post('user_city');
                $checkUser->state = Input::post('user_state');
                // $checkUser->language = Input::post('language');
                $checkUser->pincode = Input::post('user_pincode');
                $checkUser->mobile_no = Input::post('user_ext_no');
                $checkUser->specialist = (!empty(Input::post('specialist')) ? Input::post('specialist') : "");
                if($checkUser->save()){
                    return redirect('profile');
                }
            }else{
                $model = new Profile();
                $model->user_id = $user->id;
                $model->phone_no = Input::post('phone_no');
                $model->email = Input::post('user_email');
                $model->gender = Input::post('user_gender');
                $model->dob = date('Y-m-d H:i:s',strtotime(Input::post('user_dob')));
                // $model->blood_group = Input::post('user_blod_grp');
                $model->time_zone = Input::post('time_zone');
                $model->house_no = Input::post('user_hno');
                $model->street = Input::post('user_street');
                $model->city = Input::post('user_city');
                $model->state = Input::post('user_state');
                // $model->language = Input::post('language');
                $model->pincode = Input::post('user_pincode');
                $model->mobile_no = Input::post('user_ext_no');
                if ($request->hasFile('input_img')) {
                    $image = $request->file('input_img');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('assets/profile_images');
                    $image->move($destinationPath, $name);
                    $model->file_content = $name;
                   // $model->save();
                    return back()->with('success','Image Upload successfully');
                }else{
                    $model->file_content = "";
                }
                $model->specialist = (!empty(Input::post('specialist')) ? Input::post('specialist') : "");
                if($model->save()){
                    return redirect('profile');
                }
            }
        }
    }

    public function detail(){
        return view('detail');
    }
    
    public function info(){
        $user = auth()->user();
        $info = PersonalInfo::where('user_id',$user->id)->get();
        return view('personalInfo',compact('info'));
    }
    public function ImageUpload(Request $request){
        $user = auth()->user();
        $message=[
            'name.required'=>'Please enter name',
            'description.required'=>'Please enter description',
            //'field_name.required'=>'Please enter field_name',
            'start_date.required'=>'Please enter start date',
            'start_time.required'=>'Please enter start time',
            'end_time.required'=>'Please enter end time',
            'end_date.required'=>'Please enter end date',
            'fees.required'=>'Please enter fees',
            'qualification.required'=>'Please enter qualification',
            'experience.required'=>'Please enter experience',
            'experience.numeric'=>'Experience shoulg be numeric value'
        ];
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'end_date' => 'required',
            'fees' => 'required|numeric',
            'qualification' => 'required',
            'experience' => 'required|numeric',
        ],$message);
        $timestamp = strtotime(Input::post('start_date'));
        $start_date = date('D', $timestamp);
        
        $timestamp = strtotime(Input::post('end_date'));
        $end_date = date('D', $timestamp);
        $time = ['start_date'=>$start_date, 'end_date' => $end_date, 'start_time'=>Input::post('start_time'), 'end_time'=>Input::post('end_time')];
        
        $check = PersonalInfo::where('user_id',$user->id)->get();
            if ($request->hasFile('file')) {
                $checkInfo = PersonalInfo::find($check[0]->id);
                if(!$check->isEmpty()){
                    $img = $request->file;
                    $i = 0;
                    while( $i < count($img) ){
                        $imageName = time().'.'.$request->file[$i]->getClientOriginalName();
                        $request->file[$i]->move(public_path('upload'),$imageName);
                        if( $i == count($img) ){
                            return response()->json(['uploaded'=>'/upload/'.$imageName]);
                        }
                        $imgs[] = $imageName;
                        $i++;
                    }
                    if(!empty($checkInfo)){
                        $checkInfo->images = json_encode($imgs);
                        $checkInfo->save();
                        return redirect('info');
                    }else{
                        return back()->with('error','Please insert detail first');
                    }
                }else{
                    return back()->with('error','Please insert detail first');
                }
            }
        
        
        if($request->has('submit')){
            if($check->isEmpty()){
                $model = new PersonalInfo();
                $model->user_id = $user->id;
                $model->name = Input::post('name');
                $model->qualification = Input::post('qualification');
                $model->experience = Input::post('experience');
                $model->description = Input::post('description');
                $model->skill = implode(', ', Input::post('field_name'));;
                $model->timing = json_encode($time);
                $model->fees = Input::post('fees');
                
                if ($request->hasFile('file')) {
                    $img = $request->file;
                    $i = 0;
                    while( $i < count($img) ){
                        $imageName = time().'.'.$request->file[$i]->getClientOriginalName();
                        $request->file[$i]->move(public_path('upload'),$imageName);
                        if( $i == count($img) ){
                            return response()->json(['uploaded'=>'/upload/'.$imageName]);
                        }
                        $imgs[] = $imageName;
                        $i++;
                    }
                    $model->images = json_encode($imgs);
                }else{
                    $model->images = "";
                }
                if ($request->hasFile('input_img')) {
                    $image = $request->file('input_img');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('upload/logo');
                    $image->move($destinationPath, $name);
                    $model->logo = $name;
                    $model->save();
                }else{
                    $model->logo = "";
                }
                if($model->save()){
                    return redirect('info');
                }
            }else{
                $checkInfo = PersonalInfo::find($check[0]->id);
                if( !empty($checkInfo) ){
                    $checkInfo->user_id = $user->id;
                    $checkInfo->name = Input::post('name');
                    $checkInfo->qualification = Input::post('qualification');
                    $checkInfo->experience = Input::post('experience');
                    $checkInfo->description = Input::post('description');
                    $checkInfo->skill = implode(',', Input::post('field_name'));
                    $checkInfo->timing = json_encode($time);
                    $checkInfo->fees = Input::post('fees');
                    if(!empty(Input::post('images'))){
                        $checkInfo->images = Input::post('images');
                    }
                    if ($request->hasFile('input_img')) {
                        $image = $request->file('input_img');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('upload/logo');
                        $image->move($destinationPath, $name);
                        $checkInfo->logo = $name;
                    }
                    if($checkInfo->save()){
                        return redirect('info');
                    }
                }
            }
        }    
        
    }
}