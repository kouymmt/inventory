@extends('layout.base')
@section('title','tallsecret current status')
@section('content')
<table border = "1">
@component('components.exclude')@endcomponent
<tr>
<th>商品コード</th>
{{-- <th>画像url</th> --}}
<th>何金昌url</th>
</tr>
@foreach($newItem as $row)
<tr>
  <td>&nbsp {{ $row->ch_id }} &nbsp</td>
 {{-- <td>&nbsp curl -O {{ $row->img_url}}&nbsp</td>　--}}
  <td><a href = "{{ $row->ch_url }}" target="_blank" rel="noopener">何金昌</a></td>
  </tr>
@endforeach
</table>
{{ $newItem->links() }}
@endsection

