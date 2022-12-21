<html>
   <head>
      <title>Fruits DB</title>
      <link href="./css/style.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,regular,500,700&display=swap&subset=cyrillic-ext" rel="stylesheet" />
   </head>
   <body>
      <div class="container">
         <div class="search__container _flex">
            <form>
               <input class="SearchInput" placeholder="Product name" id="searchInput" name="search">
               <button class="searchBtn" type="submit" id="searchBtn">Search</button>
            </form>
         </div>
         <div class="redirect__container _flex">
            <a class="addBtn" class="button__link" href="./Pages/addProductPage.php">ADD FRUITS TO DB</a>
         </div>
         <div class="database__container _flex">
            <form method="post" action="index.php">
               <?php
               $connectionString = new mysqli("localhost", "root", "", "education");
               if (isset($_POST['delButton'])){
                  if ($connectionString->connect_error){
                     echo 'Error';
                  }
                  else{
                     $delete = 'DELETE FROM fruits_1 WHERE id='.(int)$_POST['delButton'];
                     $result = $connectionString->query($delete);
                     if (!$result){
                        echo 'Error';
                     }
                  }
               }

               $searchName = "";
               if (isset($_GET['searchInput'])){
                  $searchName = $_GET['searchInput'];
               }

               if ($connectionString->connect_error){
                  echo 'Not connected';
               }
               else{
                  $data = "SELECT * FROM `fruits_1`";
                  if ($result = $connectionString->query($data)){
                     echo '<table class="table" id="prodTable">';
                     echo '<tr>';
                     echo '<td>';
                     echo 'ID';
                     echo '</td>';
                     echo '<td>';
                     echo 'Name';
                     echo '</td>';
                     echo '<td>';
                     echo 'Price';
                     echo '</td>';
                     echo '<td>';
                     echo 'Count';
                     echo '</td>';
                     echo '<td>';
                     echo  'Delete';
                     echo '</td>';
                     echo '</tr>';
                     foreach ($result as $iter){
                        if ($iter["name"] == $searchName){
                           echo '<tr class="_green">';
                        }
                        else{
                           echo '<tr>';
                        }
                        echo '<td>';
                        echo $iter["id"];
                        echo '</td>';
                        echo '<td>';
                        echo $iter["name"];
                        echo '</td>';
                        echo '<td>';
                        echo $iter["price"];
                        echo '</td>';
                        echo '<td>';
                        echo $iter["count"];
                        echo '</td>';
                        echo '<td>';
                        echo "<button type='submit' class='delBtn' name='delButton' value='{$iter["id"]}'>X</button>";
                        echo '</td>';
                        echo '</tr>';
                     }
                     echo '</table>';
                     $result->free();
                  }
                  else{
                     echo 'Not Selected';
                  }
                  $connectionString->close();
               }
               ?>
            </form>
         </div>
      </div>
   </body>
</html>
