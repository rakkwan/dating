<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
      <span class="navbar-text">
        The Dog Dating Website
      </span>
</nav>

<div class="container">
    <div class="row border rounded my-4">

        <div class="col-sm-12">
            <h1>Profile</h1>
            <hr>
        </div>


        <div class="col-sm-6">

            <form action="profile.php" method="post">

                <div class="form-row">
                    <div class="col-md-10">
                        <p><strong>Email</strong></p>
                        <input type="email" class="form-control" name="first_name"
                               value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        <p><strong>State</strong></p>
                        <input type="text" class="form-control" name="last_name"
                               value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                    </div>
                </div>

                <p><strong>Seeking</strong></p>
                <label><input type="radio" name="yourchoice"
                              value="Male" <?php if (isset($_POST['yourchoice']) && ($_POST['yourchoice'] == "Male"))
                        echo 'checked'; ?> > Male</label>
                <label><input type="radio" name="yourchoice"
                              value="Female" <?php if (isset($_POST['yourchoice']) && ($_POST['yourchoice'] == "Female"))
                        echo 'checked'; ?> > Female</label><br>

            </form>
        </div>

        <div class="col-sm-6 my-4">
            <p><strong>Biography</strong></p>
                <p>All information entered is protected
                    by our privacy policy. Profile information
                    can only be viewed by others with your
                    permission.</p>

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

