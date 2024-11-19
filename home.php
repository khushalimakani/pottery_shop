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
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">
  <div class="slideshow-container">
    <div class="slideshow">
      <div class="slide">
        <div class="background-image" style="background-image: url('images/bg2.jpg');"></div>
        <div class="content">
          <span>Handcrafted with Love</span>
          <h3>Earthly Delights</h3>
          <p>Explore our collection of unique, handmade pottery pieces, each crafted with precision and passion.</p>
          <a href="product.php" class="btn">View Our Collection</a>
        </div>
      </div>
      <div class="slide">
        <div class="background-image" style="background-image: url('images/bg1.jpg');"></div>
        <div class="content">
          <span>Sculpting Emotions</span>
          <h3>Pottery that Touches the Heart</h3>
          <p>The result is pottery that whispers secrets, shares laughter, and comforts the soul.</p>
          <a href="product.php" class="btn">View Our Collection</a>
        </div>
      </div>
      <div class="slide">
        <div class="background-image" style="background-image: url('images/bg3.jpg');"></div>
        <div class="content">
          <span>Unleash Your Creativity</span>
          <h3>Pottery for All</h3>
          <p>From beginners to seasoned potters, our shop offers a wide range of pottery pieces and supplies to inspire your next creative project.</p>
          <a href="product.php" class="btn">View Our Collection</a>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="category">

   <h1 class="title">category</h1>

   <div class="box-container">

      <a href="category.php?category=matlu" class="box">
         <img src="images/cat-1.png" alt="">
         <h3>matlu</h3>
      </a>

      <a href="category.php?category=dishes" class="box">
         <img src="images/cat-2.png" alt="">
         <h3>dishes</h3>
      </a>

      <a href="category.php?category=mugs" class="box">
         <img src="images/cat-3.png" alt="">
         <h3>mugs</h3>
      </a>

      <a href="category.php?category=other products" class="box">
         <img src="images/cat-4.png" alt="">
         <h3>other products</h3>
      </a>

   </div>

</section>

<section class="products">

   <h1 class="title">latest Product</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY `added_on` DESC LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
         

         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rs.</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
         <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="product.php" class="btn">veiw all</a>
   </div>

</section>



<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- <script>

const slideshow = document.querySelector('.slideshow');
const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function nextSlide() {
  slides[currentSlide].classList.remove('active');
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].classList.add('active');
}

setInterval(nextSlide, 5000); // change slide every 5 seconds
</script> -->
<script>
    let currentSlide = 0; 
    const slides = document.querySelectorAll('.slide'); 
    const totalSlides = slides.length; 
    const slideInterval = 5000; // Time in milliseconds (5000ms = 5 seconds) 

    function showSlide(index) { 
        slides.forEach((slide, i) => { 
            slide.classList.remove('active'); 
            if (i === index) { 
                slide.classList.add('active'); 
            } 
        }); 
    } 

    function nextSlide() { 
        currentSlide = (currentSlide + 1) % totalSlides; // Loop back to the first slide 
        showSlide(currentSlide); 
    } 

    showSlide(currentSlide); // Initial call to show the first slide 
    setInterval(nextSlide, slideInterval); // Set interval for the slideshow 
</script>

</body>
</html>