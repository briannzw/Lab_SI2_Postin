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

        #btnUpload {
            padding: 5px 30px;
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: transparent;
            border-radius: 30px;
            border: 1px solid black;
        }
        
        #btnUpload:link, #btnUpload:active, #btnUpload:visited{
            text-decoration: none;
            color:black;
        }

        #btnUpload:hover, #btnAdd:hover{
            background-color: dodgerblue;
            color:white;
            border: 1px solid white;
        }

        #btnAdd{
            border-radius: 30px;
            border: 1px solid black;
            background-color:transparent;
            margin:5px 15px;
            padding:5px 30px; 
        }

        #data_profile {
            margin-top: 30px;
        }

        table tr, table td {
            padding: 5px 15px;
        }

        table td label {
            font-size: 20px;
            text-align: center;
        }

        table td input {
            width: 250px;
        }
        #caption{
            width: 500px;
            height: 200px;
            max-height: 200px;
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
                                <?php $img_path = base_url('upload/post/'); ?>
                                <div class="container" id="profile_picture">
                                    <img src="<?= $img_path ?><?=($img == "") ? "white-image.png" : $img ?>" alt="images" class="picture">
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="form-name" value="img">  
                                    <input type="hidden" name="img-data" value="<?= $img ?>">
                                    <div class="container d-flex justify-content-center">
                                        <input type="file" name="image-data" id="image-data" accept="image/png, image/jpeg, image/jpg, image/gif">
                                    </div>
                                    <div class="mt-3 container d-flex justify-content-center">
                                        <button type="submit" class="btn btnUpload">Upload Image</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col" id="data_profile">

                                <?php if($this->session->flashdata('message_post_error')): ?>
                                        <div class="invalid-feedback">
                                                <?= $this->session->flashdata('message_post_error') ?>
                                        </div>
                                <?php endif ?>

                                <form action="" method="post">
                                    <input type="hidden" name="form-name" value="post">
                                    <input type="hidden" name="image-data" value="<?= $img ?>">
                                    <table>
                                        <th>
                                            <h3>New Post</h3>
                                        </th>
                                        <tr>
                                            <td>
                                                <label for="caption"><b>Caption :</b></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea name="caption" id="caption" class="<?= form_error('caption') ? 'invalid' : '' ?>"></textarea>
                                                <div class="invalid-feedback">
                                                    <?= form_error('caption') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <div class="container d-flex justify-content-center">
                                        <button class="btnAdd" id="btnAdd" type="submit">Add Post</button>
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