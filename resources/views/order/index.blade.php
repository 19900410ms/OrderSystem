<?php
  $total_price = 0;
  foreach ($orders as $order) {
    $single_price = $order->menu->price * $order->count;
    $total_price += $single_price;
  }
?>
@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    @foreach($orders as $order)
      <?php $total = $order->menu->price * $order->count ?>
      <div class="card w-50">
        <div class="card-body">
          <h5 class="card-title">{{ $order->menu->name }}</h5>
          <p class="card-text">{{ $order->menu->price }} yen × {{ $order->count }}</p>
          <h5 class="card-title">{{ $total }} yen</h5>
        </div>
      </div>
    @endforeach
  </div>

  <div class="card text-center">
    <div class="card-header">
      Total Price
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $total_price }}</h5>
      <a href="#" class="btn btn-primary">お会計へ</a>
    </div>
  </div>  
</div>

@endsection