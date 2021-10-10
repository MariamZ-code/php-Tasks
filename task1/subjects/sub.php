<?php
if ($_POST) {
    if (is_numeric($_POST['physics']) && 
    is_numeric($_POST['chemistry']) && 
    is_numeric($_POST['biology']) && 
    is_numeric($_POST['mathematics']) && 
    is_numeric($_POST['computer'])) {
        if ($_POST['physics']>=0 && 
        $_POST['chemistry']>=0  &&
         $_POST['biology']>=0  &&
          $_POST['mathematics']>=0 &&
           $_POST['computer']>=0) { 
            if ($_POST['physics'] <= 100  &&  $_POST['chemistry'] <= 100 &&  $_POST['biology'] <= 100  &&  $_POST['mathematics'] <= 100 &&  $_POST['computer'] <= 100) {
            $percentage = ($_POST['physics'] + $_POST['chemistry'] + $_POST['biology'] + $_POST['mathematics'] + $_POST['computer']) / 500 * 100;
           
            if ($percentage >= 90) {
                $output = "<div class='alert alert-dark text-center mb-4'> Percentage =" . $percentage . "%  Grade A</div>";
            } elseif ($percentage >= 80) {
                $output = "<div class='alert alert-dark text-center mb-4'> Percentage =" . $percentage . "%  Grade B</div>";
            } elseif ($percentage >= 70) {
                $output = "<div class='alert alert-dark text-center mb-4'> Percentage =" . $percentage . "%  Grade C</div>";
            } elseif ($percentage >= 60) {
                $output = "<div class='alert alert-dark text-center mb-4'> Percentage =" . $percentage . "%  Grade D</div>";
            } elseif ($percentage >= 50) {
                $output = "<div class='alert alert-dark text-center mb-4'> Percentage =" . $percentage . "%  Grade D</div>";
            } elseif ($percentage < 50) {
                $output = "<div class='alert alert-dark text-center mb-4'> Percentage =" . $percentage . "%  Grade F</div>";
            }
        } else {
            $output = "<div class='alert alert-dark text-center mb-4'> The Highest degree of subjects is 100 </div>";
        }
    } else{ $output = "<div class='alert alert-dark text-center mb-4'>Degree From 0 To 100 </div>";}

}else {
        $output = "<div class='alert alert-dark text-center mb-4'> Enter Degree by Numbers  </div>";
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
                        <h1>Grade </h1>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="physics" id="" class="form-control" placeholder="Physics" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="chemistry" id="" class="form-control" placeholder="Chemistry" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="biology" id="" class="form-control" placeholder="Biology" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="mathematics" id="" class="form-control" placeholder="Mathematics " aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="computer" id="" class="form-control" placeholder="Computer" aria-describedby="helpId">
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