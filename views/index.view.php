<?php require 'includes/header.php' ?>

    <div class="container border">
        <div class="row">
            <!-- Main content -->
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#"><input class="form-control" type="text" name="create_post" placeholder="Create Post"></a></h5>
                    </div>
                </div>
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Killians</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's
                            content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
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