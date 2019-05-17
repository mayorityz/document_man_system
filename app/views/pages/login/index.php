<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 logpage">
            <h1 class="text-center">Login</h1>
            <form action="<?php echo ROOT ?>login/run" method="post" id="loginform">
                <label for="">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Please Enter Your Email"><br>
                <label for="">Password</label>
                <input type="password" name="mem_id" id="memid" class="form-control" placeholder="Enter Your Password"br>
                
                <button class="btn btn-primary btn-block">Login</button>
                    <br>
                <div class="info"></div>
                    <br>
            </form>
        </div>
    </div>
</div>