@extends('layout.base')
@section('title','setting')
@section('content')
   @if(session('message'))
   <div>{{ session('message') }}</div>
   @endif
   <div>
   {{ Form::open(['route' => 'setting_data']) }}
        <ul>
        <li><div class="form-inline">
        <label for="start_page">start page　　:</label>
        
        <input type="text"  name="start_page"value = "65">
        </div>

        <li><div class="form-inline">
        <label for="end_page">end page　　:</label>
        <input type="text"  name="end_page" value = "2800">
        </div>

        <li><div class="form-inline">
        <label for="second_min">スクレイピング最小間隔　　:</label>
        <input type="number"  name="second_min" value = "9">
        </div>
        
        <li><div class="form-inline">
        <label for="second_max">スクレイピング最大間隔　　:</label>
        <input type="number"  name="second_max" size="2" value = "110">
        </div>
        
        <li><div class="form-inline">
        <label for="start_delay">開始遅延時間  :</label>
        <input type="number"  name="start_delay" size="2" value = "0" >
        </div>
        
        <li><div class="form-inline">
        <label for="truncate_flg">db初期化  :</label>
        <input type="hidden"  name="truncate_flg" value= 0>
        <input type="checkbox"  name="truncate_flg" size="2" value= 1>
        </div>
           
        <div><input type="submit" value="登録"></div>
        <br>
        <button type="button"><a href="{{ route('scraping') }}">Start!</a></button>
        <button type="button"><a href="{{ route('restart') }}">未実行処理を消去</a></button>
</ul>
    {{ Form::close() }}
   </div>
   @if(!empty($set_in_db))
   <table>
      <tr><th>start_page :</th><td>{{ $set_in_db['start_page']}}</td></tr>
      <tr><th>end page :</th><td>{{ $set_in_db['end_page']}}</td></tr>
      <tr><th>スクレイピング最小間隔 :</th><td>{{ $set_in_db['second_min']}}</td></tr>
      <tr><th>スクレイピング最大間隔　:</th><td>{{ $set_in_db['second_max']}}</td></tr>
      <tr><th>開始遅延時間 :</th><td>{{ $set_in_db['start_delay']}}</td></tr>
   </table>
      @endif
   </div>
   <iframe src=http://chstock.com:6688/#{%221611526999765%22:[%22queue_worker|laravel_queue%22]} width="700" height="200" ></iframe>
  
  @endsection