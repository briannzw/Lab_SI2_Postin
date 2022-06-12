<!DOCTYPE html>
<html lang="en"?>
    <head>
        <!--CSS Only-->
        <?php $this->load->view('_partials/head.php'); ?>
        <script src="<?=base_url()?>font.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>index.css">

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
            .invalid {
                border: 2px solid rgb(153, 16, 16);
            }

            .invalid::placeholder {
                color: rgb(153, 16, 16);
            }

            .invalid-feedback:empty {
                display: none;
            }
            .invalid-feedback {
                display: block;
                font-size: smaller;
                color: rgb(153, 16, 16);
            }
        </style>

        <!--Title-->
        <title>Post.in - Profile</title>
    </head>
    <body>
        <!--Navbar-->
        <?php $this->load->view('_partials/navbar.php'); ?>
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
                                        <a class="btn btnUpload">Ubah Foto Profil</a>
                                        <a href="<?= site_url("auth/logout") ?>" class="ms-2 btn btnUpload">Log Out</a>
                                        <a href="<?= site_url("profile/delete") ?>" class="ms-2 btn btnUpload">Delete Account</a>
                                    </div>
                                </div>
                                <div class="col" id="data_profile">

                                <?php if($this->session->flashdata('message_update_profile_error')): ?>
                                        <div class="invalid-feedback">
                                                <?= $this->session->flashdata('message_update_profile_error') ?>
                                        </div>
                                <?php endif ?>

                                    <form action="" method="post">
                                        <table>
                                            <th><h3>Data Profil</h3></th>
                                            <tr>
                                                <td>
                                                    <label for="username"><b>Username</b></label>
                                                </td>
                                                <td>
                                                    <input name="username" type="text" value="<?= form_error('username') ? set_value('username') : $user_data->username ?>" class="<?= form_error('username') ? 'invalid' : '' ?>" />
                                                <div class="invalid-feedback">
                                                    <?= form_error('username') ?>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="name"><b>Nama Pengguna</b></label>
                                                </td>
                                                <td>
                                                    <input name="name" type="text" value="<?= form_error('name') ? set_value('name') : $user_data->name ?>" class="<?= form_error('name') ? 'invalid' : '' ?>" />
                                                <div class="invalid-feedback">
                                                    <?= form_error('name') ?>
                                                </div>
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
                                                    <input name="email" type="text" value="<?= form_error('email') ? set_value('email') : $user_data->email ?>" class="<?= form_error('email') ? 'invalid' : '' ?>" />
                                                <div class="invalid-feedback">
                                                    <?= form_error('email') ?>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="password1"><b>Password</b></label>
                                                </td>
                                                <td>
                                                    <input name="password" type="password" placeholder="Password" value="<?= form_error('password') ? set_value('password') : "" ?>" class="<?= form_error('password') ? 'invalid' : '' ?>">
                                                <div class="invalid-feedback">
                                                    <?= form_error('password') ?>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="passsword2"><b>Konfirmasi Password</b></label>
                                                </td>
                                                <td>
                                                    <input name="confirm_password" type="password" placeholder="Confirm Password" value="<?= form_error('confirm_password') ? set_value('confirm_password') : "" ?>" class="<?= form_error('confirm_password') ? 'invalid' : '' ?>">
                                                <div class="invalid-feedback">
                                                    <?= form_error('confirm_password') ?>
                                                </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="container d-flex justify-content-center">
                                            <button type="submit" class="btn btnUpdate">Update Profil</button>
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