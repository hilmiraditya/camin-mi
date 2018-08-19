<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="gambar/gps.png">
<link rel="stylesheet" type="text/css" href="{{url('css/hp/app.css')}}">
</head>
<body>

    <!- HEADER ->
<div class="header">

    <div>
  <h3> TC FAST FOOD</h3>
  <p>Fast Delivery Order for TC Family</p></div>
  <br>
</div>

<div id="navbar">
  <a  href="TC FAST FOOD.html"> &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp   </a>
  <a class="garis-muncul-hilang " href="TC FAST FOOD.html">TC - FASTFOOD</a>
  <a class="garis-masuk-keluar" href="{{url('register')}}" style="float: right;">REGISTER</a>
  <a class="garis-masuk-keluar" href="1.html" style="float: right;">ORDER</a>
</div>
<!- Gambar Tulisan ->
<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px">TAKE AND ORDER YOUR FAVORITE FOOD TO TC WITH TC-FASTFOOD</h1>
    <p>ORDER NOW</p>
    <a href="{{url('login')}}" style="width:auto;">CLICK</a>
  </div>
</div>
<!- Kotak Tulisan ->
<br><br><br>
<h1 style="text-align: center;color: #363a45">WHY TC-FASTFOOD?</h1>
<div class="content" style="font-family: sans-serif;">
<b>EKONOMIS,EFEKTIF, DAN EFISIEN</b>
  <img src="gambar/centang.png" width="100x" style="float: left;"><br><p style="font-size: 20px">
Tidak perlu khawatir saat kelaparan melanda, TC Food  menyediakan makanan dan minuman sesuai dengan kantong mahasiswa secara higienis. 
</p>



</div>
<div class="content" style="font-family: sans-serif;">
  <b>DIANTAR DENGAN CEPAT </b>
  <img src="gambar/timer.png" width="100px" style="float: left"><br>
<p style="font-size: 20px"> TC Food telah hadir sebagai pemadam kelaparan karena makanan dan minuman akan diantar dengan cepat tanpa menunggu lama.<br>
  </p>
  


</div>
<div class="content" style="font-family: sans-serif;">
  <img src="gambar/caya.png" width="100px" style="float: left;">
  <b>LAYANAN TERPERCAYA</b><br>
 <p style="font-size: 20px">Tidak perlu khawatir, makanan dan minuman yang telah dipesan diantar oleh mahasiswa TC sebagai kurir, tetap terjaga kualitasnya.</p>


</div>
<div><br></div>

<! KOTAK BIRU>

<div class="content4"><br>
  <h1 style="text-align: center;color: #5dadf7">HOW IT WORKS</h1>
 <img src="gambar/hapee.png" width="600px" style="float: left;position: absolute;z-index: 1;">
<div class="timeline">
  <div class="container1 right">
    <div class="content6">
      <h2>Log in atau buat akun</h2>
      <p>klik log in bagi kamu yang sudah memiliki akun. Bagi yang belum memiliki akun, klik register untuk mendaftarkan diri dengan mengisi data yang sesuai.</p>
    </div>
  </div>
  <div class="container1 right">
    <div class="content6">
      <h2>Pilih restoranmu</h2>
      <p>Pilihan restoran disesuaikan berdasarkan lokasi terdekat dari kamu sehingga makanan dapat diantar dengan cepat.</p>
    </div>
  </div>

<div class="content4"><br> 
  <div class="container1 right">
    <div class="content6">
      <h2>Dapatkan kurirmu</h2>
      <p>Tc Food akan mengalokasikan kurir sesuai dengan restoran.</p>
      <br>
      <br>
    </div>
    <br>
    <br>
  </div>
  <div class="container1 right">
    <div class="content6">
      <h2>Lacak makananmu</h2>
      <p>
 ketahui lokasi kurirmu dan estimasi waktu kedatangan pesanananmu.</p>
      <br>
      <br>
    </div>
    <br>
    <br>
  </div>
 
</div>
</div>




















<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

/*Slidesow
<!- Buat Slideshow>

<div class="slideshow-container">

<div class="mySlides" style="background-color: white">
  <q> </q>
  <p class="author">- John Keats</p>
</div>

<div class="mySlides">
  <q> </q>
  <p class="author">- Ernest Hemingway</p>
</div>

<div class="mySlides">
  <q>I have not failed. I've just found 10,000 ways that won't work.</q>
  <p class="author">- Thomas A. Edison</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}*/
</script>
</body>
</html>
