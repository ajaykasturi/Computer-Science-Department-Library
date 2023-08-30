<?php 
if(!defined("APP")){
    header("Location: ../index.php");
  exit();
  } else {
echo '<div class="container">
        <div>
            <h2 class="fs-2 fw-bold text-body-emphasis text-center my-5">
                <span class="badge text-bg-dark rounded-pill position-relative">
                    Top Books
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-transparent">
                        <img src="./assets/new.gif" style="height:32px">
                    </span>
                </span>
            </h2>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">';

$query = "SELECT * FROM `books_db` ORDER BY dt LIMIT 8";
$result = mysqli_query($conn, $query);
$numrows = mysqli_num_rows($result);
if($numrows>0){
    while($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col">
                    <a href="viewbook.php?bid=book'.$row['book_id'].'" class="text-decoration-none">
                    <div class="card card1 h-100">
                    <img src="./assets/bookcover/'.$row["book_id"].'.jpg" class="card-img-top" alt="..." height="200px">
                    <div class="card-body">
                        <p class="card-title"><strong>Title: '.$row["book_title"].'</strong></p>
                        <p class="card-text"><b>Description:</b> <em>'.substr($row["book_desc"],0,65).'...</em></p>
                        <p class="card-text"><b>Authors:</b> <em>'.$row["book_author"].'</em></p>
                    </div>
                    </div>
                    </a>
            </div>';
    }
}
echo '</div> 
</div>';
  }
?>