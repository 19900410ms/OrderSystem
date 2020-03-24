@extends('layouts.app')

@section('content')

<div class="container">
  index
  @foreach($orders as $order)
    {{ $order->count }}
    {{ $order->menu->name }}
  @endforeach
</div>

@endsection