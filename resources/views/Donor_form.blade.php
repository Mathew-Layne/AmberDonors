<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Donor Form</title>
    {{-- <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #fff;
}

.main-head{
    width: 100%;
   height: 70vh;
   background-image: url('https://wallpapercave.com/wp/wp4323457.jpg');
   background-position: center;
   background-attachment: fixed;
   background-repeat:no-repeat;
   background-size: 100%;
}

.container {
  max-width: 600px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact textarea
 {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact button[type="submit"]
{
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  /* display: block; */
  text-align: center;
  font-size: 30px;
  font-weight: 400;
  margin-bottom: 10px;
  background-color: red;
  color: #FFF;
  padding: 20px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: red;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}



#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}

.alert{
    width: 100%;
    color: red;
}
    </style> --}}

</head>
<body>
    <div class="main-head">
    </div>
    <div class="container">

        <form id="contact" action="{{url('store-form')}}" method="post">
            @csrf

          <h3>DONOR REGISTRATION FORM</h3>
          <h4>Donate to save a life today!</h4>

          <div class="container mt-4">
            @if(session('status'))
            <div class="alert ">
            {{ session('status') }}
            </div>
            @endif


          <fieldset>
              <label for="name">Enter Name:</label>
            <input placeholder="Your name" name="donor_name" type="text" tabindex="1"  class="@error('donor_name') is-invalid @enderror form-control" autofocus>
                @error('donor_name')
                <div class="alert">{{ $message }}</div>
                @enderror
          </fieldset>

          <fieldset>
              <label for="email">Email:</label>
            <input placeholder="Your Email Address" name="donor_email" type="email" class="@error('donor_email') is-invalid @enderror form-control" tabindex="2" >
            @error('donor_email')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>

          <fieldset>
              <label for="tel">Telephone</label>
            <input placeholder="Your Phone Number" name="donor_phoneno" type="telephone" class="@error('donor_phoneno') is-invalid @enderror form-control" tabindex="3" >
            @error('donor_phoneno')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>

          <fieldset>
              <label for="address">Address:</label>
            <input placeholder="address" name="donor_address" type="text" tabindex="4" class="@error('donor_address') is-invalid @enderror form-control" >
            @error('donor_address')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>

          <fieldset>
            <label for="address">Sex:</label>
          <input placeholder="Eg. Female" name="sex" type="text" tabindex="4" class="@error('sex') is-invalid @enderror form-control" >
          @error('sex')
          <div class="alert">{{ $message }}</div>
          @enderror
        </fieldset>

        <fieldset>
            <label for="address">Total Donation:</label>
            <input placeholder="number of donation" name="total_donation" type="text" tabindex="4" class="@error('total_donation') is-invalid @enderror form-control" >
            @error('total_donation')
            <div class="alert">{{ $message }}</div>
            @enderror
        </fieldset>

        <fieldset>
          <fieldset>
              <label for="b-type">What is Your Blood Type?</label>
            <input placeholder="Eg. O+" name="blood_type" type="text" tabindex="1" class="@error('blood_type') is-invalid @enderror form-control"  autofocus>
            @error('blood_type')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>

          <fieldset>
              <label for="address">When was your last donation date:</label>
            <input placeholder="Eg. Janurary 2019" name="last_donation_date" type="text" tabindex="4" class="@error('last_donation_date') is-invalid @enderror form-control" >
            @error('last_donation_date')
            <div class="alert">{{ $message }}</div>
            @enderror
          </fieldset>
        </fieldset>

          {{-- <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label">State</label>
                  <div class="col-md-4 selectContainer">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select name="state" class="form-control selectpicker" >
                    <option value=" " >Please select your parish</option>
                    <option>Kingston</option>
                    <option>St. Andrew</option>
                    <option >Portland </option>
                    <option >St. Thomas</option>
                    <option >St. Catherine</option>
                    <option >St. Mary</option>
                    <option >St. Ann</option>
                    <option >Manchester</option>
                    <option >Clarendon</option>
                    <option> Hanover</option>
                    <option >Westmoreland</option>
                    <option >St. James</option>
                    <option >Trelawny</option>
                    <option >St. Elizabeth</option>
                  </select>
                </div>
              </div>
              </div>
          </fieldset> --}}


          {{-- Radio Selection --}}
          {{-- <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label">Have you done a blood donation before?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="hosting" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="hosting" value="no" /> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Have you had any disease?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="disease" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="disease" value="no" /> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Do you have any allergies?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="allergy" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="allergy" value="no" /> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Have you done a blood donation before?</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="donate" value="yes" /> Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="donate" value="no" /> No
                        </label>
                    </div>
                </div>
            </div> --}}

          {{-- </fieldset>
          <fieldset>
            <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
          </fieldset> --}}
          <fieldset>
            <button name="submit" type="submit" >Submit</button>
          </fieldset>
        </form>
    </div>

</body>
</html>
