 <?php
 $title = "Question";
 include_once "layout/header.php";
 ?>
 
 <div class="container-fluid ">
     <div class="container  mb-5 ">
         <div class="row">
             <div class="col-10 offset-1 mt-5">

                 <table class="table">
                     <thead>
                         <tr class=" bg-danger">
                             <th class="p-3" scope="col">Questions: </th>
                             <th class="p-3" scope="col">Bad</th>
                             <th class="p-3" scope="col">Good</th>
                             <th class="p-3" scope="col">Very Good</th>
                             <th class="p-3" scope="col">Excellent</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>

                             <th scope="row">-Are you satisfied with the level of cleanliness?</th>
                             <td class="p-3 text-center"> <input type="radio" name="question1" value="bad" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question1" value="good" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question1" value="vGood" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question1" value="excellent" aria-label="Radio button for following text input"></td>

                         </tr>
                         <tr>
                             <th scope="row">-Are you satisfied with the service prices?</th>
                             <td class="p-3 text-center"> <input type="radio" name="question2" value="bad" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question2" value="good" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question2" value="vGood" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question2" value="excellent" aria-label="Radio button for following text input"></td>
                         </tr>
                         <tr>
                             <th scope="row">-Are you satisfied with the nursing service?</th>
                             <td class="p-3 text-center"> <input type="radio" name="question3" value="bad" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question3" value="good" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question3" value="vGood" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question3" value="excellent" aria-label="Radio button for following text input"></td>
                         </tr>
                         <tr>
                             <th scope="row">-Are you satisfied with the level of the doctor?</th>
                             <td class="p-3 text-center"> <input type="radio" name="question4" value="bad" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question4" value="good" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question4" value="vGood" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question4" value="excellent" aria-label="Radio button for following text input"></td>
                         </tr>
                         <tr>
                             <th scope="row">-Are you satisfied with the calmness in the hospital?</th>
                             <td class="p-3 text-center"> <input type="radio" name="question5" value="bad" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question5" value="good" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question5" value="vGood" aria-label="Radio button for following text input"></td>
                             <td class="p-3 text-center"> <input type="radio" name="question5" value="excellent" aria-label="Radio button for following text input"></td>
                         </tr>
                     </tbody>
                 </table>

             </div>
         </div>
     </div>
 </div> 


 <?php
include_once "layout/footer.php";
?>