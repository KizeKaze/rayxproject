<?php require 'includes/header.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/login">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="user_email" class="form-control" placeholder="Email Address">
                            <label class="form-label" for="user_email"></label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="user_password" class="form-control" placeholder="Password">
                            <label class="form-label" for="user_password"></label>
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember_me" checked />
                                    <label class="form-check-label" for="remember_me"> Remember me </label>
                                </div>
                            </div>

                            <div class="col">
                                <!-- Simple link -->
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-primary btn-block mb-4">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php' ?>

