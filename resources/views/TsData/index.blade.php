@extends('layout.base')
@section('title','tallsecret current status')
@section('content')
<div id = "app">
<scroll-component></scroll-component>
</div>
<!-- <table border = "1">
<tr>
<th>商品ID</th>
<th>商品コード</th>
<th>サイズ</th>
<th>通常価格</th>
<th>割引価格</th>
<th>在庫フラグ</th>
</tr>
@foreach($stocks as $row)
<tr>
  <td>{{ $row->product_id }}</td>
  <td>{{ $row->ts_id }}</td>
  <td>{{ $row->ts_size }}</td>
  <td>{{ $row->ts_base_price }}</td>
  <td>{{ $row->ts_normal_price }}</td>
  <td>{{ $row->ts_inventory }}</td>
  </tr>
@endforeach
</table> 
{{ $stocks->links() }}
@endsection -->

