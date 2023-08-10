<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"/>
	<title>Book Catalog</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  <div class="container-fluid">
  <li class= "logo"> <img src="Ebook.png" style="max-width:30%;height:auto;background-color:#E77A02;"></li>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link mx-2" style="font-size: 20px; font-weight: ; margin-left: 2rem; aria-current="page" href="ViewBooks.php">Back</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 active" style="font-size: 20px; font-weight: ; margin-left: 2rem; aria-current="page" href="vaddbook2.php">ADD New Books</a> 
        </li>
      </ul>
    </div>
  </div>
  </nav>
<script src="https://kit.fontawesome.com/29640a57a1.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>
<body>
	<section class="gallery-block cards-gallery">
		 <div class="container">
		 	<div class="heading">
          		<img src="Ebook.png" />
          		<h2 style="font-size:55px;font-family:times new roman;">LIST OF AVAILABLE BOOKS</h2>
        	</div>
        	<div class="row" style="border:solid;padding:50px;background-color:orange;">
        		<div class="col-md-6 col-lg-4">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" style="border:solid;">
                <img
                  src="samplebook.png"
                  alt="Card Image"
                  class="card-img-top"
                />
              </a>
              <div class="card-body"style="border:solid;">
                <h6><a href="#">(NAME OF THE BOOK)</a></h6>
                <p class="text-muted card-text">GENRE</p>
                <a href="bookinfo.php"class="btn btn-success">View for more Information</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" style="border:solid;">
                <img
                  src="samplebook.png"
                  alt="Card Image"
                  class="card-img-top"
                />
              </a>
              <div class="card-body" style="border:solid;">
                <h6><a href="#">(NAME OF THE BOOK)</a></h6>
                <p class="text-muted card-text">GENRE</p>
                <a href="bookinfo.php" class="btn btn-success">View for more Information</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" style="border:solid;">
                <img
                  src="samplebook.png"
                  alt="Card Image"
                  class="card-img-top"
                />
              </a>
              <div class="card-body" style="border:solid;">
               <h6><a href="#">(NAME OF THE BOOK)</a></h6>
                <p class="text-muted card-text">GENRE</p>
                <a href="bookinfo.php" class="btn btn-success">View for more Information</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" style="border:solid;">
                <img
                  src="samplebook.png"
                  alt="Card Image"
                  class="card-img-top"
                />
              </a>
              <div class="card-body" style="border:solid;">
                <h6><a href="#">(NAME OF THE BOOK)</a></h6>
                <p class="text-muted card-text">GENRE</p>
                <a href="bookinfo.php" class="btn btn-success">View for more Information</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox"style="border:solid;">
                <img
                  src="samplebook.png"
                  alt="Card Image"
                  class="card-img-top"
                />
              </a>
              <div class="card-body"style="border:solid;">
                <h6><a href="#">(NAME OF THE BOOK)</a></h6>
                <p class="text-muted card-text">GENRE</p>
                <a href="bookinfo.php" class="btn btn-success">View for more Information</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox"style="border:solid;">
                <img
                  src="samplebook.png"
                  alt="Card Image"
                  class="card-img-top"
                />
              </a>
              <div class="card-body"style="border:solid;">
                <h6><a href="#">(NAME OF THE BOOK)</a></h6>
                <p class="text-muted card-text">GENRE</p>
                <a href="bookinfo.php" class="btn btn-success">View for more Information</a>
              </div>
            </div>
          </div>
        	</div>
		 </div>
	</section>

  <!----------------------------------------------------------->
   <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
    </a>
    
    <script>
        const toTop = document.querySelector(".to-top");

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                toTop.classList.add("active");
            } else {
                toTop.classList.remove("active");
            }
        })
    </script>

</body>
<style>
.gallery-block {
  padding-bottom: 60px;
  padding-top: 60px;
}

.gallery-block .heading {
  margin-bottom: 50px;
  text-align: center;
}

.gallery-block .heading h2 {
  font-weight: bold;
  font-size: 1.4rem;
  text-transform: uppercase;
}

.gallery-block.cards-gallery h6 {
  font-size: 17px;
  font-weight: bold;
}

.gallery-block.cards-gallery .card {
  transition: 0.4s ease;
}

.gallery-block.cards-gallery .card img {
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
}

.gallery-block.cards-gallery .card-body {
  text-align: center;
}

.gallery-block.cards-gallery .card-body p {
  font-size: 15px;
}

.gallery-block.cards-gallery a {
  color: #212529;
}

.gallery-block.cards-gallery a:hover {
  text-decoration: none;
}

.gallery-block.cards-gallery .card {
  margin-bottom: 30px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
}

img,svg {
  width: 30%;
  height: auto;
}

.to-top {
        background: white;
        position: fixed;
        bottom: 16px;
        right: 32px;
        width: 50px;
        height: 50px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: #1f1f1f;
        text-decoration: none;
        opacity: 0;
        pointer-events: none;
        transition: all .4s; 
    }

    .to-top.active {
        bottom: 32px;
        pointer-events: auto;
        opacity: 1;
    }
    
    html {
        scroll-behavior: smooth;
    }

</style>
</html>