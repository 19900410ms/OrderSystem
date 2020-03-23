@extends('layouts.app')

@section('content')

<div class="container">
  <form method="POST" action="{{ route('menu.update', ['id' => $menu->id]) }}">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">料理名</label>
      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $menu->name }}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">サムネイル画像</label>
      <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" value="{{ $menu->image }}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">料金</label>
      <input name="price" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $menu->price }}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">カテゴリー</label>
      <select name="category" class="form-control" id="exampleFormControlSelect1">
        <option value="1" @if($menu->category === 1) selected @endif>肉料理</option>
        <option value="2" @if($menu->category === 2) selected @endif>魚料理</option>
        <option value="3" @if($menu->category === 3) selected @endif>サラダ</option>
        <option value="4" @if($menu->category === 4) selected @endif>ドリンク</option>
        <option value="5" @if($menu->category === 5) selected @endif>デザート</option>
        <option value="5" @if($menu->category === 6) selected @endif>その他</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">変更する</button>
  </form>
</div>

@endsection