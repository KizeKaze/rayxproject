<?php require 'includes/header.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <?php if(isset($data['success']) && ($data['success']))  : ?>
                <div class="alert alert-success" role="alert">
                        <div class="text-center">Account created!</div>
                </div>
            <?php endif; ?>

            <?php if(isset($data['failed'])) {
                foreach ($data['errors'] as $error) { ?>
                 <div class="alert alert-danger" role="alert">
                     <div class="text-center"><?= $error; ?></div>
                </div>
            <?php  }
            } ?>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/register">
                        <!-- Email input -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="email">Email:</span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email...">
                            <label class="form-label" for="email"></label>
                        </div>

                        <!-- Username input -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username">Username:</span>
                            <input type="text" id="text" name="username" class="form-control" placeholder="Username...">
                            <label class="form-label" for="email"></label>
                        </div>

                        <!-- Password input -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password">Password:</span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password...">
                            <label class="form-label" for="password"></label>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="confirm_password">Confirm Password:</span>
                            <input type="password" id="password" name="confirm_password" class="form-control" placeholder="Confirm Password...">
                            <label class="form-label" for="confirm_password"></label>
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-primary btn-block mb-4">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php' ?>

