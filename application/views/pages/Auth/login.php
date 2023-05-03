<section class="login">
    <div class="container">
        <div class="card w-25 mx-auto">
            <div class="card-body">
                <h3 class="fs-1 text-uppercase fw-bolder text-center text-muted">Login <br><span style="color: var(--color-primary)">Koffie</span> <span class="text-muted">Soft</span></h3>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 authentication">
                        <div class="w-100 mx-auto ms-xl-0 ms-lg-0">
                            <form action="<?= base_url('Auth/loginRequest') ?>" method="post">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label> <small class="text-danger">*</small>
                                        <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="Enter your email" value="<?= set_value('email'); ?>" required>
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label> <small class="text-danger">*</small>
                                        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Enter your Password" value="<?= set_value('password'); ?>" required>
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn-authentication mt-4 w-100">Login</button>
                                <p class="text-center mt-3">Belum punya akun ? <a href="<?= base_url('Auth/registrasi') ?>" style="color: var(--color-primary); text-decoration:none">Registrasi</a></p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>