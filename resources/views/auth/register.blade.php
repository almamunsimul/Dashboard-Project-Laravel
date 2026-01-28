<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/style.css">
</head>

<body>
    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mb-3">Register New Account</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">

                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right d-flex flex-column justify-content-center h-100 bg-primary text-white text-center pt-5">
                                    <i class="fas fa-user-shield"></i>
                                    <h2 class="fs-1">AWDD-2508</h2>
                                </div>
                            </div>

                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form method="post" action="{{ route('register') }}" class="row g-4">
                                        @csrf
                                        <div class="col-12">
                                            <label>Full Name<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                                <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                <input type="password" class="form-control" placeholder="Enter Confirm Password" name="password_confirmation">
                                            </div>
                                        </div>


                                        <div class="col-sm-6 d-flex align-items-center">
                                            <a href="{{ route('login') }}" class="text-primary mt-10">Already Have an Account?</a>
                                        </div>

                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('contents/admin')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom.js"></script>
</body>

</html>