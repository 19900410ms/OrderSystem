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
          @if (auth()->user()->is_admin == 1)
            <a href="{{ route('check.show', ['id' => $check->id]) }}" class="card-link">詳細を見る</a>
            <form method="POST" action="{{ route('check.destroy', ['id' => $check->id]) }}" id="delete_{{ $check->id }}">
              @csrf
              <a href="#" class="card-link" data-id="{{ $check->id }}" onclick="deletePost(this);">削除する</a>
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