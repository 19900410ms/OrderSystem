@extends('layouts.app')

@section('content')
<div class="container">
  <div>
    <div class="card-group">
      <div class="card">
        <img class="card-img-top" src="../storage/meat.jpg" height="180px" width="100%" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Meats</h5>
          <a href="#" class="btn btn-primary">メニューを確認する</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="../storage/fish.jpg" height="180px" width="100%" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Fishes</h5>
          <a href="#" class="btn btn-primary">メニューを確認する</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="../storage/salada.jpg" height="180px" width="100%" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Salads</h5>
          <a href="#" class="btn btn-primary">メニューを確認する</a>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="card-group">
      <div class="card">
        <img class="card-img-top" src="../storage/drink.jpg" height="180px" width="100%" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Drinks</h5>
          <a href="#" class="btn btn-primary">メニューを確認する</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="../storage/sweet.jpg" height="180px" width="100%" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Sweets</h5>
          <a href="#" class="btn btn-primary">メニューを確認する</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="../storage/other.jpg" height="180px" width="100%" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">the Others</h5>
          <a href="#" class="btn btn-primary">メニューを確認する</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
