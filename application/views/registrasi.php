<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=base_url();?>login-styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script type="text/javascript" src="<?=base_url();?>jquery-3.6.0.min.js"></script>
    <title>Post.in - Sign Up</title>
</head>
<body>
    <main class="flex align-items-center justify-content-center">
        <section id="mobile" class="flex">
        </section>
        <section id="auth" class="flex direction-column">
            <div class="panel login flex direction-column">
                <h1 title="Instagram" class="flex justify-content-center" style="font-family: 'Pacifico', cursive; font-size:45px">Post.in
                </h1>
                <h2 class="flex justify-content-center" style="color:dodgerblue;">Sign Up</h2>
                <form>
                    <label for="username" class="sr-only">Username</label>
                    <input name="username" placeholder="Username" />

                    <label for="email" class="sr-only">Email</label>
                    <input name="email" placeholder="Email" />

                    <label for="nama" class="sr-only">Nama Lengkap</label>
                    <input name="nama" placeholder="Nama Lengkap" />

                    <label for="password" class="sr-only">Kata Sandi</label>
                    <input name="password" type="password" placeholder="Kata Sandi" />

                    <label for="password2" class="sr-only">Konfirmasi Kata Sandi</label>
                    <input name="password2" type="password" placeholder="Konfirmasi Kata Sandi" />

                    <button id="btn_register" type="button">Sign Up</button>
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

    <script>
        $(document).ready(function(){
            $('#btn_register').click(function(){
                window.location.href = "<?=base_url()?>login";
            });
        });
    </script>
</body>
</html>