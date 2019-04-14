
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<nav class="navbar navbar-light bg-light">
      <span class="navbar-text">
        The Dog Dating Website
      </span>
</nav>


<div class="container">
    <div class="row border rounded my-4">
        <div class="col-sm-8">

            <form action="personal.php" method="post">

                <h1>Personal Information</h1>

                <div class="form-row">
                    <div class="col-md-10">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name"
                               value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name"
                               value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age"
                               value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>">
                    </div>
                </div>

                <label>Gender</label><br>
                <label><input type="radio" name="yourchoice"
                              value="Male" <?php if (isset($_POST['yourchoice']) && ($_POST['yourchoice'] == "Male"))
                        echo 'checked'; ?> > Male</label>
                <label><input type="radio" name="yourchoice"
                              value="Female" <?php if (isset($_POST['yourchoice']) && ($_POST['yourchoice'] == "Female"))
                        echo 'checked'; ?> > Female</label><br>


                <div class="form-row">
                    <div class="col-md-10">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phone"
                               value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                    </div>
                </div>
        </div>

                <div class="col-sm-4 my-4">
                    <div class="jumbotron">
                        <p><strong>Note:</strong> All information entered is protected
                            by our privacy policy. Profile information
                        can only be viewed by others with your
                        permission.</p>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary btn-sm">Next></button>
                    </div>

                </div>

            </form>

    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<?php
/**
 * Created by PhpStorm.
 * User: jrakk
 * Date: 4/14/2019
 * Time: 7:56 AM
 */