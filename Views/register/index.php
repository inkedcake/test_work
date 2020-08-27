<div class="container">
    <h1>Sign up</h1>

    <form action="register/run" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Full name</label>
            <input type="text" class="form-control" name="full_name" aria-describedby="full_name" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" name="login" aria-describedby="login" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password again</label>
            <input type="password" class="form-control" name="password2" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>