<div class="card">
    <div class="card-header">Login User</div>
    <div class="card-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="user_email">User Email</label>
                <input type="email" class="form-control" name="user_email">
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
                <input type="password" class="form-control" name="user_password">
            </div>            
            <input type="submit" class="btn btn-primary" name="submit" value="Login">
        </form>    
    </div>
</div>