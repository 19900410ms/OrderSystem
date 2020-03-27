@extends('layouts.check')

@section('content')

<div class="container">
  <div class="card text-center">
    <div class="card-header">
      お会計金額
    </div>
    <div class="card-body">
      <h5 class="card-title margin-0">¥ {{ $check->total_price }}</h5>
      @if (Auth()->user()->is_admin !== 1)
        <p class="card-text margin-top-16">御来店いただき、誠にありがとうございました。</h5>
      @endif
    </div>
  </div>
</div>

@endsection