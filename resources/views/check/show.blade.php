@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card text-center">
    <div class="card-header">
      お会計金額
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $check->total_price }} 円</h5>
      <p class="card-text">御来店いただき、誠にありがとうございました。</h5>
    </div>
  </div>
</div>

@endsection