<!DOCTYPE html>
<html lang="en">

<head>
    <!--CSS Only-->
    <?php $this->load->view('_partials/head.php'); ?>
    <script src="<?=base_url()?>font.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>index.css">

    <!--Style-->
    <style>
        #profile_picture {
            width: 250px;
            height: 250px;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 0% 0%;
        }

        .picture {
            width: 100%;
            height: 100%;
            object-fit: fill;
        }

        .btnUpload,
        .btnUpdate {
            padding: 5px 20px;
            margin-top: 30px;
            background-color: transparent;
            border-radius: 30px;
        }

        #data_profile {
            margin-top: 30px;
        }

        table tr,
        table td {
            padding: 15px 15px;
        }

        table td label {
            font-size: 20px;
            text-align: center;
        }

        table td input {
            width: 250px;
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
    <title>Post.in - Add Post</title>
</head>

<body>
    <!--Navbar-->
    
    <!--End of Navbar-->
    <?php $this->load->view('_partials/navbar.php'); ?>
    <!--Container with margin-top-->
    <div class="mt-5">
        <div class="container d-flex justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Post</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="container" id="profile_picture">
                                    <!-- https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png -->
                                    <img src="http://picsum.photos/200/200" alt="images" class="picture">
                                </div>
                                <div class="container d-flex justify-content-center">
                                    <a class="btn btnUpload">Pilih foto dari galeri</a>
                                </div>
                            </div>
                            <div class="col" id="data_profile">

                                <?php if($this->session->flashdata('message_post_error')): ?>
                                        <div class="invalid-feedback">
                                                <?= $this->session->flashdata('message_post_error') ?>
                                        </div>
                                <?php endif ?>

                                <form action="" method="post">
                                    <table>
                                        <th>
                                            <h3>New Post</h3>
                                        </th>
                                        <tr>
                                            <td>
                                                <label for="caption"><b>Caption</b></label>
                                            </td>
                                            <td>
                                                <input name="caption" type="text" class="<?= form_error('caption') ? 'invalid' : '' ?>"/>
                                                <div class="invalid-feedback">
                                                    <?= form_error('caption') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <div class="container d-flex justify-content-center">
                                        <button class="btn btnUpdate" type="submit">Add Post</button>
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