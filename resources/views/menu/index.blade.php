@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card-columns">
    @foreach($menus as $menu)
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="../storage/salada.jpg" height="220px" width="100%" alt="{{ $menu->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $menu->name }}</h5>
          <p class="card-text">{{ $menu->price }} yen</p>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection