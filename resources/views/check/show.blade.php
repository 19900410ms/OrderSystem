@extends('layouts.check')

@section('content')

<div class="container">
  <div class="card text-center">
    <div class="card-header">
      お会計金額
    </div>
    <div class="card-body">
      <h5 class="card-title">¥ {{ $check->total_price }}</h5>
      @if (Auth()->user()->is_admin !== 1)
        <p class="card-text margin-top-16">御来店いただき、誠にありがとうございました。</h5>
      @else
        @if ($check->status === 1)
          <a href="{{ route('check.index') }}" class="card-link">精算済み</a>
        @else
          <form enctype="multipart/form-data" method="POST" action="{{ route('check.update', ['id' => $check->id, 'status' => '1']) }}">
            @csrf
            <button type="submit" class="btn margin-0 btn-primary">精算する</button>
          </form>
        @endif
      @endif
    </div>
  </div>
</div>

@endsection