<!DOCTYPE html>
<html lang="id">
<head>
    <?php $this->load->view('_partials/head.php'); ?>
    <link href="<?=base_url();?>login-styles.css" rel="stylesheet" />
    <title>Post.in - Login</title>
</head>
<body>
    
    <main class="flex align-items-center justify-content-center">
            <section id="auth" class="flex direction-column">
                <div class="panel login flex direction-column">
                    <h1 class="flex justify-content-center" style="font-family: 'Pacifico', cursive; font-size:40px">Post.in
                    </h1>
                    <h3 class="flex justify-content-center" style="color:dodgerblue;"><b>Login</b></h3>

                    <?php if($this->session->flashdata('message_login_error')): ?>
                            <div class="invalid-feedback">
                                    <?= $this->session->flashdata('message_login_error') ?>
                            </div>
                    <?php endif ?>

                    <form action="" method="post">
                        <label for="name" class="sr-only">Nama pengguna atau email</label>
                        <input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>" placeholder="Nama pengguna atau email" value="<?= set_value('username') ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('username') ?>
                        </div>

                        <label for="password" class="sr-only">Kata Sandi</label>
                        <input name="password" type="password" placeholder="Kata Sandi" class="<?= form_error('password') ? 'invalid' : '' ?>" value="<?= set_value('password') ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('password') ?>
                        </div>

                        <div>
                            <button type="submit" class="button button-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="panel register flex justify-content-center">
                    <p>Tidak punya akun?</p>
                    <a href="<?=base_url();?>register">Buat akun</a>
                </div>
            </section>
    </main>

    <footer>
        <p class="copyright">© 2022 Post.in</p>
    </footer>
</html>