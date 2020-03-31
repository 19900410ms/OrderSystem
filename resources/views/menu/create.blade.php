@extends('layouts.app')

@section('content')

<div class="container">
  @if($errors->any())
    <div class="alert alert-primary">
      <ul>
        @foreach($errors->all() as $message)
          <li>{{ $message }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form enctype="multipart/form-data" method="POST" action="{{ route('menu.store') }}">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">料理名</label>
      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="料理名を入力してください" value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">画像</label>
      <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">料金</label>
      <input name="price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="金額を入力してください" value="{{ old('price') }}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">カテゴリー</label>
      <select name="category" class="form-control" id="exampleFormControlSelect1">
        <option value="1" selected @if(old('category')=='1') selected  @endif>肉料理</option>
        <option value="2" @if(old('category')=='2') selected  @endif>魚料理</option>
        <option value="3" @if(old('category')=='3') selected  @endif>サラダ</option>
        <option value="4" @if(old('category')=='4') selected  @endif>ドリンク</option>
        <option value="5" @if(old('category')=='5') selected  @endif>デザート</option>
        <option value="6" @if(old('category')=='6') selected  @endif>その他</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">登録する</button>
  </form>
</div>

@endsection