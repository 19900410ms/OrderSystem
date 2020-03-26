@extends('layouts.app')

@section('content')

<div class="container">
<div class="card-columns">
  @foreach($checks as $check)
    <div class="card">
      <div class="card-header">{{ $check->user->table_number }}</div>
      <div class="card-body">
        <h5 class="card-title">{{ $check->total_price }}</h5>
        <p class="card-text">{{ $check->created_at }}</p>
      </div>
    </div>
  @endforeach
</div>
</div>

@endsection