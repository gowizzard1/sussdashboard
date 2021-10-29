<?= $this->flash->output() ?>
 
<div class="row align-items-center">
 
    <div class="col-md-6 offset-md-3 login-form-1">
        <div class="login-wrap">
        
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Sign in to Suss Ads</h5>
                    <form method="post" action="/session/login">
                        <div class="form-group">
                            <?= $form->render('email', ['class' => 'form-control', 'id' => 'email-input', 'aria-describedby' => 'emailHelp', 'placeholder' => 'Your Email']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->render('password', ['class' => 'form-control', 'id' => 'password-input', 'placeholder' => 'Your Password']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
                            <?= $form->render('Login') ?>
                        </div>
                        <div class="form-group">
                            <?= $this->tag->linkTo(['session/forgotPassword', 'Forget Password?']) ?>
                        </div>
                    </form>
                </div>
            </div>

        </div> 
    </div>
 
</div>
