<?= $this->partial('partials/header') ?>

<div class="app-main">

<?= $this->partial('partials/navbar') ?>

    <div class="app-main__outer">
        <div class="app-main__inner">
  
            <?= $this->getContent() ?>
            
        </div>

        
        <div class="app-wrapper-footer">
            <div class="app-footer">
                <div class="app-footer__inner">
                    <div class="app-footer-left">
                        
                    </div>
                    <div class="app-footer-right">
                        <ul class="nav">
                            <li class="nav-item">
                                <?= getenv('APP_VERSION') ?>
                            </li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

