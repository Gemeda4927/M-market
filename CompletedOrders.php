
<?php


include 'config.php';



 session_start();
 include('header.php');
if (!isset($_SESSION['username'])) {

    header("Location: login.php");
}
else{
  echo  $_SESSION['username'];
}


?>




             <!-- Table with hoverable rows -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">Product</th>
      <th scope="col">category</th>
      <th scope="col">quantity</th>
      <th scope="col">Total Price</th>
   
      <th>action</th>
    </tr>
  </thead>
  <form action="deleteOrder.php" method='post'>
  
  
  
  <tbody>

          <?php
          include("config.php");
          // Assuming you have already established a connection to the database
          // and $conn is your database connection variable

          $user =$_SESSION['username'];
          // Create the SQL query
          $sql = "SELECT o.id, u.username, p.ProductName, o.quantity, p.Price, cat.category_name
          FROM `order` o
          JOIN users u ON o.user_id = u.id
          JOIN Product p ON o.product_id = p.id
          JOIN Category cat ON p.PCategoryID = cat.id
          WHERE u.username = '$user'
          ORDER BY o.id ASC;
          ";

          // Execute the query
          $result = mysqli_query($conn, $sql);

          // Check if the query was successful
          if ($result) {
              // Loop through each row and display the data
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<th scope='row'>". $row['id'] ." </th>";
                  echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" . $row['ProductName'] . "</td>";
                  echo "<td>" . $row['category_name'] . "</td>";
                  echo "<td>" . $row['quantity'] . "</td>";
                  echo "<td>" . $row['quantity'] * $row['Price'] . " birr</td>";
                 // echo "<td><input type='text' name='oid' value='" . $row['id'] . "' style='display: none;'></td>";
                 echo "<td><a class='btn btn-danger' href='deleteOrder.php?oid={$row['id']}' >delete</a></td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>Error retrieving data</td></tr>";
          }

          // Close the database connection
          mysqli_close($conn);
          ?>
          </form>
        </tbody>
    
      </table>
      <!-- End Table with hoverable rows -->