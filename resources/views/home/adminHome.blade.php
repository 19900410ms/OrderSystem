@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">今月の売り上げ</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <?php
            $sales_amount = 0;
            foreach ($checks as $check) {
                $sales_amount += $check->total_price;
            }
          ?>
          ¥ {{ $sales_amount }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection