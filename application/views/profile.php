<!DOCTYPE html>
<html lang="en"?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale = 1.0">
        <meta http-equiv="X-UA Compatible" content="ie=edge">

        <!--CSS Only-->
        <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css" />
        <script src="<?=base_url()?>font.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>index.css">
        
        <!--Font Style-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

        <!--Style-->
        <style>
            #profile_picture{
                width:250px;
                height:250px;
                border: 1px solid black;
                border-radius: 100%;
                margin-top: 30px;
                margin-bottom: 30px;
                padding: 0% 0%;
            }
            .picture{
                border-radius: inherit;
                width: 100%;
                height: 100%;
                object-fit: fill;
            }
            .btnUpload,.btnUpdate{
                padding: 5px 20px;
                margin-top: 30px;
                background-color: transparent;
                border-radius: 30px;
            }

            #data_profile{
                margin-top: 30px;
            }
            table tr, table td{
                padding: 15px 15px;
            }
            
            table td label{
                font-size: 20px;
                text-align: center;
            }

            table td input{
                width:250px;
            }
        </style>

        <!--Title-->
        <title>Post.in - Profile</title>
    </head>
    <body>
        <!--Navbar-->
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container justify-content-center">
                    <div class="d-flex flex-row justify-content-between align-items-center col-9">
                        <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive;">
                            Post.in
                        </a>
                        <!-- Icons -->
                        <div class="d-flex flex-row">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="<?=base_url()?>homepage" class="link-menu">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house-door-fill"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
                                            <path fill-rule="evenodd"
                                                d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="list-inline-item ml-2">
                                    <a href="<?=base_url()?>post/add/1" class="link-menu">
                                        <img src = "http://cdn.onlinewebfonts.com/svg/img_519811.png" style= "width:22px" class= "bi bi-inboxes">
                                    </a>
                                </li>
    
                                <li class="list-inline-item ml-2 align-middle">
                                    <a href="<?=base_url()?>login" class="link-menu">
                                        <div
                                            class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border topbar-profile-photo">
                                            <img src="http://picsum.photos/200/200" alt="..."
                                                style="transform: scale(1.5); width: 100%; position: absolute; left: 0;">
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!--End of Navbar-->

        <!--Container with margin-top-->
        <div class="mt-5">
            <div class="container d-flex justify-content-center">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container" id="profile_picture">
                                        <img src="http://picsum.photos/200/200" alt="images" class="picture">
                                    </div>
                                    <div class="container d-flex justify-content-center">
                                        <button class="btnUpload">Ubah Foto Profil</button>
                                    </div>
                                </div>
                                <div class="col" id="data_profile">
                                    <form>
                                        <table>
                                            <th><h3>Data Profil</h3></th>
                                            <tr>
                                                <td>
                                                    <label for="nama"><b>Nama</b></label>
                                                </td>
                                                <td>
                                                    <input id="nama" name="nama" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="username"><b>Nama Pengguna</b></label>
                                                </td>
                                                <td>
                                                    <input id="username" name="username" type="text">
                                                </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table>
                                            <th><h3>Data Akun</h3></th>
                                            <tr>
                                                <td>
                                                    <label for="email"><b>Email</b></label>
                                                </td>
                                                <td>
                                                    <input id="email" name="email" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="password1"><b>Password</b></label>
                                                </td>
                                                <td>
                                                    <input for="password1" name="password1" type="password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="passsword2"><b>Konfirmasi Password</b></label>
                                                </td>
                                                <td>
                                                    <input id="password2" name="password2" type="password">
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="container d-flex justify-content-center">
                                            <button class="btnUpdate">Update Profil</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <!--End of Container-->

    </body>
</html>