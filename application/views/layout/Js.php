<?php if ($this->session->flashdata('success')) { ?>
    <script>
        Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('success') ?>',
        });
    </script>
<?php } ?>

<?php if ($this->session->flashdata('error')) { ?>
    <script>
        Toast.fire({
            icon: 'error',
            title: '<?= $this->session->flashdata('error') ?>',
        });
    </script>
<?php } ?>

<?php if ($this->session->flashdata('info')) { ?>
    <script>
        Toast.fire({
            icon: 'info',
            title: '<?= $this->session->flashdata('info') ?>',
        });
    </script>
<?php } ?>

<?php if ($this->session->flashdata('warning')) { ?>
    <script>
        Toast.fire({
            icon: 'warning',
            title: '<?= $this->session->flashdata('warning') ?>',
        });
    </script>
<?php } ?>


<script src="<?= base_url('node_modules/@popperjs/dist/umd/popper.min.js') ?>"></script>
<script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>