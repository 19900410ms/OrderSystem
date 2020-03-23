@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card-columns">
    @foreach($menus as $menu)
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset($menu->image) }}" height="220px" width="100%" alt="{{ $menu->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $menu->name }}</h5>
          <p class="card-text">{{ $menu->price }} yen</p>
          <a href="{{ route('menu.show', ['id' => $menu->id]) }}" class="card-link">詳細ページ</a>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection