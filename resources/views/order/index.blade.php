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
          <p class="card-text">{{ $order->created_at }}</p>
          @if (auth()->user()->is_admin == 1)
          <p class="card-text">Table No. {{ $order->user->table_number }}</p>
            <form method="POST" action="{{ route('order.destroy', ['id' => $order->id]) }}" id="delete_{{ $order->id }}">
              @csrf
              <a href="#" class="card-link" data-id="{{ $order->id }}" onclick="deletePost(this);">削除する</a>
            </form>
          @endif
        </div>
      </div>
      @else
        @if (auth()->user()->is_admin != 1 && $order->user->table_number == auth()->user()->table_number)
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
    <?php
      $total_price = 0;
      foreach ($orders as $order) {
        if (auth()->user()->id == $order->user_id) {
          $single_price = $order->menu->price * $order->count;
          $total_price += $single_price;
        }
      }
      // return $total_price;
    ?>
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