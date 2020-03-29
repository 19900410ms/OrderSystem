<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Order System</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand text-white" href="#">Order System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          @if (auth()->user()->is_admin == 1)
            <li class="nav-item active">
              <a class="nav-link text-white" href="{{ route('admin.home') }}">管理画面</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('check.index') }}">会計一覧</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('order.index') }}">注文一覧</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('menu.create') }}">商品登録</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('order.index') }}">注文履歴</a>
            </li>
          @endif
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('home') }}">カテゴリー選択</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('menu.index') }}">商品一覧</a>
            </li>
          @if (auth()->user()->is_admin == 1)
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('menu.private') }}">非公開メニュー</a>
            </li>
          @endif
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
        </ul>
      </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
  </div>
</body>
</html>
