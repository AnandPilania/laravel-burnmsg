@extends('burnmsg::master')

@section('content')
<div class="alert alert-success">
    Your message has been saved.
    Here is the URL <a href="{{ $url }}" class="byline">{{ $url }}</a>
</div>
@stop
