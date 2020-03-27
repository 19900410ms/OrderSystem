@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters margin-0">
      <div class="col-md-4">
        <img class="card-img-top" src="{{ asset($menu->image) }}" height="220px" width="100%" alt="{{ $menu->name }}">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $menu->name }}</h5>
          <p class="card-text">¥ {{ $menu->price }}</p>
          <form enctype="multipart/form-data" method="POST" action="{{ route('order.store', ['menu_id' => $menu->id]) }}">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlSelect1">ご注文の数を選択してください</label>
              <select name="count" class="form-control" id="exampleFormControlSelect1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">注文する</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection