@extends('layouts.default')
@section('title','Home')
@section('content')

@if(session('message'))
    <div class="alert alert-success" id="success-message">
        {{ session('message') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" id="success-message">
        {{ session('error') }}
    </div>
@endif







<script>
    setTimeout(function() {
        document.querySelector('.alert').style.display = 'none';
    }, 5000);
</script>



@stop
