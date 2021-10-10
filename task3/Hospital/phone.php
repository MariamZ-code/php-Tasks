 <?php
    $title = "Review";
    include_once "layout/header.php";

    print_r($_POST);
    ?>

 <div class="container-fluid ">

     <div class="container bg-dark mb-5 ">
         <div class="row">
             <div class="col-6 offset-3 mt-5">

                 <form method="post">
                     <div class="mb-3">

                         <input type="text" name="userName" class="form-control mt-5" placeholder="Your Name" id="exampleInputEmail1" aria-describedby="emailHelp">

                     </div>
                     <div class="mb-3">

                         <input type="number" name="phoneNum" class="form-control mt-5" placeholder="Phone Number" id="exampleInputPassword1">
                     </div>

                     <button type="submit" class="btn mb-5 mt-2" style="background-color: darkgray;">Submit</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <?php
    include_once "layout/footer.php";
    ?>