
<?php
if(!defined("APP")){
  header("Location: ../index.php");
  exit();
} else {
echo '
<div class="container-fluid">
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
  <div class="carousel-item active" data-bs-interval="3000">
    <img src="./assets/book1.jpg" class="d-block w-100" alt="..." style="height:50%;">
    <div class="carousel-caption d-none d-md-block">
        <a class="btn btn-primary" href="https://www.rgukt.ac.in/">RGUKT-Basar</a>
    </div>
  </div>
  <div class="carousel-item" data-bs-interval="3000">
    <img src="./assets/book2.jpg" class="d-block w-100" alt="..." style="height:50%;">
    <div class="carousel-caption d-none d-md-block">
        <a class="btn btn-primary">CSE Department Library</a>
    </div>
  </div>
  <!--
  <div class="carousel-item" data-bs-interval="3000">
    <img src="./assets/book3.jpg" class="d-block w-100" alt="..." style="height:50%;">
  </div>
  -->
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
</div>
</div>';
}
?>