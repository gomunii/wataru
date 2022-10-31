<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @yield('styles')
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

  <style>
    img {
      max-width:150px;
    }
    body {
      background-color: #FFC778;
    }
    h2 {
    font-family: 'ヒラギノ明朝 Pro W3', 'Hiragino Mincho Pro', 'Hiragino Mincho ProN', 'HGS明朝E', 'ＭＳ Ｐ明朝', serif;
    padding: 1rem 2rem;
    color: #fff;
    background: #000;
    }

    h2 span {
    background-image: -webkit-linear-gradient(315deg, #b8751e 0%, #ffce08 37%, #fefeb2 47%, #fafad6 50%, #fefeb2 53%, #e1ce08 63%, #b8751e 100%);
    background-image: linear-gradient(135deg, #b8751e 0%, #ffce08 37%, #fefeb2 47%, #fafad6 50%, #fefeb2 53%, #e1ce08 63%, #b8751e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    }

    table{
    width: 100%;
    border-collapse:separate;
    border-spacing: 0;
  }

  table th:first-child{
    border-radius: 5px 0 0 0;
  }

  table th:last-child{
    border-radius: 0 5px 0 0;
    border-right: 1px solid #3c6690;
  }

  table th{
    text-align: center;
    color:white;
    background: linear-gradient(#829ebc,#225588);
    border-left: 1px solid #3c6690;
    border-top: 1px solid #3c6690;
    border-bottom: 1px solid #3c6690;
    box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
    width: 25%;
    padding: 10px 0;
  }

  table td{
    text-align: center;
    border-left: 1px solid #a8b7c5;
    border-bottom: 1px solid #a8b7c5;
    border-top:none;
    box-shadow: 0px -3px 5px 1px #eee inset;
    width: 25%;
    padding: 10px 0;
  }

  table td:last-child{
    border-right: 1px solid #a8b7c5;
  }

  table tr:last-child td:first-child {
    border-radius: 0 0 0 5px;
  }

  table tr:last-child td:last-child {
    border-radius: 0 0 5px 0;
  }
  </style>


  <header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
    <div class="my-navbar-control">
      @if(Auth::check())
        <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
        ｜
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
      @endif
    </div>
  </nav>
</header>
<main>
  @yield('content')
</main>
@yield('scripts')
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
</body>
</html>
