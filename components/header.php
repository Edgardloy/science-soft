<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Science Soft</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $activePage === 'add' ? 'active' : ''; ?>">
                    <a class="nav-link" href="addUser.php">Add</a>
                </li>
                <?php if (isset($_SESSION['registered_user'])) : ?>
                    <li class="nav-item <?= $activePage === 'show' ? 'active' : ''; ?>">
                        <a class="nav-link" href="showUsers.php">Show</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Upload</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right nav-login">
                <?php if (isset($_SESSION['registered_user'])) : ?>
                    <form class="navbar-form navbar-left" role="logout" method="POST" action="functions.php">
                        <input type="hidden" name="action" value="logout" />
                        <button type="submit" class="btn btn-outline-info btn-xs">Logout</button>
                    </form>
                <?php else : ?>
                    <form class="navbar-form navbar-left" role="login" method="POST" action="functions.php">
                        <input type="hidden" name="action" value="login" />
                        <div class="form-group">
                            <input type="username" name="username" required class="form-control login-username" placeholder="Username">
                            <input type="password" name="password" required class="form-control login-password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-outline-info btn-xs">Login</button>
                    </form>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="position-fixed w-100 d-flex flex-column p-4" style="top: 50px;">
            <div class="toast ml-auto" role="alert" data-delay="700" data-autohide="false">
                <div class="toast-header">
                    <strong class="mr-auto text-primary">Message</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body"><?= $_SESSION['message'] ?></div>
            </div>
        </div>
    <?php endif; unset($_SESSION['message']);?>
</header>