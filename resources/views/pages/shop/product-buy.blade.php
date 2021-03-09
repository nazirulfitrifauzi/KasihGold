@extends('default.default')
@section('content')
    <div class="hidden">{{$iid=app('request')->input('iid')}}</div>
    <livewire:page.shop.product-buy :iid="$iid"/>
    
@endsection