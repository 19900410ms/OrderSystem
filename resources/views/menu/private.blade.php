@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card-columns">
    @foreach($menus as $menu)
      <div class="card">
        <img class="card-img-top" src="{{ asset($menu->image) }}" height="220px" width="100%" alt="{{ $menu->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $menu->name }}</h5>
          <p class="card-text">¥ {{ $menu->price }}</p>
          <form method="POST" action="{{ route('menu.open', ['id' => $menu->id]) }}" id="open_{{ $menu->id }}" class="margin-top-16">
            @csrf
            <a href="#" class="card-link" data-id="{{ $menu->id }}" onclick="openPost(this);">公開にする</a>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection

<script>
function openPost(e) {
  'use strict';
  if (confirm('公開にしてもいいですか？')) {
    document.getElementById('open_' + e.dataset.id).submit();
  }
}
</script>