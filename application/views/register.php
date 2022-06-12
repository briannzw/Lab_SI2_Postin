<!DOCTYPE html>
<html lang="id">
<head>
    <?php $this->load->view('_partials/head.php'); ?>
    <link href="<?=base_url();?>login-styles.css" rel="stylesheet" />
    <title>Post.in - Sign Up</title>
</head>
<body>
    <main class="flex align-items-center justify-content-center">
        <section id="auth" class="direction-column">
            <div class="panel login direction-column">
                <h1 class="flex justify-content-center" style="font-family: 'Pacifico', cursive; font-size:45px">Post.in
                </h1>
                <h2 class="flex justify-content-center" style="color:dodgerblue;">Sign Up</h2>

                <?php if($this->session->flashdata('message_register_error')): ?>
                            <div class="invalid-feedback">
                                    <?= $this->session->flashdata('message_register_error') ?>
                            </div>
                <?php endif ?>

                <form action="" method="post">
                    <div>
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" placeholder="Username" class="<?= form_error('username') ? 'invalid' : '' ?>" value="<?= set_value('username') ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('username') ?>
                    </div>
                    </div>

                    <div>
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" placeholder="Email" class="<?= form_error('email') ? 'invalid' : '' ?>" value="<?= set_value('email') ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('email') ?>
                    </div>
                    </div>

                    <div>
                    <label for="name" class="sr-only">Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Nama Lengkap" class="<?= form_error('name') ? 'invalid' : '' ?>" value="<?= set_value('name') ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('name') ?>
                    </div>
                    </div>

                    <div>
                    <label for="password" class="sr-only">Kata Sandi</label>
                    <input name="password" type="password" placeholder="Kata Sandi" class="<?= form_error('password') ? 'invalid' : '' ?>" value="<?= set_value('password') ?>"/>
                    <div class="invalid-feedback">
                        <?= form_error('password') ?>
                    </div>
                    </div>

                    <div>
                    <label for="confirm_password" class="sr-only">Konfirmasi Kata Sandi</label>
                    <input name="confirm_password" type="password" placeholder="Konfirmasi Kata Sandi" class="<?= form_error('confirm_password') ? 'invalid' : '' ?>" value="<?= set_value('confirm_password') ?>"/>
                    <div class="invalid-feedback">
                        <?= form_error('confirm_password') ?>
                    </div>
                    </div>

                    <button type="submit" class="button button-primary">Sign Up</button>
                </form>
            </div>
            <div class="panel register flex justify-content-center">
                <p>Sudah punya akun?</p>
                <a href="<?=base_url()?>login">Masuk Sekarang</a>
            </div>
        </section>
    </main>
    <footer>
        <p class="copyright">© 2022 Post.in</p>
    </footer>
</body>
</html>