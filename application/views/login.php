<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=base_url();?>login-styles.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <script type="text/javascript" src="<?=base_url();?>jquery-3.6.0.min.js"></script>
    <title>Post.in - Login</title>
</head>
<body>
    <main class="flex align-items-center justify-content-center">
        <section id="mobile" class="flex">
        </section>
        <section id="auth" class="flex direction-column">
            <div class="panel login flex direction-column">
                <h1 title="Instagram" class="flex justify-content-center" style="font-family: 'Pacifico', cursive; font-size:45px">Post.in
                </h1>
                <h2 class="flex justify-content-center" style="color:dodgerblue;">Login</h2>
                <form>
                    <label for="email" class="sr-only">Nomor telepon, nama pengguna, atau email</label>
                    <input name="email" placeholder="Nomor telepon, nama pengguna, atau email" />

                    <label for="password" class="sr-only">Kata Sandi</label>
                    <input name="password" type="password" placeholder="Kata Sandi" />

                    <button id="btn_login" type="button">Login</button>
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

    <script>
        $(document).ready(function(){
            $('#btn_login').click(function(){
                window.location.href = "<?=base_url()?>homepage";
            });
        });
    </script>
</body>
</html>