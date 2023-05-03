<section>
    <nav class="navbar navbar-expand-lg" style="background: var(--color-primary);">
        <div class="container justify-content-center">
            <a class="navbar-brand text-center text-white" href="<?= base_url('Home') ?>">Koffie Soft</a>
        </div>
    </nav>

    <div class="container">
        <div class="mt-5">
            <h2>Welcome <strong><?= $this->session->userdata('users')->fullname ?></strong> in App Koffie Soft</h2>

            <a href="<?= base_url('Auth/logout') ?>" class="btn-authentication text-decoration-none">Logout</a>
        </div>
    </div>
</section>