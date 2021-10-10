 <?php
    if ($_POST) {
        if (is_numeric($_POST["first_number"]) && is_numeric($_POST["second_number"])) {
            if ($_POST["operator"] == "add") {
                $sumNum = $_POST["first_number"] + $_POST["second_number"];
                $output = "<div class='alert alert-dark text-center mb-4'> $sumNum</div>";
            } elseif ($_POST["operator"] == "sub") {
                $subNum = $_POST["first_number"] - $_POST["second_number"];
                $output = "<div class='alert alert-dark text-center mb-4'> $subNum</div>";
            } elseif ($_POST["operator"] == "multiply") {
                $multiNum = $_POST["first_number"] * $_POST["second_number"];
                $output = "<div class='alert alert-dark text-center mb-4'> $multiNum</div>";
            } elseif ($_POST["operator"] == "divide") {
                $modNum = $_POST["first_number"] / $_POST["second_number"];
                $output = "<div class='alert alert-dark text-center mb-4'> $modNum</div>";
            } elseif ($_POST["operator"] == "modulus") {
                $modNum = $_POST["first_number"] % $_POST["second_number"];
                $output = "<div class='alert alert-dark text-center mb-4'> $modNum</div>";
            } elseif ($_POST["operator"] == "power") {
                $powNum = $_POST["first_number"] ** $_POST["second_number"];
                $output = "<div class='alert alert-dark text-center mb-4'> $powNum</div>";
            }
        } else {
            $output = "<div class='alert alert-dark text-center mb-4'> Enter Numbers !!</div>";
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
                         <h1>Calculator</h1>
                     </div>
                     <div class="form-group">
                         <label for=""></label>
                         <input type="text" name="first_number" id="" class="form-control" placeholder="first number" aria-describedby="helpId">
                     </div>

                     <div class="col-3 form-group offset-4 ">
                         <select name="operator" class="m-2 bg-dark rounded">
                             <option value="">operators</option>
                             <option value="add">add</option>
                             <option value="sub">sub</option>
                             <option value="multiply">multiply</option>
                             <option value="divide">divide</option>
                             <option value="modulus">modulus</option>
                             <option value="power">power</option>
                         </select>

                     </div>


                     <div class="form-group">
                         <label for=""></label>
                         <input type="text" name="second_number" id="" class="form-control" placeholder="second number" aria-describedby="helpId">
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