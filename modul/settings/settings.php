<?php

    include("../../include/session.php");
    include("../../include/database.php");
    include("../../include/alerts.php");

    if(!$session_loggedin){
        echo '<script type="text/javascript">parent.window.location.reload();</script>';
        exit();
    }

?>
<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">

        <h1 class="mb-0">Settings</h1>
        <div class="row">

            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="">
                        <?php

                        $sql = "SELECT firstname, lastname, age, height, weight, aim_date, aim_weight FROM tb_user WHERE ID = $session_userid";

                        $res = $mysqli->query($sql);
                        if (isset($res) && $res->num_rows > 0) {
                            $row = $res->fetch_assoc();

                            $user_firstname = $row['firstname'];
                            $user_lastname = $row['lastname'];
                            $user_age = $row['age'];
                            $user_height = $row['height'];
                            $user_aimDate = $row['aim_date'];
                            $user_aimWeight = $row['aim_weight'];

                        }

                        ?>
                        <tr>
                            <td style="padding-top:20px;">Firstname</td>
                            <td><input type="text" class="form-control form-inchange" id="firstname" value="<?php echo $user_firstname;?>"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">Lastname</td>
                            <td><input type="text" class="form-control form-inchange" id="lastname" value="<?php echo $user_lastname;?>"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">Age</td>
                            <td><input type="number" class="form-control form-inchange" id="age" value="<?php echo $user_age;?>"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">Height</td>
                            <td><input type="text" class="form-control form-inchange" id="height" value="<?php echo $user_height;?>"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">Aim Date</td>
                            <td><input type="date" class="form-control form-inchange" id="aim_date" value="<?php echo $user_aimDate;?>"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">Aim Weight</td>
                            <td><input type="text" class="form-control form-inchange" id="aim_weight" value="<?php echo $user_aimWeight;?>"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"><button type="button" class="btn btn-default btn-block" id="saveButton">Save</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<script type="text/javascript" src="modul/settings/settings.min.js"></script>
