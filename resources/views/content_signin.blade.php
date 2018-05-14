<div class="container-fluid"><div class="row">
    <div class="col-md-12">
        <form class="row form" id="signin-box" action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <style type="text/css">#signin-box .form-group label:nth-child(1){margin:6px 0 0;}</style>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="someone@example.com" required="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="eg. JDoe12" required="">
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="button" title="Lupa Password">Forgot?</button>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-6" style="padding-top:4px;">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <div class="col-md-6" style="font-size: 80%;">
                    <div><a href="/register">Don't have an Account?</a></div>
                    <div class="custom-control custom-checkbox" style="line-height: 2;">
                        <input type="checkbox" class="custom-control-input" id="rememberCheck" name="remember">
                        <label class="custom-control-label" for="rememberCheck">Remember Me</label>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>