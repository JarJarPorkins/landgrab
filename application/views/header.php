<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <!-- For Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">

    <!-- Page Title -->
    <title>Landgrab</title>

    <!-- Google please read this -->
    <meta name="description" content="Landgrab.xyz is a massive multiplayer online nation building game built using Google Maps">

    <!-- Link to Favicon -->
    <link rel="icon" href="<?=base_url()?>resources/icon.ico">

    <!-- Bootstrap -->
    <link href="<?=base_url()?>resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery DataTables -->
    <link href="<?=base_url()?>resources/datatables/datatables.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?=base_url()?>resources/jquery/jquery-1.11.1.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="<?=base_url()?>resources/bootstrap/js/bootstrap.min.js"></script>

    <!-- jQuery DataTables -->
    <script src="<?=base_url()?>resources/datatables/datatables.min.js"></script>

    <!-- JSColor -->
    <script src="<?=base_url()?>resources/jscolor/jscolor.min.js"></script>

    <!-- Custom Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Cookie" rel="stylesheet">

    <!-- Define as share image -->
    <link rel="image_src" href="<?=base_url()?>resources/logos/hero.jpg" / >
    <meta property='og:image' content='<?=base_url()?>resources/logos/hero.jpg'/>

  <!-- Local Style -->
  <link href="<?=base_url()?>resources/style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">

  </head>
  <body>
  <!-- Facebook like code -->
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '523758294469574',
        xfbml      : true,
        version    : 'v2.5'
      });
    };

   (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=523758294469574";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
   </script>

  <div class="top_left_block">
    <!-- <div class="fb-like" data-href="https://landgrab.xyz/" data-layout="button" data-action="recommend" data-show-faces="false" data-share="true"></div> -->
  </div>

  <!-- Image for crawlers -->
  <h1 style="display: none;">Landgrab - Google Maps Web Game</h1>
  <h2 style="display: none;">
    <img id="crawler_image" src="<?=base_url()?>resources/logos/hero.jpg" alt="Landgrab"/>
  </h2>

  <!-- Map Element -->
  <div id="map"></div>