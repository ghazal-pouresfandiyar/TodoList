<?php
  // header("refresh: 1;");
?>
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

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="login.php" style="font-size:16px">Logout</a>
        </li>
        <li class="nav-item" style="float: right;">
          <?php date_default_timezone_set("Asia/Tehran"); ?>
          <a class="nav-link" style="font-size:16px;"><?php echo date('Y-m-d H:i:s') ?></a>
        </li>
      </ul>
    </div>
  </nav>

  

</head>


