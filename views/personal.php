<!--
    Name: Jittima Goodrich
    Date: 4/14/2019
    File: personal.php
    Personal information form

-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Personal</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
      <span class="navbar-text">
        The Dog Dating Website
      </span>
</nav>

<div class="container">
    <div class="row border rounded my-4" id="contain">

        <div class="col-sm-12">
            <h1>Personal Information</h1>
            <hr>
        </div>


        <div class="col-sm-8">

            <form action="personal.php" method="post">

                <div class="form-row">
                    <div class="col-md-10">
                        <p><strong>First Name</strong></p>
                        <input type="text" class="form-control" name="first_name"
                               value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        <p><strong>Last Name</strong></p>
                        <input type="text" class="form-control" name="last_name"
                               value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        <p><strong>Age</strong></p>
                        <input type="text" class="form-control" name="age"
                               value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>">
                    </div>
                </div>

                <p><strong>Gender</strong></p>
                <label><input type="radio" name="yourchoice"
                              value="Male" <?php if (isset($_POST['yourchoice']) && ($_POST['yourchoice'] == "Male"))
                        echo 'checked'; ?> > Male</label>
                <label><input type="radio" name="yourchoice"
                              value="Female" <?php if (isset($_POST['yourchoice']) && ($_POST['yourchoice'] == "Female"))
                        echo 'checked'; ?> > Female</label><br>


                <div class="form-row">
                    <div class="col-md-10">
                        <p><strong>Phone Number</strong></p>
                        <input type="tel" class="form-control" name="phone"
                               value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-4">
            <div class="card border-light bg-light mb-3 text-center" style="max-width: 18rem;">
                <p><strong>Note:</strong> All information entered is protected
                    by our <a href="#" class="text-decoration-none">privacy policy.</a> Profile information
                    can only be viewed by others with your
                    permission.</p>
            </div>


            <div class="form-row">
                <button type="submit" class="btn btn-primary btn-sm">Next></button>
            </div>

        </div>



    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</body>
</html>





