<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
  <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
            <!--Home tab -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>">HOME</a>
          </li>
          <!-- Profile tab-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            | <?php echo $_SESSION['user_name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= URLROOT; ?>/posts/profile">Profile</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ">
          <!--Friend icon -->
          <li class="nav-item">
            <a class="nav-link" href=""> <i style="color: white;" class='far fa-comment-dots'></i></a>
          </li>
          <!-- Message icon-->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/friends/index">| <i style="color: white;" class='fas fa-users'></i></a>
          </li>
          <!--Notifications icon -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            | <i class='fas fa-bell' style='color:white;'></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="">
                </a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          
          
        <?php endif; ?>
        </ul>
        
        <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
          
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-basic my-2 my-sm-0" type="submit">Search</button>
          </form>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  