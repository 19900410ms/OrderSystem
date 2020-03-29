@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card-columns">
    <div class="card">
      <img class="card-img-top" src="../storage/app/public/meat.jpg" height="220px" width="100%" alt="Meats">
      <div class="card-body">
        <h5 class="card-title">Meats</h5>
        <a href="{{ route('menu.index', ['category' => '1']) }}" class="btn btn-primary">メニューを確認する</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="/storage/app/public/fish.jpg" height="220px" width="100%" alt="Fishes">
      <div class="card-body">
        <h5 class="card-title">Fishes</h5>
        <a href="{{ route('menu.index', ['category' => '2']) }}" class="btn btn-primary">メニューを確認する</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="storage/app/public/salada.jpg" height="220px" width="100%" alt="Saladas">
      <div class="card-body">
        <h5 class="card-title">Salads</h5>
        <a href="{{ route('menu.index', ['category' => '3']) }}" class="btn btn-primary">メニューを確認する</a>
      </div>
    </div>
  </div>
  <div>
  <div class="card-columns">
    <div class="card">
      <img class="card-img-top" src="../storage/drink.jpg" height="220px" width="100%" alt="Drinks">
      <div class="card-body">
        <h5 class="card-title">Drinks</h5>
        <a href="{{ route('menu.index', ['category' => '4']) }}" class="btn btn-primary">メニューを確認する</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="../storage/sweet.jpg" height="220px" width="100%" alt="Sweets">
      <div class="card-body">
      <h5 class="card-title">Sweets</h5>
        <a href="{{ route('menu.index', ['category' => '5']) }}" class="btn btn-primary">メニューを確認する</a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="../storage/other.jpg" height="220px" width="100%" alt="the Others">
      <div class="card-body">
        <h5 class="card-title">the Others</h5>
        <a href="{{ route('menu.index', ['category' => '6']) }}" class="btn btn-primary">メニューを確認する</a>
      </div>
    </div>
  </div>
</div>
@endsection
