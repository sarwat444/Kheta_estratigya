<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-dialog-centered modal-login modal-lg">

        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>

            <!-- Modal Content Start -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <p class="modal-description">Don't have an account yet? <button data-bs-toggle="modal" data-bs-target="#registerModal">Sign up for free</button></p>
                </div>
                <div class="modal-body  loginform ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logo">
                                <img src="{{asset('assets/site/images/dark-logo.png')}}" alt="Logo" width="296" height="64">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form id="user-login-modal" action="{{route('users.login')}}" method="POST">
                                @csrf
                                <div class="modal-form">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email" required>
                                </div>
                                <div class="modal-form">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="modal-form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form-check">
                                        <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                </div>
                                <div class="modal-form loader-area text-center"></div>
                                <div class="modal-form">
                                    <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Log In</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal Content End -->

        </div>
        <!-- Modal Wrapper End -->

    </div>
</div>
