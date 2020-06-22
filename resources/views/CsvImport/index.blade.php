@extends('layout.base')
@section('title','csv import')
@section('content')

{{ Form::open(['url' => route('CsvImport'), 'method' => 'POST', 'class' => '', 'files' => true]) }}

  <div class='form-group'>
  <input type="file" name="file" value="">
  </div>

  <button type="submit">csv読み込み</button>

  {{ Form::close() }}
  @endsection