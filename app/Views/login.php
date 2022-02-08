<section class="login-clean">
    <form action="<?php echo base_url(); ?>/login" method="post">
        <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration"><img src="<?php echo base_url(); ?>/assets/images/site/logo.png" style="width: 244px;"></div>
            <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success')?>
                    </div>
                <?php elseif (session()->get('failed')):?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->get('failed')?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('banned')): ?>
                    <div class="alert alert-warning" role="alert">
                        <?= session()->get('banned')?>
                    </div>
                <?php endif; ?>
            <div class="mb-3"><input class="form-control" id="email" type="email" name="email" placeholder="Email"></div>
            <div class="mb-3"><input class="form-control" id="passwordHash" type="password" name="passwordHash" placeholder="Password"></div>
            <div class="mb-3" style="color: var(--bs-blue);"><button class="btn btn-primary d-block w-100" type="submit" style="color: var(--bs-body-bg);background: #198754;">Log In</button></div>
        <a class="register" href="<?php echo base_url();?>/register">Don't have an account ?</a>
    </form>
</section>