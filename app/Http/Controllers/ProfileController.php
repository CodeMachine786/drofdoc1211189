<?php

namespace App\Http\Controllers;
header('Cache-Control: no-store, private, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;
use App\User;
use App\Category;
use App\PersonalInfo;
use Socialite;
use Hash;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use App\Fcade\PayPal;
use PHPUnit\Util\TestDox\ResultPrinter;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        if( !Auth::guest() ){
            $user = User::find($user->id);
            $profile = Profile::where('user_id',$user->id)->first();
            $model = new Profile();
            $countries = $model->countries();
            $categories = Category::all();
            $select = new Profile();
            return view('profile', compact('user','profile','categories','countries','select'));
        }else{
            return redirect('/');
        }
        
    }
    
    public function userDeatail(Request $request){
        $user = auth()->user();
        if($request->has('submit')){
            $checkUser = Profile::where('user_id',$user->id)->first();
            $message=[
                'phone_no.required'=>'Please enter phone number',
                'user_email.required'=>'Please enter email',
                'user_dob.required'=>'Please enter date of birth',
                'time_zone.required'=>'Please enter time zone',
                'user_hno.required'=>'Please enter house number',
                'user_street.required'=>'Please enter street',
                'country.required' => 'Please Select country',
                'user_city.required'=>'Please select city',
                'user_state.required'=>'Please select state',
                'user_pincode.required'=>'Please enter pincode',
                'user_pincode.numeric'=>'Pincode should be numeric',
                'user_ext_no.numeric' => 'Should be numeric'
            ];
            $validator = $request->validate([
                'phone_no' => 'required|numeric',
                'user_email' => 'required',
                'user_gender' => 'required',
                'user_dob' => 'required',
                'time_zone' => 'required',
                'user_hno' => 'required',
                'user_street' => 'required',
                'user_pincode' => 'required|numeric',
                //'country' => 'required',
                'user_state' => 'required',
                'user_city' => 'required',
                'user_ext_no' => 'numeric'
            ],$message);
            if( !empty($checkUser) ){
                if ($request->hasFile('input_img')) {
                    $image = $request->file('input_img');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('assets/profile_images');
                    $image->move($destinationPath, $name);
                    $checkUser->file_content = $name;
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
                $checkUser->country = Input::post('country');
                $checkUser->pincode = Input::post('user_pincode');
                $checkUser->mobile_no = Input::post('user_ext_no');
                $checkUser->specialist = (!empty(Input::post('specialist')) ? Input::post('specialist') : "");
                if($checkUser->save()){
                    if($checkUser->email) {
                    $user = User::find($user->id);
                //$user->id = $checkUser->id;
                    $user->email = $checkUser->email;
                    $user->update();
                    }
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
                $model->country = Input::post('country');
                $model->pincode = Input::post('user_pincode');
                $model->mobile_no = Input::post('user_ext_no');
                if ($request->hasFile('input_img')) {
                    $image = $request->file('input_img');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('assets/profile_images');
                    $image->move($destinationPath, $name);
                    $model->file_content = $name;
                    $model->save();
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
         $user = auth()->user();
        return view('listing');
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
            'experience.numeric'=>'Experience should be numeric value'
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

    public function redirectToFacebook(){
       return Socialite::driver('facebook')->redirect();
    }
    public function test(){
        return view('test');
    }
    public function callback(){
        $userSocial = Socialite::driver('facebook')->user();
        $finduser = User::where('social_id', $userSocial->id)->first();
        if($finduser){
            Auth::login($finduser);
            return redirect(route('Dashboard'));
        }else{
        $new_user = User::create([
            'name'       => $userSocial->name,
            'email'      => $userSocial->email,
            'password'   => Hash::make($userSocial->id),
            'social_id'=> $userSocial->id,
        ]);
        Auth::login($new_user);

        return redirect(route('Dashboard'));
        }
    }
    
    public function membership(){
        $apiContext = PayPal::apiContext();
        
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("123123") // Similar to `item_number` in Classic API
        ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
        ->setCurrency('USD')
        ->setQuantity(5)
        ->setSku("321321") // Similar to `item_number` in Classic API
        ->setPrice(2);
        
        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));
        
        $details = new Details();
        $details->setShipping(1.2)
        ->setTax(1.3)
        ->setSubtotal(17.50);
        
        $amount = new Amount();
        $amount->setCurrency("USD")
        ->setTotal(20)
        ->setDetails($details);
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description")
        ->setInvoiceNumber(uniqid());
        
        //$baseUrl = "http://localhost/drofdoc";
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('executeMembership'))
        ->setCancelUrl(route('home.index'));
        
        $payment = new Payment();
        $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
        
        $request = clone $payment;
        
        try {
            $payment->create($apiContext);
        } catch (\Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            print("Created Payment Using PayPal. Please visit the URL to Approve.".$request);
            exit(1);
        }
        
        $approvalUrl = $payment->getApprovalLink();
        
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        print("Created Payment Using PayPal. Please visit the URL to Approve.". "<a href='".$approvalUrl."' >".$approvalUrl."</a>");
        
        return $payment;
    }
    public function executeMembership(){
        $apiContext = PayPal::apiContext();
       // if (isset($_GET['success']) && $_GET['success'] == 'true') {
            // Get the payment Object by passing paymentId
            // payment id was previously stored in session in
            // CreatePaymentUsingPayPal.php
            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $apiContext);
            // ### Payment Execute
            // PaymentExecution object includes information necessary
            // to execute a PayPal account payment.
            // The payer_id is added to the request query parameters
            // when the user is redirected from paypal back to your site
            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);
            // ### Optional Changes to Amount
            // If you wish to update the amount that you wish to charge the customer,
            // based on the shipping address or any other reason, you could
            // do that by passing the transaction object with just `amount` field in it.
            // Here is the example on how we changed the shipping to $1 more than before.
            $transaction = new Transaction();
            $amount = new Amount();
            $details = new Details();
            $details->setShipping(2.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
            $amount->setCurrency('USD');
            $amount->setTotal(21);
            $amount->setDetails($details);
            $transaction->setAmount($amount);
            // Add the above transaction object inside our Execution object.
            $execution->addTransaction($transaction);
            try {
                // Execute the payment
                // (See bootstrap.php for more on `ApiContext`)
                $result = $payment->execute($execution, $apiContext);
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                print("Executed Payment 1".$payment->getId()."Result:".$result);
                try {
                    $payment = Payment::get($paymentId, $apiContext);
                    
                    $paymentInfo = json_decode($payment);
                    dump($paymentInfo);
                } catch (\Exception $ex) {
                    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                    print("Get Payment 1");
                    exit(1);
                }
            } catch (\Exception $ex) {
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                print("Executed Payment 2");
                exit(1);
            }
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            print("Get Payment 2".$payment->getId());
            return $payment;
        //}
//         else {
//             // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
//             print("User Cancelled the Approval");
//             exit;
//         }
    }
}
