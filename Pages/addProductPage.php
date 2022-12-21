<html>
<head>
   <title>Test</title>
   <link href="../css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="container">
   <div class="database__container _flex">
      <form class="database__container" method='post'>
         <input class="SearchInput" type="text" placeholder="Name" name="add_name" class="input__style">
         <input class="SearchInput" type="number" placeholder="Price" name="add_price" class="input__style">
         <input class="SearchInput" type="number" placeholder="Count" name="add_count" class="input__style">
         <div class="addProduct _flex">
            <button type="submit" id="button_add" class="addBtn">add product</button>
         </div>
      </form>
   </div>
   <div class="database__container _flex">
      <form action='index.php'>
         <a  type='submit' href="../index.php" class="backBtn">back</a>
      </form>
   </div>

   <?php
   if (isset($_POST['add_name']) && isset($_POST['add_price']) && isset($_POST['add_count'])){
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo "error";
      }
      else{

         $name = $_POST['add_name'];
         $price = $_POST['add_price'];
         $count = $_POST['add_count'];

         $data = 'INSERT INTO `fruits_1`(`name`, `price`, `count`) VALUES ("'.$name.'" , "'.$price.'", "'.$count.'")';
         if($connectionString->query($data)){
            echo "<p>Data added!</p>";
         }
         else{
            echo "<p>Data not added!</p>";
         }
         $connectionString->close();
      }
   }


   ?>
</div>
</body>
</html>