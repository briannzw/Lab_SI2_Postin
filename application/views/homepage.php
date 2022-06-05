<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css" />
    <script src="<?=base_url()?>font.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <title>Post.in - Homepage</title>
    <style>
        .expands:link{
            text-decoration: none;
            color:black;
        }
        .expands:hover{
            color:black;
        }
        .expands:active{
            text-decoration: none;
            color: black;
        }
        .expand:visited{
            color:black;
            text-decoration: none;        
        }
    </style>
</head>

<body>
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
                                <svg xmlns="http://www.w3.org/2000/svg"width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
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

    <div class="mt-4">
        <div class="container d-flex justify-content-center">
            <div class="col-9">
                <div class="row">
                    <div class="col-8">
                        <!-- START OF POSTS -->
                        <div class="d-flex flex-column mb-4">
                            <div class="card">
                                <div class="card-header p-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <div
                                            class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border post-profile-photo mr-3">
                                            <img src="http://picsum.photos/200/200" alt="..."
                                                style="transform: scale(1.5); width: 100%; position: absolute; left: 0;">
                                        </div>
                                        <span class="font-weight-bold ms-2">User_01</span>
                                        <span class="position-absolute top-50% end-0" style="padding-right:25px">
                                            <a href="#" class="link-menu">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                            </svg>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="embed-responsive embed-responsive-1by1">
                                        <img class="embed-responsive-item w-100" src="http://picsum.photos/1000/1000" />
                                    </div>
                                    </div>

                                    <div class="pl-3 pr-3 pb-2">
                                        <strong class="d-block mt-2 ms-3">User_01</strong>
                                        <p class="d-block mb-1 ms-3">Lil drone shot I got a while back but never posted.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END OF POSTS -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>