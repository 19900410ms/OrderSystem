@extends('layouts.app')

@section('content')

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Table No.</th>
        <th scope="col">金額</th>
        <th scope="col">精算画面</th>
        <th scope="col">精算状況</th>
        <th scope="col">精算時刻</th>
      </tr>
    </thead>
    <tbody>
      @foreach($checks as $check)
        <tr>
          <td>{{ $check->user->table_number }}</td>
          <td>¥ {{ $check->total_price }}</td>
          <td><a href="{{ route('check.show', ['id' => $check->id]) }}" class="card-link">詳細を見る</a></td>
          <td>
            @if ($check->status === 1)
              精算済み
            @else
              <form method="POST" action="{{ route('check.destroy', ['id' => $check->id]) }}" id="delete_{{ $check->id }}" class="margin-0">
                @csrf
                <a href="#" class="card-link" data-id="{{ $check->id }}" onclick="deletePost(this);">削除する</a>
              </form></td>
            @endif
          <td>{{ $check->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
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