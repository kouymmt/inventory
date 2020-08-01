<style>
input{
    background-color:#fff;
    margin:5px;
    border-style: solid;


}
</style>
<div>
{!! Form::open(['route' => 'register', 'method' => 'post']) !!}
{{Form::input('text', 'register')}}
{!! Form::submit('登録') !!}
{!! Form::close() !!}
</div>
