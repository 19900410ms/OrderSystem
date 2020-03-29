<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>403 Forbidden</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="error-wrap">
    <div class="container">
      <div class="alert margin-top-16 alert-light" role="alert">
        <h3 class="alert-heading">403 Forbidden</h3>
        <p>You do not have access.</p>
        <p>Please return to the menu screen from the link below.</p>
        <hr>
        <a href="{{ route('menu.index') }}" class="card-link">Return to menu screen.</a>
      </div>
    </div>
  </div>
</body>
</html>