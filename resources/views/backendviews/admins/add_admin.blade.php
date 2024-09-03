@extends('backendviews.layouts.app')
@section('content')
@include('backendviews.layouts.navbar')
@include('backendviews.layouts.sidebar')
<main id="main-container">
      <!-- Hero -->
      <div class="bg-body-light ">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Admins<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Add Admin</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a style="color:black" href="{{ route('admins.index') }}">Admins</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

   <!-- END Hero -->
   <div class="content">
    <div class="block block-rounded">
      <div class="block-header">

             <h3 class="block-title ">Add Admin</h3>


        </div>
         <div class="block-content block-content-full">

            <form action="{{ route('admins.store') }}" method="POST" onsubmit="return myValidate(event)">
                @csrf
                @method('post')

            <!-- Name -->
                <div class="form-outline mb-4 col-8">
              <label>Name</label>
                <input type="text"   name="name"  maxlength="255" minlength="3" required  value="{{ old('name') }}" class="form-control form-control-lg"
                  placeholder="Enter Name" />
              </div> @error('name')
                      <span class="text text-danger">{{ $message }}</span>
                  @enderror


            <!--USER Name input -->
            <div class="form-outline mb-4 col-8">
              <label>User Name</label>
                <input type="text"   name="user_name"  maxlength="255" minlength="3" required  value="{{ old('user_name') }}" class="form-control form-control-lg"
                  placeholder="Enter username" />
              </div> @error('user_name')
                      <span class="text text-danger">{{ $message }}</span>
                  @enderror

                  <div class="form-outline mb-4 col-8">
              <label>Mobile</label>
              <input type="text" maxlength="10" name="mobile" id="mobile" required value="{{ old('mobile')}}" class="form-control form-control-lg"
                placeholder="Enter a valid mobile number" />
            </div>
                @error('mobile')
                <span class="text text-danger">{{ $message }}</span>
            @enderror


            <!-- Email input -->
            <div class="form-outline mb-4 col-8">
              <label>Email</label>
              <input type="email"  maxlength="255"  name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="{{ old('email') }}" class="form-control form-control-lg"
                placeholder="Enter a valid email address" /> </div>
                @error('email')
                <span class="text text-danger">{{ $message }}</span>
            @enderror



                 <!-- Password input -->
            <div class="form-outline mb-3 col-8">
              <label>Password</label>
                <input type="password"  required name="password" id="password1"  maxlength="15" minlength="6" placeholder="Password" class="form-control form-control-lg"
                  />
                  <span toggle="#password-field"  onclick="myPassword()" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>

                   </div>
                  @error('password')
                  <span class="text text-danger">{{ $message }}</span>
              @enderror


            <div class="form-outline mb-3 col-8">
              <label>Confirm Password</label>
                <input type="password"  required name="confirm_password"   id="password2"   maxlength="15"  class="form-control form-control-lg"
                  placeholder="Confirm Password">
                  <span toggle="#password-field"  onclick="myConfirmPassword()" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>

                </div>

                  @error('confirm_password')
                  <span class="text text-danger">{{ $message }}</span>
              @enderror


              <div class="form-group pt-2">
                <a href="{{ Route('admins.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>


         </div>



        </div></div>
        </div>

   @endsection
   @section('script')
     <script>

    function myValidate(){
        let emailObj = document.getElementById('email');
        let isValid = validateEmail(emailObj.value);

        if (!isValid) {
            event.preventDefault();  // Prevent form submission
        }

            let mobileObj = document.getElementById('mobile');
            let checkCount = mobileObj.value;
            let length = checkCount.length;

            let testLength = checkCountOfMoileNo(length)

            if(!testLength){
                event.preventDefault();  // Prevent form submission
            }

            let mobileValidation = validateMobile(mobileObj.value);

            if(!mobileValidation){
                event.preventDefault();
            }

            let pwd1 = document.getElementById('password1');
            let pwd2 = document.getElementById('password2');

            pwd1Value = pwd1.value;
            pwd2Value = pwd2.value;

            let pwdCheck =passwordCheck(pwd1Value,pwd2Value);

            if(!pwdCheck){
                event.preventDefault();
            }
    }


    function validateEmail(emailValue){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailValue))
        {
            return true;
        }else{

            Swal.fire({
                icon: 'error',
                title: 'Email Input',
                text: 'You have entered an invalid email address!'
            })

            document.getElementById('email').focus();
            return false;
        }

    }

    function validateMobile(mobileValue){
        var pattern = /^[6,7,8,9][0-9]{0,9}$/;

        if(pattern.test(mobileValue) )
        {
            return true;
        }
        else
        {
            Swal.fire({
                icon: 'error',
                title: 'Mobile Input',
                text: 'Please enter 10 digits Mobile!'
            })
            document.getElementById('mobile').focus();

            return false;
        }
    }


    function checkCountOfMoileNo(mobilecount){

        if(mobilecount < 10 ){

            Swal.fire({
                icon: 'error',
                title: 'Mobile Input',
                text: 'Mobile No Must Be 10 digits!'
            })
            document.getElementById('mobile').focus();
            return false;
        }
        else if(mobilecount > 10){

            Swal.fire({
                icon: 'error',
                title: 'Mobile Input',
                text: 'Mobile No Must be10 digits!'
            })
            document.getElementById('mobile').focus();
                    return false;
        }
        return true;

    }


    function passwordCheck(pass1,pass2){
        
        if(pass1 == pass2){
            return true;
        }
        else{
            Swal.fire({
                icon: 'error',
                title: 'Password Input',
                text: 'Password Does Not Match!'
            })
                    return false;
        }
    }



function myPassword() {
  var x = document.getElementById("password1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myConfirmPassword() {
  var x = document.getElementById("password2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


        var name$ = "hi"; //variable support dollar
        var name_ = "hello"; //variable support under score


        //case sensitive
        var h1 = "head1";
        var H1 = "head2";
        // alert(h1 + H1);

        //array declaration
        var array = [];

        //add values to array
        var animal = ["lion","tiger","goat"];

        //add value to the existing array
        animal[3] = "camel";

        //add value to the next position of the existing array the advantage is we need not to calculate the index position and calculate it
        animal.push("rabbit");

        //calculate length
        // alert(animal.length);

        var num = [9,8,7,6,5,"sfg","gh","abc"];
        // alert(animal.sort());
        // alert(num.sort());
        // alert(num.reverse());

// console.log("hi");

//loops
for(j=0; j<5; j++){
    // console.log(j);
}

var k = 1;
while(k<15){
// console.log(k);
k++;
}

num.forEach(function(numf,index){
    // console.log("index is: " + index + "value is: " + numf);
});

var hadNumbers = num.some(function(no){
    return no%2 === 0;
});
// console.log(hadNumbers);

var array1 = [
    {name:"john", age:10},
    {name:"doe", age:20},
    {name:"lil", age:30}

];

// var persons =
var isAdultPresent = array1.some(function(arr){
    return arr.age >= 18;
});
// console.log(isAdultPresent);


//map function

var doubled = num.map(function(no){
    return no*2;
})
// console.log(doubled);


// Mapping an Array of Objects
var names = [
    { firstName: 'John', lastName: 'Doe' },
    { firstName: 'Jane', lastName: 'Smith' },
    { firstName: 'Jim', lastName: 'Brown' }
];

var fullnames = names.map(function(na){
    return na.firstName + ' ' + na.lastName;
});
// console.log(fullnames);

// Mapping with Index
var numberplus = [10,20,30,40];

var sum = numberplus.map(function(no,index){
    return no + index;
});
// console.log(sum);


var a=10;
var b="10";
if(a==b){
    // console.log("yes");
}




// switch

var color = "blue";

switch(color){
    case"red":
        console.log("color is red");break;
    case"green":
        console.log("color is green");break;
    default:
        // console.log("default");
    break;

    }
    // objects

    var obj = {
        fname:"kowsi",
        lname:"kowsi",
        age:"15"
    }

    // console.log(obj.fname);

    // embedded object
    var embobj = {
        fname:"kowsi",
        lname:"vasu",
        age:"15",

        address:{
        street:"1",
        city:"chennai"
        },

        children:["born1","born2"],
    }
// console.log(embobj.address.street);
// console.log(embobj.children);


// OBJECT CONSTRUCTORS
var bird = new Object();
bird.name = "Eagle";
bird.type = "fly";
bird.color = "brown";
// console.log(bird.name);
// console.log(bird);
bird.name1 = "Parrot";
bird.type1 = "slow";
bird.color1 = "green";




function birdsCreate(name,type,color){
    this.name = name;
    this.type = type;
    this.color = color;

}

var Eagle = new birdsCreate("eagle","fly","brown");
var Parrot = new birdsCreate("parrot","slow","green");
var Peacock = new birdsCreate("peacock","walk","multi");

// console.log(Eagle.name);



a = 1;

b="dghj";

c=null;
a || b
// op-1
a && b
//op-'dghj'
b && c
// op-null
42 == '42'
// op-true
42 === '42'
// op-false

     </script>
</main>
   @endsection
