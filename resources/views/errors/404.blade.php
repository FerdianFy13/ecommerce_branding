<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>{{is_null(setting('site.title'))?'': setting('site.title').'-'}}404</title>

  <link rel="shortcut icon" type="image" href="{{is_null(setting('site.logo'))?'': Storage::url(setting('site.logo'))}}">
        
  <!-- Fontawesome -->
  <link type="text/css" href="/frontend/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Nucleo icons -->
  <link rel="stylesheet" href="/frontend/dashboard/assets/vendor/nucleo/css/nucleo.css" type="text/css">

  <!-- Prism -->
  <link type="text/css" href="/frontend/vendor/prismjs/themes/prism.css" rel="stylesheet">

  <!-- Front CSS -->
  <link type="text/css" href="/frontend/css/front.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link type="text/css" href="/frontend/css/custom.css" rel="stylesheet">

</head>

<body>

<!-- 404 Section Begin -->
<section class="section-header bg-primary text-white error-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-2 mb-3 title">404</h1>
                <h3>Opps! This page Could Not Be Found!</h3>
                <p>Sorry but the page you are looking for does not exist, have been removed or name changed</p>
                
                <a href="/" class="btn btn-lg btn-secondary">Go Home</a>   
            </div>
        </div>
    </div>
</section>
<!-- 404 Section End --> 
  
</body>

</html>
