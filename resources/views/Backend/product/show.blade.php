@extends('layouts.app')
@section('title')
 {{$product->name}}
@endsection
@section('content')
{!! html_entity_decode($product->description) !!}
@endsection
@section('script')
@endsection
