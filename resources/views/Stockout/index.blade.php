@extends('layout.base')
@section('title','tallsecret current status')
@section('content')
<table border = "1">
<tr>
在庫不足  
<th>商品コード</th>
<th>tallsecretサイズ</th>
<th>何金昌リンク</th>
<th>再スクレイプ</th>

</tr>
@foreach($stockout as $row)
<tr>
  <td>{{ $row->ts_id }}</td>
  <td>{{ $row->ts_size }}</td>
  <td><a href = "{{ $row->ch_url }}" target="_blank" rel="noopener">何金昌</a></td>
  <td><a href="{{ action('ReScrapeController@index',$row->num) }}">取得</a></td>
     
  </tr>
@endforeach
</table> 
{{ $stockout->links() }}
@endsection

