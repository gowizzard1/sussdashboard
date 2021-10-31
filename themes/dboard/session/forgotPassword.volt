
{{ flash.output() }}
 
<div class="row align-items-center">
 
    <div class="col-md-6 offset-md-3 login-form-1">
        <div class="login-wrap">
        
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Forgot Password?</h5>
                    <form method="post">
                        <div class="form-group">
                            {{ form.render('email', ['class': 'form-control', 'id': 'forgot-email-input', 'placeholder': 'Enter email']) }}
                        </div>
                        <div class="form-group">
                            {{ form.render('Send') }}
                        </div>
                        <div class="form-group">
                            {{ link_to('session/login', "&larr; Back to Login") }}
                        </div>
                    </form>
                </div>
            </div>

        </div> 
    </div>
 
</div>


