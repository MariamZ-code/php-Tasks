<?php
if ($_POST) {

    $products=$_POST["product"];
    for ($i = 1; $i <= $products; $i++) {
        $product = "<form >
                      <div class='form-group d-flex '>

                        <input type='text' placeholder='Product' class='form-control bg-danger m-2'> 
                        <input type='number' placeholder='price' class='form-control bg-danger m-2'> 
                        </div>
                        </form>";
    }

    echo $_POST["price"];


}
    


?>


<!doctype html>
<html lang="en">

<head>
    <title>Supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form method="post">
                    <div class="form-group mt-5">

                        <input type="text" class="form-control" name="user_name" placeholder="Your Name ">

                    </div>
                    <div class="form-group  ">
                        <div class="input-group mb-3">
                            <select class="custom-select" name="user_address">
                                <option selected>Choose...</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Giza">Giza</option>
                                <option value="Alex">Alex</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">


                        <input type="number" class="form-control " name="product" placeholder="Number Of Products">

                    </div>
                    <button type="submit" class="btn btn-danger offset-3 w-50">Submit</button>
                </form>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 offset-4">

            <div class=""><?php if ((isset($product))) {
                                    for ($i = 1; $i <= $products; $i++) {
                                        $product = "<form method='post' >
                                                      <div class='form-group d-flex '>
     
                                                        <input type='text' placeholder='Product' class='form-control mr-2 mt-3 '> 
                                                        <input type='number' placeholder='Price' name='price' class='form-control ml-2 mt-3'> 
                                                        </div>
                                                        <button type='submit' class='btn btn-danger offset-3 w-50'>Submit</button>
                                                        </form>";

                                        echo $product;
                                    }
                                } ?>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>