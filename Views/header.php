<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="/Views/assets/jquery-3.5.1.js"></script>
    <script src="/Views/assets/app.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<?php Session::init(); ?>

<nav class="navbar navbar-light bg-light ">
    <?php if (Session::get('loggedIn') == true){
    ?>
        <div class="d-inline-flex p-2">
    <a href="<?php echo URL.'task'?>" class="btn <?php echo ($_SERVER['REQUEST_URI'] == '/task') ? 'disabled':"";?>">
        <button class="btn btn-outline-success" type="button">Cabinet</button>
    </a>
        <a href="<?php echo URL.'calendar'?>" class="btn <?php echo ($_SERVER['REQUEST_URI'] == '/calendar') ? 'disabled':"";?>">
            <button class="btn btn-outline-success p-2" type="button">Notes</button>
        </a>
        <a href="<?php echo URL.'task/clients'?>" class="btn <?php echo ($_SERVER['REQUEST_URI'] == '/task/clients') ? ' disabled':"";?>">
            <button class="btn btn-outline-success" type="button">Clients</button>
        </a>
        </div>
<?php }?>
    <form class="form-inline d-flex justify-content-end">


        <?php if(Session::get('loggedIn') == true):?>
            <a href="<?php echo URL.'index/logout'?>">
                <button class="btn btn-outline-warning m-2" type="button">Logout</button>
            </a>
        <?php else: ?>
            <a href="<?php echo URL.'login'?>">
                <button class="btn btn-outline-success m-2" type="button">Sign in</button>
            </a>
            <a href="<?php echo URL.'register'?>">
                <button class="btn btn-outline-success m-2" type="button">Sign up</button>
            </a>
        <?php endif; ?>
    </form>
</nav>
<br>

