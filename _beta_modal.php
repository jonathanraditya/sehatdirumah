<?php

include "connect.php";

?>
<!doctype html>
<html>
 <head>
  <!-- CSS -->
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
 </head>
 <body >
  <div class="container" >
   <!-- Modal -->
   <div class="modal fade" id="footnotesModal" role="dialog">
    <div class="modal-dialog" role="document">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-body">
        
        
      </div>

     </div>
    </div>
   </div>

   <br/>
   
   <!--DATASHOW-->
   <table border='1' style='border-collapse: collapse;'>
    <tr>
     <th>Name</th>
     <th>Email</th>
     <th>&nbsp;</th>
    </tr>
   <?php 
   $id = '2';
     $name = 'jonathan';
     $email = 'jonathanraditya@live.com';
     $id2 = '3';
     $name2 = 'Rico';
     $email2 = 'ricoo@live.com';

     echo "<tr>";
     echo "<td>".$name."</td>";
     echo "<td>".$email."</td>";
     echo "<td><span data-id='".$id."' class='fn-modal-trigger'>Info</span></td>";
     echo "</tr>";
     echo "<tr>";
     echo "<td>".$name2."</td>";
     echo "<td>".$email2."</td>";
     echo "<td><span data-id='56' class='fn-modal-trigger'>Info</span></td>";
     echo "</tr>";
   ?>
   </table>
 
  </div>
  <script>
      $(document).ready(function(){

     $('.fn-modal-trigger').click(function(){
       
       var footnotesNumber = $(this).data('id');
    
       // AJAX request
       $.ajax({
        url: '_beta_ajaxfile.php',
        type: 'get',
        data: {footnotesNumber: footnotesNumber},
        success: function(response){ 
          // Add response in Modal body
          
          $('.modal-body').html(response);
    
          // Display Modal
          $('#footnotesModal').modal('show'); 
        }
      });
     });
    });
  </script>
 </body>
</html>