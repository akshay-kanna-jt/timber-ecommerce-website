<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Timber Factory</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <!-- <div class="image">
            <img src="images/home-img-1.png" alt="">
         </div> -->
         <div class="content">
            <span>About our Timber</span>
            <p>From our 25 acre site located in the heart of rural mangalore,
Santos Timber produces an exciting range of innovative timber products,
since the company was created over 30 years ago</p>
            <!-- <a href="shop.php" class="btn">shop now</a> -->
            <h5>(swipe right to read more)</h5>
         </div>
      </div>

      <div class="swiper-slide slide">
         <!-- <div class="image">
            <img src="images/home-img-2.png" alt="">
         </div> -->
         <div class="content">
            <!-- <span>upto 50% off</span> -->
            <p>Our web-site provides information for a wide variety of timber users,
ranging from joiners, boat builders, shopfitters, cabinetmakers,
architects and specifiers, through to retail customers</p>
            <!-- <a href="shop.php" class="btn">shop now</a> -->
         </div>
      </div>

      <div class="swiper-slide slide">
         <!-- <div class="image">
            <img src="images/home-img-3.png" alt="">
         </div> -->
         <div class="content">
            <!-- <span>upto 50% off</span> -->
            <p>Santos Timber carefully selects from a wide range of quality hardwoods
to customers exact requirements which minimises wastage; we do not
supply in packs</p>
            <!-- <a href="shop.php" class="btn">shop now</a> -->
         </div>
      </div>

      <div class="swiper-slide slide">
         <!-- <div class="image">
            <img src="images/home-img-3.png" alt="">
         </div> -->
         <div class="content">
            <!-- <span>upto 50% off</span> -->
            <p>Flooring anf Furnituring work is also done by us. <br>
         please contact to "The Timber Factory" for beautiful flooring and furnituring designs.</p>
            <!-- <a href="shop.php" class="btn">shop now</a> -->
         </div>
      </div>
   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">shop by category</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=timber" class="swiper-slide slide">
      <img src="images/icons8-wood-100.png" alt="">
      <h3>timber</h3>
   </a>

   <a href="category.php?category=flooring" class="swiper-slide slide">
      <img src="images/wooden-floor.png" alt="">
      <h3>flooring</h3>
   </a>

   <a href="category.php?category=camera" class="swiper-slide slide">
      <img src="images/icon-3.png" alt="">
      <h3>camera</h3>
   </a>

   <a href="category.php?category=mouse" class="swiper-slide slide">
      <img src="images/icon-4.png" alt="">
      <h3>mouse</h3>
   </a>

   <!-- <a href="category.php?category=fridge" class="swiper-slide slide">
      <img src="images/icon-5.png" alt="">
      <h3>fridge</h3>
   </a>

   <a href="category.php?category=washing" class="swiper-slide slide">
      <img src="images/icon-6.png" alt="">
      <h3>washing machine</h3>
   </a> -->

   <a href="category.php?category=smartphone" class="swiper-slide slide">
      <img src="images/icon-7.png" alt="">
      <h3>smartphone</h3>
   </a>

   <a href="category.php?category=watch" class="swiper-slide slide">
      <img src="images/icon-8.png" alt="">
      <h3>watch</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

   <h1 class="heading">latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>


<section class="image_works">
   <h1 class="heading">our works</h1>

   <div class="img_container">
      <img src="images/ff-pic-1.jpg" alt="" class="image">
      <div class="overlay">
         <h2>Solid Wood Flooring</h2>
         <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus distinctio obcaecati aliquid quaerat minus quibusdam.</h3>
      </div>
   </div>
   <div class="img_container">
      <img src="images/ff-pic-1.jpg" alt="" class="image">
      <div class="overlay">
         <h2>Solid Wood Flooring</h2>
         <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus distinctio obcaecati aliquid quaerat minus quibusdam.</h3>
      </div>
   </div>
   <div class="img_container">
      <img src="images/ff-pic-1.jpg" alt="" class="image">
      <div class="overlay">
         <h2>Solid Wood Flooring</h2>
         <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus distinctio obcaecati aliquid quaerat minus quibusdam.</h3>
      </div>
   </div>
   <div class="img_container">
      <img src="images/ff-pic-1.jpg" alt="" class="image">
      <div class="overlay">
         <h2>Solid Wood Flooring</h2>
         <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus distinctio obcaecati aliquid quaerat minus quibusdam.</h3>
      </div>
   </div>

</section>



<h1 class="heading">our works</h1>

<!-- <div class="container">
   <div class="row">
      <div class="col">
         <div class="img-area">
            <img src="images/ff-pic-1.jpg" alt="">
            <div class="img-text">
               <h3>Solid Wood Flooring</h3>
               <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, qui!</h5>
            </div>
         </div>
         <div class="col">
         <div class="img-area">
            <img src="images/ff-pic-2.jpg" alt="">
            <div class="img-text">
               <h3>Solid Wood Flooring</h3>
               <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, qui!</h5>
            </div>
         </div>
         <div class="col">
         <div class="img-area">
            <img src="images/ff-pic-3.jpg" alt="">
            <div class="img-text">
               <h3>Solid Wood Flooring</h3>
               <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, qui!</h5>
            </div>
         </div>
      </div>
   </div>
</div> -->















<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>