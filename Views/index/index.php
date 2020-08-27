<?php
if (Session::get('loggedIn') == true){
    ?>
    <div class="h-50 align-items-center d-flex justify-content-center">
        <h1>You are logged in</h1>
    </div>
    <?php
}else {
    ?>
    <div class="h-50 align-items-center d-flex justify-content-center">
        <h1>Please sign in</h1>
    </div>
    <?php
}
?>