<!-- connect file -->
<?php
include('includes/connect.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website using PHP and MySQL</title>
  <link rel="stylesheet" href="style.css">

  <!-- boot strapt CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<body>

  <!-- navbar -->
  <div class="container-fluid">


    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid p-0">
        <a class="navbar-brand" href="#">GTD market</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i> <sup>1</sup> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price:100/-</a>
            </li>


            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
      </div>
    </nav>

    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>




      </ul>
    </nav>


    <!-- fhird child -->

    <div class="bg-light">
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">Communication is at the heart of e-commerce and community</p>
    </div>


    <!-- fourth child -->

    <div class="row">
      <div class="col-md-10">

        <!-- Products -->
        <div class="row px-1">
          <!-- fetching products -->
          <?php

          $select_query = "Select * from `products` order by rand() LIMIT 0,3";
          $result_query = mysqli_query($con, $select_query);
          // $row = mysqli_fetch_assoc($result_query);
          // echo $row['product_title'];
          while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' 
                    class='card-img-top' alt'$product_title'>
                      <div class'card-body'>
                        <h5 class'card-title'>$product_title</h5>
                          <p class'card-tex'>$product_description</p>
                            <a href'#' class'btn btn-info'>Add to cart</a>
                            <a href'#' class'btn btn-secondary'>Vie more</a>
                        </div>
                      </div>
                    </div>
";
          }
          ?>




        </div>
        <!-- row end -->
      </div>
      <!-- col end -->

      <!-- Sidenav -->
      <div class="col-md-2 bg-secondary p-0">
        <!-- Brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light">
              <h4>Delivery Brands</h4>
            </a>
          </li>

          <?php
          $select_brands = "SELECT * FROM `brands`";
          $result_brands = mysqli_query($con, $select_brands);
          // $row_data = mysqli_fetch_assoc($result_brands);
          // echo $row_data['brand_title'];
          // echo $row_data['brand_title'];
          while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo " <li class='nav-item'><a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>"; //чтобы не выдавал ошибки - меняем ("") на ('')         
          }
          ?>


        </ul>

        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light">
              <h4>Categories</h4>
            </a>
          </li>

          <?php
          $select_categories = "SELECT * FROM `categories`";
          $result_categories = mysqli_query($con, $select_categories);
          // $row_data = mysqli_fetch_assoc($result_brands);
          // echo $row_data['brand_title'];
          // echo $row_data['brand_title'];
          while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo " <li class='nav-item'><a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>"; //чтобы не выдавал ошибки - меняем ("") на ('')        
          }
          ?>




        </ul>

        <!-- categories to be displayed -->




      </div>

    </div>
  </div>



  <!-- last child -->
  <div class="bg-info p-3 text-center">
    <p>All rights reserved - © Template by Artem Galkin. Все права защищены-2022</p>
  </div>


  <!-- boot strapt JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>