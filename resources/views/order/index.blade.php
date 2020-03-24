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
      <?php
      $total = $order->menu->price * $order->count
      ?>
      @if (auth()->user()->is_admin == 1)
      <div class="card w-50">
        <div class="card-body">
          <h5 class="card-title">{{ $order->menu->name }}</h5>
          <p class="card-text">{{ $order->menu->price }} yen × {{ $order->count }}</p>
          <h5 class="card-title">{{ $total }} yen</h5>
          @if (auth()->user()->is_admin == 1)
            <form method="POST" action="{{ route('order.destroy', ['id' => $order->id]) }}" id="delete_{{ $order->id }}">
              @csrf
              <a href="#" class="card-link" data-id="{{ $order->id }}" onclick="deletePost(this);">削除する</a>
            </form>
          @endif
        </div>
      </div>
      @else
        @if (auth()->user()->is_admin != 1 && $order->table_number == auth()->user()->table_number)
          <div class="card w-50">
            <div class="card-body">
              <h5 class="card-title">{{ $order->menu->name }}</h5>
              <p class="card-text">{{ $order->menu->price }} yen × {{ $order->count }}</p>
              <h5 class="card-title">{{ $total }} yen</h5>
            </div>
          </div>
        @endif
      @endif
    @endforeach
  </div>

  @if (auth()->user()->is_admin != 1)
    <div class="card text-center">
      <div class="card-header">
        Total Price
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $total_price }}</h5>
        <a href="#" class="btn btn-primary">お会計へ</a>
      </div>
    </div>
  @endif
</div>

@endsection

<script>
function deletePost(e) {
  'use strict';
  if (confirm('本当に削除してもいいですか？')) {
    document.getElementById('delete_' + e.dataset.id).submit();
  }
}
</script>