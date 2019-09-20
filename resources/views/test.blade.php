<link rel="stylesheet" href="{{ url('/public/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('/public/assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="{{ url('/public/assets/js/jquery.min.js') }}"></script>
  <script src="{{ url('/public/assets/js/popper.min.js') }}"></script>
  <script src="{{ url('/public/assets/js/bootstrap.min.js') }}"></script>
    
<form method="POST" action="{{ url('/callback') }}">
	<div id="ac-wrapper">
      <div id="popup">
      <center>
        <h2>Registered As</h2>
        	<div class="col-lg-12 register-input-fild my-3"> 
    			 <label for="phone">Register As</label>
    			  	<div class="sel">
                        <select name="type_id" id="selectbox11">
                          <option value="2">Patient</option>
                          <option value="3">Doctor</option>
                    	</select>
                	</div>
                 </div>
          <input type="submit" name="submit" value="Submit" onClick="PopUp()" />
      </center>
      </div>
    </div>
</form>



<style>
#ac-wrapper {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(255,255,255,.6);
z-index: 1001;
}
#popup{
width: 555px;
height: 375px;
background: #FFFFFF;
border: 5px solid #000;
border-radius: 25px;
-moz-border-radius: 25px;
-webkit-border-radius: 25px;
box-shadow: #64686e 0px 0px 3px 3px;
-moz-box-shadow: #64686e 0px 0px 3px 3px;
-webkit-box-shadow: #64686e 0px 0px 3px 3px;
position: relative;
top: 150px; left: 375px;
}
</style>
