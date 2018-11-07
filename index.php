<?php require_once ("includes/SQLiteUpdates.php");
    $gallery = __DIR__.'/photos/resources/cache/';
    $arrayGallery = array_slice(scandir($gallery), 2);
    $updates = fetchOffsetUpdates(20, 0);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FASS</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<!-- Bootstrap  -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- icon fonts font Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Import Magnific Pop Up Styles -->
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  
  <!-- Google Maps Script -->
  <script src="https://maps.google.com/maps/api/js?sensor=true"></script>

	<!-- Import Custom Styles -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- Import Animate Styles -->
	<link href="assets/css/animate.min.css" rel="stylesheet">

	<!-- Import owl.carousel Styles -->
	<link href="assets/css/owl.carousel.css" rel="stylesheet">

	<!-- Import Custom Responsive Styles -->
	<link href="assets/css/responsive.css" rel="stylesheet">

	
	<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  		<![endif]-->

  	</head>
  	<body class="header-fixed-top">
      <?php require_once("templates/header.html");?>

  <section id="main-slider" class="main-slider carousel slide" data-ride="carousel">

   <!-- Wrapper for slides -->
   <div class="carousel-inner" role="listbox">
    <div class="item item-1 active">
      <img src="/fass/images/splashes/school.jpg">    
      <div class="carousel-caption">
        <div class="slider-icon">
       </div><!-- /.slider-icon -->
       <h3 class="carousel-title"> First Form <span> Registration</span></h3>
     </div><!-- /.carousel-caption -->
   </div>

   <div class="item item-2">
    <img src="/fass/images/splashes/storm.jpg">
    <div class="carousel-caption">   
      <h3 class="carousel-title"> School <span>Booklists<span></h3>
    </div><!-- /.carousel-caption -->
  </div>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
  <i class="fa fa-angle-left"></i>
</a>
<a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
  <i class="fa fa-angle-right"></i>
</a>

</section><!-- /#main-slider -->


<section id="latest-post" class="services">
  <div class="post-area-top text-center">
    <h2 class="post-area-title">Latest News and Updates</h2>
    <p class="title-description">  </p>
  </div><!-- /.post-area-top -->
  <div class="container">
    
      
    <div class="service-area">

     <div class="row">
      <div class="service-items">
              <div class="col-sm-6">
                <h2> <?=$updates[0]->title?> </h2>
                <p class="item-description">
                  <?=$updates[0]->content?>
                </p><!-- /.item-description -->
        </div>
        <div class="col-sm-6">
          <div>
            <div class="row">
              <h2> <?=$updates[1]->title?> </h2>
                <p class="item-description">
                  <?=$updates[1]->content?>
                </p><!-- /.item-description -->
            </div><!-- /.row -->
          </div><!-- /.item -->
        </div><!-- /.service-accordion -->
      </div>
    </div><!-- /.service-items -->
  </div><!-- /.row -->
</div><!-- /.service-area -->
</div><!-- /.container -->
</section><!-- /#services -->


<section id="portfolio" class="portfolio text-center">
 <div class="container">
  <div class="portfolio-area">
    <div class="portfolio-top">
      <h2 class="portfolio-title">Photos</h2>
      <p class="title-description"></p>
      <div class="slide-nav-container">
        <a class="slide-nav left slide-left post-prev" data-slide="post-prev"><i class="fa fa-angle-left"></i></a>
        <a class="slide-nav right slide-right post-next" data-slide="post-next"><i class="fa fa-angle-right"></i></a>
      </div>
    </div><!-- /.portfolio-top -->

    <div id="portfolio-slider" class="portfolio-slider owl-carousel owl-theme">

      <?php foreach ($arrayGallery as $src) : ?>
      <div class="item">
        <div class="item-image">
          <img src="/fass/photos/resources/cache/<?=$src?>" alt="Portfolio Image">
        </div>
        <span class="item-title"></span>
      </div>
      <?php endforeach?>

    </div>
  </div><!-- /.portfolio-area -->
</div><!-- /.container -->
</section><!-- /#portfolio -->




<section id="services" class="services">
  <div class="container">
    <iframe class="google-calendar" src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;mode=WEEK&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=en.tt%23holiday%40group.v.calendar.google.com&amp;color=%2329527A&amp;ctz=America%2FPort_of_Spain" style="border-width:0" width="800" height="600px" frameborder="0" scrolling="no"></iframe>
</div><!-- /.calendar-container -->
</section><!-- /#services --> 




<!-- Subscribe Section -->
<section id="subscribe-section" class="subscribe-section text-center">
  <div class="container">
    <form class="news-letter" method="post">
      <p class="alert-success"></p>
      <p class="alert-warning"></p>

      <div class="subscribe-hide">
        <div class="subscribe-error"></div>
      </div><!-- /.subscribe-hide -->
      <div class="subscribe-message"></div>
    </form><!-- /.news-letter -->
  </div><!-- /.container -->
</section><!-- /#subscribe-section -->
<!-- Subscribe Section End --> 




<section id="contact" class="contact">
  <div class="contact-area">
    <!-- Google Map Section -->
    <div id="google-map" class="google-map">
      <div class="map-container">
        <div id="googleMaps" class="google-map-container">
        </div>
      </div><!-- /.map-container -->
    </div><!-- /#google-map-->
    <!-- Google Map Section End -->
      
        <div id="message-details" class="message-details">
      <div class="container">
        <form action="email.php" method="post" id="myForm" class="message-form">
          <div class="row">
            <div class="col-sm-6">
              <input id="author" class="form-control" name="name" type="text" value="" size="30" aria-required="true" placeholder="Name*" title="Name" required>
              <input id="email" class="form-control" name="email" type="email" value="" size="30" aria-required="true" placeholder="Email*" title="Email"  required>
              <input id="subject" class="form-control" name="subject" type="subject" value="" size="30" aria-required="true" placeholder="Subject*" title="Subject"  required>
            </div>
            <div class="col-sm-6">
              <textarea id="message" class="form-control" name="message" cols="45" rows="3" aria-required="true" placeholder="Message" title="Message"  required></textarea>
              <button name="submit" class="btn btn-lg full-width" type="submit" id="submit">Submit</button>
            </div>
          </div><!-- /.row -->
        </form><!-- /#commentform -->
      </div><!-- /.container -->
    </div><!-- /.message-details -->
  </div><!-- /.contact-area -->
</section><!-- /#contact -->




<section id="about" class="about">
 <div class="container">
  <div class="about-area">
   <div class="title-area text-center">
    <h2 class="about-title">About The School</h2>
    <p class="title-description">Fyzabad Anglican Secondary</p>
  </div><!-- /.title-area -->
  <div class="about-items">
    <div class="col-sm-4">
     <div class="item">
      <div class="item-top">
       <h3 class="item-title">A History</h3>
       <h4 class="sub-title">Culture & Service</h4>
     </div><!-- /.item-top -->
     <p class="item-description">
       Fyzabad Anglican Secondary (formerly Fyzabad Intermediate) was founded as a primary school in 1941 by Rev. Harold M. Telemarque and Mrs. Waldron to cater to the needs of the children of the Apex Oil Company of Fyzabad. As "Inter", our motto was "Culture & Service" which is still carried on the school's monogram.
     </p>
   <a class="btn" href="about.html#history">
       <span class="btn-icon"><i class="fa fa-arrow-circle-right"></i></span>
       More
     </a>
   </div><!-- /.item -->
 </div>
 <div class="col-sm-4">
   <div class="item">
    <div class="item-top">
     <h3 class="item-title">Today</h3>
     <h4 class="sub-title">The Community Institution</h4>
   </div><!-- /.item-top -->
   <p class="item-description">
     Today, Fyzabad Anglican Secondary is a seven year school offerring classes from Form One to Six. Presently we have a student population of about 600 with over 50 teachers and staff. Subjects range from the sciences, languages, social sciences, business and the visual and performing arts.
   </p>
   <a class="btn" href="about.html#history">
     <span class="btn-icon"><i class="fa fa-arrow-circle-right"></i></span>
     More
   </a>
 </div><!-- /.item -->
</div>
<div class="col-sm-4">
 <div class="item">
  <div class="item-top">
   <h3 class="item-title">Our pledge</h3>
   <h4 class="sub-title">A Scholarly Vow</h4>
 </div><!-- /.item-top -->
 <p class="item-description">
   "I shall endevour to do well here, that I shall be remembered for my diligence, courtesy and devotion to my duty and I shall have my school the better for my being in it."
 </p>
 <a class="btn" href="about.html#school-pledge">
   <span class="btn-icon"><i class="fa fa-arrow-circle-right"></i></span>
   More
 </a>
</div><!-- /.item -->
</div>
</div><!-- /.about-items -->
</div><!-- /.about-area -->
</div><!-- /.container -->
</section><!-- /#about -->




<?php include_once("templates/footer.html");?>



<div id="scroll-to-top" class="scroll-to-top">
  <span>
    <i class="fa fa-chevron-up"></i>    
  </span>
</div><!-- /#scroll-to-top -->



<!-- Include modernizr-2.8.3.min.js -->
<script src="assets/js/modernizr-2.8.3.min.js"></script>

<!-- Include jquery.min.js plugin -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Include magnific-popup.min.js -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!-- Gmap3.js For Static Maps -->
<script src="assets/js/gmap3.js"></script>

<!-- Javascript Plugins  -->
<script src="assets/js/plugins.js"></script>

<!-- Custom Functions  -->
<script src="assets/js/functions.js"></script>

<script src="assets/js/wow.min.js"></script>

<script type="text/javascript" src="assets/js/jquery.ajaxchimp.min.js"></script>




<script>

 $(document).ready(function() {

  /* -------- One page Navigation ----------*/
  $('#main-menu #menu').onePageNav({
    currentClass: 'active',
    changeHash: false,
    scrollSpeed: 1500,
    scrollThreshold: 0.5,
    scrollOffset: 95,
    filter: ':not(.sub-menu a, .not-in-home)',
    easing: 'swing'
  }); 


  /*----------- Google Map - with support of gmaps.js ----------------*/

  function isMobile() { 
   return ('ontouchstart' in document.documentElement);
 }

 function init_gmap() {
   if ( typeof google == 'undefined' ) return;
   var options = {
    center: [10.1753878, -61.5488224],
    zoom: 15,
    mapTypeControl: true,
    mapTypeControlOptions: {
     style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
   },
   navigationControl: true,
   scrollwheel: false,
   streetViewControl: true
 }

 if (isMobile()) {
  options.draggable = false;
}

$('#googleMaps').gmap3({
  map: {
   options: options
 },
 marker: {
   latLng: [10.1753878, -61.5488224],
   options: { icon: 'images/mapicon.png' }
 }
});
}

init_gmap();
});



</script>

</body>
</html>

