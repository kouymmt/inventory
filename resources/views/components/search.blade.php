<style>
input{
    background-color:#c0c0c0;
}
</style>
<div>
{!! Form::open(['route' => 'search', 'method' => 'get']) !!}
{{Form::input('text', 'search')}}
{!! Form::submit('検索') !!}
{!! Form::close() !!}
</div>