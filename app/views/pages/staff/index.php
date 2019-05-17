<div class="jumbotron" style="margin: 0px -15px 18px;">
    <div class="container">
        <h1 class="display-4 text-center"><i class="fas fa-folder-open"></i> Staff.</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>ADD NEW STAFF</h4>
            <form id="newstaff" action="<?php echo ROOT.'staff/newstaff' ?>" class="my_form" method="POST">
                <label for="">Full Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <label for="">Password</label>
                <input type="password" class="form-control" id="passcode" name="passcode">
                <label for="">Staff Email</label>
                <input type="email" class="form-control" id="email" name="email">
                    <label for="">Designated Office</label>
                <input type="text" class="form-control" id="office" name="office">
                <div class="info"></div>
                <button class="btn btn-primary btn-block">Create Account</button>
            </form>
        </div>
        <div class="col-md-8">
        <h4>STAFF MANAGEMENT</h4>
        <table class="table">
            <tr>
                <td>Name</td>
                <td>Designation</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
            <?php
                $staffList = $this->staff;
                    $count = count($staffList);
                    for ($i=0; $i < $count; $i++) { 
                        echo "<tr>";
                            echo '<td>'.$staffList[$i]["username"].'</td>';
                            echo '<td>'.$staffList[$i]["office"].'</td>';
                            echo '<td>'.$staffList[$i]["email"].'</td>';
                            echo "<td>
                            <a href='".ROOT."staff/delete/".$staffList[$i]['memberid']."' class='p-2 text-danger'><i class='fas fa-times'></i></a>
                            </td>";
                        echo "</tr>";
                    }
            ?>
        </table>
        </div>
    </div>
</div>