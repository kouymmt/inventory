@extends('layout.base')
@section('title','検索結果')
@section('content')

<table border = "1">
<tr>
<th>商品ID</th>
<th>商品コード</th>
<th>tallsecretサイズ</th>
<th>価格(円)</th>
<th>値引き前価格(円)</th>
</tr>
@foreach($result as $row)
<tr>
<td>{{$row->product_id}}</td>
<td>{{$row->ts_id}}</td>
<td>{{$row->ts_size}}</td>
<td>{{$row->ts_normal_price}}</td>
<td>{{$row->ts_base_price}}</td>
</tr>
@endforeach
</table> 

@endsection

