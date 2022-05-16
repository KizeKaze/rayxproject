<?php require 'includes/header.php' ?>



    <div class="container border">
        <div class="row">
            <!-- Main content -->
            <div class="col-md-8">

                <?php if (isset($_SESSION['user_id'])) : ?>
                <!-- Create Post Card -->
                <div class="card">
                    <a class="btn btn-primary" href="/create_post">Create Post</a>
                </div>
                <?php endif; ?>
                <!-- Main Posts-->
                <?php foreach ($posts as $post) : ?>

                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if(empty($post->post_image)) : ?>
                                    <a href="/show_post/<?= $post->post_id;?>">
                                        <img src="../core/images/default.jpg" class="img-fluid rounded-start" alt="...">
                                    </a>
                                <?php else : ?>
                                    <a href="/show_post/<?= $post->post_id;?>">
                                        <img src="../core/images/<?= $post->post_image; ?>" class="img-fluid rounded-start" alt="...">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <button type="button" class="btn btn-info btn-sm"><?=$post->cat_title;?> </button>
                                        <a class="text-decoration-none" href="/show_post/<?= $post->post_id;?>"><?= $post->post_title; ?></a>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Posted by: <?= $post->post_user; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <ul class="list-group">
                                    <li class="list-group-item"><a href="#">Comment</a></li>
                                    <li class="list-group-item"><a href="#">Report</a></li>
                                    <?php if($post->post_user == $_SESSION['username']) : ?>
                                    <li class="list-group-item"><a href="#">Delete</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

    <!-- Sidebar -->

            <div class="col-md-4">
                <?php if(isset($_SESSION['username'])) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $_SESSION['username']; ?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's
                                content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rules</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's
                            content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require 'includes/footer.php' ?>