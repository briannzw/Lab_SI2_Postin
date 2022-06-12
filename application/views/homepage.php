<!DOCTYPE html>
<html lang="id">

<head>
    <!-- CSS only -->
    <?php $this->load->view('_partials/head.php'); ?>
    <script src="<?=base_url()?>font.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>index.css">

    <title>Post.in - Homepage</title>
</head>

<body>
    <?php $this->load->view('_partials/navbar.php'); ?>

    <div class="mt-4">
        <div class="container d-flex justify-content-center">
            <div class="col-9">
                <div class="row">
                        <!-- START OF POSTS -->
                        <?php $i = 0; ?>
                        <?php foreach ($posts as $post) : ?>
                        <div class="col-8">
                        <div class="d-flex flex-column mb-4" id="<?= "post-".$i ?>">
                            <div class="card">
                                <div class="card-header p-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <div
                                            class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border post-profile-photo mr-3">
                                            <img src="http://picsum.photos/200/200" alt="..."
                                                style="transform: scale(1.5); width: 100%; position: absolute; left: 0;">
                                        </div>
                                        <span class="font-weight-bold ms-2"><a href=<?= site_url('posts/'.$post->user) ?>><?= $post->user ? html_escape($post->user) : "No User" ?></a></span>
                                        
                                        <?php if(($this->auth_model->current_user()->username == $post->user) || ($this->auth_model->current_user()->admin == 1)) : ?>
                                        <span class="position-absolute top-50% end-0" style="padding-right:25px">
                                            <a href="<?= site_url('post/edit/'.$post->id) ?>" class="link-menu">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                            </svg>
                                            </a>
                                        </span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="embed-responsive embed-responsive-1by1">
                                        <img class="embed-responsive-item w-100" src="http://picsum.photos/1000/1000" /> <!-- IMAGE FUNCTION LATER -->
                                    </div>
                                    </div>

                                    <div class="pl-3 pr-3 pb-2">
                                        <strong class="d-block mt-2 ms-3"><?= $post->user ? html_escape($post->user) : "No User" ?></strong>
                                        <p class="d-block mb-1 ms-3"><?= $post->caption ? html_escape($post->caption) : "No Caption" ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <!-- END OF POSTS -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>