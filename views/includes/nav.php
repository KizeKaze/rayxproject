
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/users">Users</a>
                </li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
                    </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/register">Register</a>
                </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
</nav>


