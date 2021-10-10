<?php
if ($_POST) {
    if (is_numeric($_POST['number'])) {
        if ($_POST['number'] >= 0 && $_POST['number'] < 50) {

            $counter = $_POST['number'] * 0.5;
            $bill = $counter + ($counter * 0.2);

            $output = "<div class='alert alert-dark text-center mb-4'>  Your Electricity Bill = " . $bill . " </div>";
        } elseif ($_POST['number'] >= 50 && $_POST['number'] < 150) {
            $counter = $_POST['number'] * 0.75;
            $bill = $counter + ($counter * 0.2);
            $output = "<div class='alert alert-dark text-center mb-4'> Your Electricity Bill = " . $bill . " </div>";
        } elseif ($_POST['number'] >= 150 && $_POST['number'] < 250) {
            $counter = $_POST['number'] * 1.20;
            $bill = $counter + ($counter * 0.2);
            $output = "<div class='alert alert-dark text-center mb-4'> Your Electricity Bill = " . $bill . " </div>";
        } elseif ($_POST['number'] >= 250){
            $counter = $_POST['number'] * 1.50;
            $bill = $counter + ($counter * 0.2);
            $output = "<div class='alert alert-dark text-center mb-4'>  Your Electricity Bill = " . $bill . " </div>";
        }else{$output = "<div class='alert alert-dark text-center mb-4'> Enter Units by Positve Number </div>";}
    } else {
        $output = "<div class='alert alert-dark text-center mb-4'> Enter Units By Number!! </div>";
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
                        <h1> Electricity Bill </h1>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="number" id="" class="form-control" placeholder="Number" aria-describedby="helpId">
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