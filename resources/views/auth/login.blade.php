@extends('layouts.default')
@section('title', 'Login')
@section('content')




    <div id="logreg-forms">
        <form class="form-signin" id="form-signin">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">User Login</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with
                        Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in
                        with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR </p>
            <span class="finalmsgsignin"></span>
            <input type="email" id="inputEmail" class="form-control" name="emailsignin" value="{{ old('email') }}"
                placeholder="Email address" autofocus="">
            <span class="emailsigninerr"></span>
            <input type="password" id="inputPassword" class="form-control" name="passwordsignin" placeholder="Password">
            <span class="passwordsigninerr"></span><br>

            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            <p>Don't have an account!</p>
            <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign
                up New Account</button>
        </form>

        <form action="/reset/password/" class="form-reset">
            <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required=""
                autofocus="">
            <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
            <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
        </form>

        <form method="post" class="form-signup" id="signup-submit">
            @csrf



            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign up
                        with Facebook</span></button>
            </div>
            <div class="social-login">
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign up
                        with Google+</span></button>
            </div>

            <p style="text-align:center">OR</p>
            <span class="alert finalmsg text-center"></span>

            <input type="text" id="user-name" class="form-control" name="name" placeholder="Full name"
                value="{{ old('name') }}" autofocus>
            <span class="alert nameerr "></span>



            <input type="email" id="user-email" class="form-control" name="email" placeholder="Email address"
                value="{{ old('email') }}" autofocus>
            <span class="alert emailerr"></span>



            <input type="password" id="user-pass" class="form-control" name="password" placeholder="Password" autofocus>

            <span class="alert passworderr"></span>



            <input type="password" id="user-repeatpass" class="form-control" name="password_confirmation"
                placeholder="Repeat Password" autofocus>
            <span class="alert  password_confirmationerr"></span>

            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
            <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
        </form>


        <br>

    </div>

    <script>
        $(document).ready(function() {
            $('#signup-submit').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('signup.save') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('.finalmsg').text('');
                        $('.nameerr').text('');
                        $('.emailerr').text('');
                        $('.passworderr').text('');
                        $('.password_confirmationerr').text('');
                        if (response.status == 422) {
                            if (response.errors.name) {
                                $('.nameerr').text(response.errors.name[0]);
                            }
                            if (response.errors.email) {
                                $('.emailerr').text(response.errors.email[0]);
                            }
                            if (response.errors.password) {
                                $('.passworderr').text(response.errors.password[0]);
                            }
                        } else if (response.status == 200) {
                            $('.finalmsg').text(response.message);
                            $('#signup-submit')[0].reset();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });



            });
            $('#form-signin').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('signin.check') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('.emailsigninerr').text('');
                        $('.passwordsigninerr').text('');
                        if (response.status == 422) {
                            if (response.errors.emailsignin) {
                                $('.emailsigninerr').text(response.errors.emailsignin[0]);
                            }
                            if (response.errors.passwordsignin) {
                                $('.passwordsigninerr').text(response.errors.passwordsignin[0]);
                            }
                        } else if (response.status == 200) {
                            $('.finalmsgsignin').text(response.message);
                            $('#form-signin')[0].reset();
                            setTimeout(function() {
                                window.location.href = response.redirect_url;
                            }, 2000);
                        } else if (response.status == 401) {
                            $('.finalmsgsignin').text(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });



            });
        });





        function toggleResetPswd(e) {
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle() // display:block or none
            $('#logreg-forms .form-reset').toggle() // display:block or none
        }

        function toggleSignUp(e) {
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle(); // display:block or none
            $('#logreg-forms .form-signup').toggle(); // display:block or none
        }

        $(() => {
            // Login Register Form
            $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
            $('#logreg-forms #cancel_reset').click(toggleResetPswd);
            $('#logreg-forms #btn-signup').click(toggleSignUp);
            $('#logreg-forms #cancel_signup').click(toggleSignUp);
        })
    </script>






@stop
