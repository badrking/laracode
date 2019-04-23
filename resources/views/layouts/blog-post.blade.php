<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <!-- Navigation -->

  </nav>
  <nav class=" navbar  navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="#">Laracode</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Categories<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</div>
</nav>

  <!-- Page Content -->
  <div class="container">

      <div class="row">

          <!-- Blog Post Content Column -->
          <div class="col-lg-8">

    @yield('content')
    <!-- End Nested Comment -->
  </div>
  </div>

  </div>

  <!-- Blog Sidebar Widgets Column -->
  <div class="col-md-4">

  <!-- Blog Search Well -->
  <div class="well">
  <h4>Blog Search</h4>
  <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
          <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
      </button>
      </span>
  </div>
  <!-- /.input-group -->
  </div>

  <!-- Blog Categories Well -->
  <div class="well">
  <h4>CMS Categories</h4>
  <div class="row">
      <div class="col-lg-6">
          <ul class="list-unstyled">
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
          </ul>
      </div>
      <div class="col-lg-6">
          <ul class="list-unstyled">
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
          </ul>
      </div>
  </div>
  <!-- /.row -->
  </div>

  <!-- Side Widget Well -->
        <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

  </div>

  </div>
  <!-- /.row -->

  <hr>

  <!-- Footer -->
  <footer>
  <div class="row">
        <div class="col-lg-12">

        </div>
  </div>
  <!-- /.row -->
  </footer>

  </div>
  <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>
    @yield('scripts')

</body>

</html>
