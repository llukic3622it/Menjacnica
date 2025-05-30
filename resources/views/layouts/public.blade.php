<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield("title")</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


@include("partials.nav")

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        @yield("sidebar")
      </div>
      <div class="col-sm-9">
        @yield("content")
      </div>

    </div>
</div>








</body>
</html>
