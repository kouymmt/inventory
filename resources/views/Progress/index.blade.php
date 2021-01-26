@extends('layout.base')
@section('title','tallsecret current status')
@section('content')
<table table border="1" width="70%" >
<br>
データ取得完了ページ：<span style="font-weight:bold;font-size:20px">{{ $ch_data_num->num }}</span>
</table> 
{{-- $price_check->links() --}}
@endsection

