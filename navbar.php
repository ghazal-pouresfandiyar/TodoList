<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <style>
    body {
      background-color: #fbfbfb;
    }
    @media (min-width: 991.98px) {
      main {
        padding-left: 240px;
      }
    }

  </style>
  
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!-- Sidebar -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('i a').click(function(){
        $('i a').removeClass("active");
        $(this).addClass("active");
      });
    });
  </script>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php" style="font-size:16px">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php" style="font-size:16px">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php" style="font-size:16px">My list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="done_list.php" style="font-size:16px">Done list</a>
        </li>

      </ul>
    </div>
  </nav>

</head>


