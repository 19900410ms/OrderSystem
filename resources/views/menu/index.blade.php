@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card-columns">
    @foreach($menus as $menu)
      @if ($menu->is_public != 1)
        <div class="card">
          <img class="card-img-top" src="{{ asset($menu->image) }}" height="220px" width="100%" alt="{{ $menu->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $menu->name }}</h5>
            <p class="card-text">¥ {{ $menu->price }}</p>
            @if (auth()->user()->is_admin == 1)
              <a href="{{ route('menu.edit', ['id' => $menu->id]) }}" class="card-link">編集ページ</a>
              <form method="POST" action="{{ route('menu.closed', ['id' => $menu->id]) }}" id="closed_{{ $menu->id }}" class="margin-top-16">
                @csrf
                <a href="#" class="card-link" data-id="{{ $menu->id }}" onclick="closedPost(this);">非公開にする</a>
              </form>
            @else
              <a href="{{ route('menu.show', ['id' => $menu->id]) }}" class="card-link">注文する</a>
            @endif
          </div>
        </div>
      @endif
    @endforeach
  </div>
</div>

@endsection

<script>
function closedPost(e) {
  'use strict';
  if (confirm('非公開にしてもいいですか？')) {
    document.getElementById('closed_' + e.dataset.id).submit();
  }
}
</script>