@extends('layouts.app')

@section('content')

<div class="menu-create">
  <form method="POST" action="{{ route('menus.store') }}">
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
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">登録する</button>
  </form>
</div>

@endsection