@extends('layouts.app')

@section('content')

<div class="container">
  <form method="POST" action="{{ route('menu.store') }}">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">料理名</label>
      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="料理名を入力してください">
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">サムネイル画像</label>
      <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">料金</label>
      <input name="price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="金額を入力してください">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">カテゴリー</label>
      <select name="category" class="form-control" id="exampleFormControlSelect1">
        <option value="1">肉料理</option>
        <option value="2">魚料理</option>
        <option value="3">サラダ</option>
        <option value="4">ドリンク</option>
        <option value="5">デザート</option>
        <option value="6">その他</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">登録する</button>
  </form>
</div>

@endsection