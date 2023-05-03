<section class="registrasi">
    <div class="container py-4">
        <div class="card mx-auto">
            <div class="card-body">
                <h3 class="fs-1 text-uppercase fw-bolder text-center text-muted">Registrasi <br><span style="color: var(--color-primary)">Koffie</span> <span class="text-muted">Soft</span></h3>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 authentication">
                        <div class="w-100 mx-auto ms-xl-0 ms-lg-0">
                            <form action="<?= base_url('Auth/registrationRequest') ?>" method="post">
                                <div class="mb-3">
                                    <div class="form-gorup">
                                        <label for="fullname" class="form-label">Fullname</label> <small class="text-danger">*</small>
                                        <input type="text" class="form-control <?= form_error('fullname') ? 'is-invalid' : '' ?>" name="fullname" id="fullname" placeholder="Enter your fullname" value="<?= set_value('fullname'); ?>" required>
                                        <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label> <small class="text-danger">*</small>
                                        <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="Enter your Email" value="<?= set_value('email'); ?>" required>
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone</label> <small class="text-danger">*</small>
                                        <input type="number" class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>" name="phone" id="phone" placeholder="Enter your Phone" value="<?= set_value('phone'); ?>" required>
                                        <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Address</label> <small class="text-danger">*</small>
                                        <textarea class="form-control <?= form_error('address') ? 'is-invalid' : '' ?>" name="address" id="address" placeholder="Enter your Address" cols="3" rows="3" required><?= set_value('address'); ?></textarea>
                                        <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label> <small class="text-danger">*</small>
                                            <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Enter your Password" value="<?= set_value('password'); ?>" required>
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-label">Password Confirmation</label> <small class="text-danger">*</small>
                                            <input type="password" class="form-control <?= form_error('password_confirmation') ? 'is-invalid' : '' ?>" name="password_confirmation" id="password_confirmation" placeholder="Enter your Password Confirmation" value="<?= set_value('password_confirmation'); ?>" required>
                                            <?= form_error('password_confirmation', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn-authentication mt-4 w-100">Registrasi</button>
                                <p class="text-center mt-3">Sudah punya akun ? <a href="<?= base_url('Auth/login') ?>" style="color: var(--color-primary); text-decoration:none">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>