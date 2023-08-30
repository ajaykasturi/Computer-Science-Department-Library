<?php
if(!defined("APP")){
  header("Location: ../index.php");
  exit();
  } else {
echo '<div class="container">
<div class="px-4 py-5 my-2 text-center">
<svg xmlns="http://www.w3.org/2000/svg" width="57" height="72" fill="#0d6efd" class="bi bi-arrow-up-right-circle-fill" viewBox="0 0 16 16">
<path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8zm5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707l-4.096 4.096z"/>
</svg>
    <h1 class="display-5 fw-bold text-body-emphasis"></h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">
        Classic Computer Science Textbooks, Programming Language References, Data Science and Machine Learning, Computer Science Theory, Web Development Books, Software Engineering and Development Practices, Computer Science History and Biographies and Digital Journals, Magazines, and Online Publications
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a type="button" href="./explore.php?search=true" class="btn btn-primary btn-lg px-4 gap-3">Explore Books</a>
        </div>
    </div>
  </div>
</div>';
}
?>