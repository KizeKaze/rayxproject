<?php require 'includes/header.php' ?>

    <div class="container border">
        <div class="row">
            <!-- Main content -->
            <div class="col-8">

                <?php if (isset($_SESSION['user_id'])) : ?>
                <!-- Create Post Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#"><input class="form-control" type="text" name="create_post" placeholder="Create Post" data-bs-toggle="modal"
                                                                  data-bs-target="#createPost"></a></h5>
                    </div>
                </div>
                <?php endif; ?>
                <!-- Main Posts-->
                <?php foreach ($posts as $post) : ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->post_title; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Posted by: <?= $post->post_user; ?></h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Cras justo odio
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>


    <!-- Sidebar -->

            <div class="col-4">
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

<div class="modal" id="createPost" tabindex="-1" aria-labelledby="createPostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create_post">
                    <div class="form-floating mb-3">
                        <input type="text" name="post_title" class="form-control" id="floatingPostTitle" placeholder="Post Title" required>
                        <label for="floatingPostTitle">Post Title</label>
                    </div>
                    <div class="form-floating">
                        <textarea cols="5" name="post_content" class="form-control" id="floatingPostContent" placeholder="post Content" required></textarea>
                        <label for="floatingPostContent">Post Content</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Send">
                <input type="hidden" name="post_user" value="<?=$_SESSION['username']?>">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../core/js/create_post.js"></script>


<?php require 'includes/footer.php' ?>