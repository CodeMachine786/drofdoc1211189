<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Profile extends Model
{
    protected $table = "profile";
//     protected $fillable = [
//         'file_content', 'phone_no', 'email','gender','dob','house_no','street','city','state','pincode','specialist','mobile_no'
//     ];
    public function countries(){
        $results = DB::select( DB::raw("select * from countries") );
        return $results;
    }
    public function states($country_id){
        $results = DB::select( DB::raw("select * from states where country_id='$country_id'") );
        return $results;
    }
    public function cities($state_id){
        $results = DB::select( DB::raw("select * from cities where state_id='$state_id'") );
        return $results;
    }
    public function selectedCounntry($id){
        $result = DB::select(DB::raw("Select name from countries where id='$id'"));
        return $result;
    }
    public function selectedState($id){
        $result = DB::select(DB::raw("Select name from states where id='$id'"));
        return $result;
    }
    public function selectedCity($id){
        $result = DB::select(DB::raw("Select name from cities where id='$id'"));
        return $result;
    }

    public function search($q){
        $result = DB::table('personal_info')
        ->leftJoin('profile', 'personal_info.user_id', '=', 'profile.user_id')->where('specialist','LIKE',$q . '%')
        ->get();
        return $result;
    }

}
