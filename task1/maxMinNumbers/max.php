<?php
if ($_POST) {
    if (is_numeric($_POST['first_number']) && is_numeric($_POST['second_number']) && is_numeric($_POST['third_number'])) {
        if ($_POST['first_number'] > $_POST['second_number'] && $_POST['first_number'] > $_POST['third_number']) {
            if ($_POST['second_number'] > $_POST['third_number']) {
                $output = "<div class='alert alert-dark text-center mb-4'> Max Number Is " . $_POST['first_number'] . " & Min Number is " . $_POST['third_number'] . " </div>";
            } elseif ($_POST['second_number'] < $_POST['third_number']) {
                $output = "<div class='alert alert-dark text-center mb-4'> Max Number Is " . $_POST['first_number'] . " & Min Number is " . $_POST['second_number'] . " </div>";
            }
        } elseif ($_POST['second_number'] > $_POST['first_number'] && $_POST['second_number'] > $_POST['third_number']) {
            if ($_POST['first_number'] > $_POST['third_number']) {
                $output = "<div class='alert alert-dark text-center mb-4'> Max Number Is " . $_POST['second_number'] . " & Min Number is " . $_POST['third_number'] . " </div>";
            } elseif ($_POST['first_number'] < $_POST['third_number']) {
                $output = "<div class='alert alert-dark text-center mb-4'> Max Number Is " . $_POST['second_number'] . " & Min Number is " . $_POST['first_number'] . " </div>";
            }
        } elseif ($_POST['third_number'] > $_POST['first_number'] && $_POST['third_number'] > $_POST['second_number']) {
            if ($_POST['first_number'] > $_POST['second_number']) {
                $output = "<div class='alert alert-dark text-center mb-4'> Max Number  Is " . $_POST['third_number'] . " & Min Number is " . $_POST['second_number'] . " </div>";
            } elseif ($_POST['first_number'] < $_POST['second_number']) {
                $output = "<div class='alert alert-dark text-center mb-4'> Max Number Is " . $_POST['third_number'] . " & Min Number is " . $_POST['first_number'] . " </div>";
            }
        }
    } else {
        $output = "<div class='alert alert-dark text-center mb-4'>Enter Numbers </div>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Max Number</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5 bg-secondary">
            <div class="col-6 offset-3">
                <form action="" method="post">
                    <div class="text-center text-dark mt-4">
                        <h1>Max And Min Numbers</h1>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="first_number" id="" class="form-control" placeholder="first number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="second_number" id="" class="form-control" placeholder="second number" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="third_number" id="" class="form-control" placeholder="third number" aria-describedby="helpId">
                    </div>
                    <div class="col-3 form-group offset-4 ">
                        <label for=""></label>
                        <button class="btn btn-dark rounded form-control"> Submit </button>
                    </div>
                </form>
                <?php if (isset($output)) {
                    echo $output;
                } ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>