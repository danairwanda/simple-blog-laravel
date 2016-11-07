<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="../../favicon.ico">
  
  <title>Blog Template for Bootstrap</title>
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
  <!-- IE10 viewport hack for surface/desktop windows 8 bug -->
  <link rel="stylesheet" href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}">
  <!-- custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('/css/blog.css') }}">
  <!-- just for debugging purposes, don't actually copy these 2 lines -->
  <script scr="{{ asset('/js/ie-emulation-modes-warning.js') }}"></script>

</head>
<body>
  
  <div class="blog-masthead"> 
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="/blog">Home</a>
          <a href="#" class="blog-nav-item">New Features</a>
          <a href="#" class="blog-nav-item">Press</a>
          <a href="#" class="blog-nav-item">New Hires</a>
          <a href="#" class="blog-nav-item">About</a>
        </nav>
      </div>
    </div>
    
    <div class="container">
      <div class="blog-header">
        <h1 class="blog-title">My First Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with bootstrap.</p>
      </div>

    <div class="row">
      <div class="col-sm-8 blog-main">
        <div class="blog-spot">
          @yield('content')
        </div>
      </div>
      
      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
          <h4>About Us</h4>
          <p>Hay this is my simple blog, build with laravel and bootstrap <em>that is magic you know</em> Tutorial laravel 5.3</p>
        </div>

        <div class="sidebar-module">
          @yield('sidebar2')
        </div>  
      </div>
    </div>
  </div>

  <footer class="blog-footer">
    <p>Blog template build for <a href="http://getbootstrap.com">Bootstrap</a>by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
      <a href="#">Back to top</a>
    </p>
  </footer>
  
  <script scr="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script scr="{{ asset('/js/jquery.min.js') }}"><\/script>')</script>
  <script scr="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script scr=" {{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>

</body>
</html>