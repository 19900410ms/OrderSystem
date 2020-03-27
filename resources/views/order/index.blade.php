@extends('layouts.app')

@section('content')

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">料理</th>
        <th scope="col">注文数 × 単価</th>
        <th scope="col">合計金額</th>
        @if (auth()->user()->is_admin == 1)
          <th scope="col"></th>
          <th scope="col">受注時間</th>
        @endif
      </tr>
    </thead>
    @if (auth()->user()->is_admin == 1)
      @foreach($orders as $order)
        <?php
            $total = $order->menu->price * $order->count
        ?>
        <tbody>
          <tr>
            <td>{{ $order->user->table_number }}</td>
            <td>{{ $order->menu->name }}</td>
            <td>{{ $order->count }} × {{ $order->menu->price }} yen</td>
            <td>¥ {{ $total }}</td>
            <td>
              <form method="POST" action="{{ route('order.destroy', ['id' => $order->id]) }}" id="delete_{{ $order->id }}" class="margin-0">
                @csrf
                <a href="#" class="card-link" data-id="{{ $order->id }}" onclick="deletePost(this);">削除する</a>
              </form>
            </td>
            <td>{{ $order->created_at }}</td>
          </tr>
        </tbody>
      @endforeach
    @else
      @foreach($orders as $order)
        @if (auth()->user()->is_admin != 1 && $order->user->table_number == auth()->user()->table_number)
          <?php
              $total = $order->menu->price * $order->count
          ?>
          <tbody>
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->menu->name }}</td>
              <td>{{ $order->count }} × ¥ {{ $order->menu->price }}</td>
              <td>¥ {{ $total }}</td>
            </tr>
          </tbody>
        @endif
      @endforeach
    @endif
  </table>
  
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
      <form enctype="multipart/form-data" method="POST" action="{{ route('check.store', ['total_price' => $total_price]) }}">
        @csrf
        <div class="card-body">
          <h5 class="card-title">¥ {{ $total_price }}</h5>
          <button type="submit" class="btn btn-primary">お会計へ</button>
        </div>
      </form>
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