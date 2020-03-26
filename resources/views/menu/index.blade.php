@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card-columns">
    @foreach($menus as $menu)
      <div class="card">
        <img class="card-img-top" src="{{ asset($menu->image) }}" height="220px" width="100%" alt="{{ $menu->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $menu->name }}</h5>
          <p class="card-text">{{ $menu->price }} yen</p>
          <a href="{{ route('menu.show', ['id' => $menu->id]) }}" class="card-link">注文する</a>
          @if (auth()->user()->is_admin == 1)
            <a href="{{ route('menu.edit', ['id' => $menu->id]) }}" class="card-link">編集ページ</a>
            <form method="POST" action="{{ route('menu.destroy', ['id' => $menu->id]) }}" id="delete_{{ $menu->id }}">
              @csrf
              <a href="#" class="card-link" data-id="{{ $menu->id }}" onclick="deletePost(this);">削除する</a>
            </form>
          @endif
        </div>
      </div>
    @endforeach
  </div>
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