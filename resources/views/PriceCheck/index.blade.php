@extends('layout.base')
@section('title','tallsecret current status')
@section('content')
<table table border="1" width="70%" >
<tr>
  価格確認
  <th>商品コード         </th>
  <th>何金昌 価格        </th>
  <th>tallsecret価格    </th>
  <th>何金昌 割引価格    </th>
  <th>tallsecret割引価格</th>
  <th>何金昌リンク       </th>
</tr>
@foreach($price_diff as $row)
<tr> 
@if($row->ch_base_price != $row->ts_base_price || $row->ch_price != $row->ts_normal_price)
<td>{{ $row->ch_id }}</td>
<td>{{ $row->ch_base_price}}</td>
<td>{{ $row->ts_base_price}}</td>
<td>{{ $row->ch_price}}</td>
<td>{{ $row->ts_normal_price}}</td>  
<td><a href = "{{ $row->ch_url }}" target="_blank" rel="noopener">何金昌</a></td>
 @endif
  </tr>
@endforeach
</table> 
{{-- $price_check->links() --}}
@endsection

