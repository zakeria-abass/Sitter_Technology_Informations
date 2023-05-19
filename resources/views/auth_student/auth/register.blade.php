@extends('layout.master')
@section('title','الدورات المتاحة')


@section('css')

    <style>

        #signUpForm {
            max-width: 800px;
            background-color: #ffffff;
            margin: 40px auto;
            padding: 40px;
            box-shadow: 0px 6px 18px rgb(0 0 0 / 9%);
            border-radius: 12px;
        }

        #signUpForm .form-header {
            gap: 5px;
            text-align: center;
            font-size: .9em;
        }

        #signUpForm .form-header .stepIndicator {
            position: relative;
            flex: 1;
            padding-bottom: 30px;
        }

        #signUpForm .form-header .stepIndicator.active {
            font-weight: 600;
        }

        #signUpForm .form-header .stepIndicator.finish {
            font-weight: 600;
            color: #104b98;
        }

        #signUpForm .form-header .stepIndicator::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            z-index: 9;
            width: 20px;
            height: 20px;
            background-color: #d5efed;
            border-radius: 50%;
            border: 3px solid #ecf5f4;
        }

        #signUpForm .form-header .stepIndicator.active::before {
            background: linear-gradient(
                60deg,
                rgba(84, 58, 183, 1) 0%,
                rgba(0, 172, 193, 1) 100%
            );
            border: 3px solid #d5f9f6;
        }

        #signUpForm .form-header .stepIndicator.finish::before {
            background: linear-gradient(
                60deg,
                rgba(84, 58, 183, 1) 0%,
                rgba(0, 172, 193, 1) 100%
            );
            border: 3px solid #b7e1dd;
        }

        #signUpForm .form-header .stepIndicator::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 8px;
            width: 100%;
            height: 3px;
            background-color: #f3f3f3;
        }

        #signUpForm .form-header .stepIndicator.active::after {
            background-color: #a7ede8;
        }

        #signUpForm .form-header .stepIndicator.finish::after {
            border: 3px solid rgba(18, 87, 180, 0.61);
        }

        #signUpForm .form-header .stepIndicator:last-child:after {
            display: none;
        }

        #signUpForm input {
            padding: 15px 20px;
            width: 100%;
            font-size: 1em;
            border: 1px solid #e3e3e3;
            border-radius: 5px;
        }

        #signUpForm input:focus {
            border: 1px solid #1b53bd;
            outline: 0;
        }

        #signUpForm input.invalid {
            border: 1px solid #ee0c0c;
        }

        #signUpForm .step {
            display: none;
        }

        #signUpForm .form-footer {
            overflow: auto;
            gap: 20px;
        }

        #signUpForm .form-footer button {
            background: linear-gradient(
                60deg,
                rgba(84, 58, 183, 1) 0%,
                rgba(0, 172, 193, 1) 100%
            );
            border: 1px solid #0a4f86 !important;
            color: #ffffff;
            border: none;
            padding: 13px 30px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            flex: 1;
            margin-top: 5px;
        }

        #signUpForm .form-footer button:hover {
            opacity: 0.8;
        }

        #signUpForm .form-footer #prevBtn {
            background-color: #fff;
            color: #ffffff;
        }

    </style>

@stop
@section('content')

    <div class="container">
        <!-- Sign up form -->
        <h1 class="text-center fs-4">Create an account</h1>
        <form id="signUpForm" method="POST" action="{{ route('student.register') }}">
            @csrf
            <!-- start step indicators -->
            <div class="form-header d-flex mb-4">
                <span class="stepIndicator">Account Setup 1</span>
                <span class="stepIndicator">Account Setup 2</span>
                <span class="stepIndicator">Account Setup 3</span>
            </div>
            <!-- end step indicators -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- step one -->
            <div class="step">
                <p class="text-center mb-4">Create your account</p>
                <div class="mb-3">
                    <input type="text"  class="@error('name_ar') is-invalid @enderror" name="name_ar" value="{{old('name_ar')}}" placeholder="Enter your name in Arabic">
                    <p class="text-danger">@error('name_ar') {{$message}} @enderror</p>
                </div>

                <div class="mb-3">
                    <input type="text"  class="@error('name_en') is-invalid @enderror" name="name_en" value="{{old('name_en')}}" placeholder="Enter your name in  Einglish">
                    <p class="text-danger">@error('name_en') {{$message}} @enderror</p>

                </div>
                <div class="mb-3">
                    <input type="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}" name="email" placeholder="Enter your email address">
                    <p class="text-danger">@error('email') {{$message}} @enderror</p>

                </div>
            </div>

            <!-- step two -->
            <div class="step">
                <p class="text-center mb-4">Create your account</p>
                <div class="mb-3">
                    <input type="text"  class="@error('n_university') is-invalid @enderror"  value="{{old('n_university')}}" name="n_university" placeholder="Enter your university number">
                    <p class="text-danger">@error('n_university') {{$message}} @enderror</p>

                </div>
                <div class="mb-3">
                    <input type="text"  class="@error('phone') is-invalid @enderror" value="{{old('phone')}}" name="phone" placeholder="Enter your mobile number">
                    <p class="text-danger">@error('phone') {{$message}} @enderror</p>

                </div>
                <div class="mb-3">
                    <input type="text" class="@error('specialty') is-invalid @enderror" value="{{old('phone')}}" name="specialty" placeholder="Enter your undergraduate major">
                    <p class="text-danger">@error('specialty') {{$message}} @enderror</p>

                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <main >
                        <label>Stage  :<span class="text-danger">*</span></label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"  class="custom-control-input @error('stage') is-invalid @enderror" id="customRadio" name="stage" value="طالب" >
                            <label class="custom-control-label" for="customRadio">طالب</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"  class="custom-control-input @error('stage') is-invalid @enderror" id="customRadio2" name="stage" value="خريج"  >
                            <label class="custom-control-label" for="customRadio2">خريج</label>
                        </div>
                    </main>
                    <main >
                        <label> Gender   :<span class="text-danger">*</span></label><br>
                        <div class="custom-control custom-radio custom-control-inline" >
                            <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror"  id="customRadio3" name="gender" value="دكر"  >
                            <label class="custom-control-label" for="customRadio3">دكر</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="customRadio4" name="gender" value="انثي"   >
                            <label class="custom-control-label" for="customRadio4">انثي</label>
                        </div>
                    </main>

                </div>
            </div>

            <!-- step three -->
            <div class="step">
                <p class="text-center mb-4">Create password</p>
                <div class="mb-3">
                    <input type="password"   class="@error('password') is-invalid @enderror" value="{{old('password')}}" name="password" placeholder="Enter a password">
                    <p class="text-danger">@error('password') {{$message}} @enderror</p>
                </div>
                <div class="mb-3">
                    <input type="password"  class="@error('password') is-invalid @enderror"  value="{{old('password')}}" name="password_confirmation" placeholder="Confirm password">
                    <p class="text-danger">@error('password') {{$message}} @enderror</p>
                </div>

            </div>

            <!-- start previous / next buttons -->
            <div class="form-footer d-flex">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

            </div>
            <!-- end previous / next buttons -->
        </form>

    </div>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Sav";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("step");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("signUpForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
@stop


