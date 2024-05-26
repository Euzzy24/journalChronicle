<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Silvestre</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor04" aria-controls="navbarColor04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor04">
        <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a class="nav-link" href="home">Home
            <span class="visually-hidden"></span>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="articles">Articles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('users') ?>">User</a>
        </li>
    </ul>
    <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
</div>
</nav> -->

<header>
    <img class="logo" src="<?php echo base_url('assets/images/logo.png'); ?>">
    <nav>
        <ul class="nav_links">
            <li><a href="<?php echo base_url('view/public_article'); ?>">Home</a></li>
            <!-- <li><a href="<?php echo base_url('view/public_article'); ?>">Articles</a></li> -->
            <li><a href="<?php echo base_url('pages/about'); ?>">About</a></li>
        </ul>
    </nav>
    
    <!-- <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form> -->
    <div class="d-flex">
    <img class="circular" style="color: white;" src="<?php echo base_url('assets/images/profilee.png'); ?>" alt="">
    <a class="nav-link"></a>
    </div>
</header>