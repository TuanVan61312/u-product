@extends('masters.giftshopMaster')

@section('main')


  <div class="container">
    <br>
    <div class="p-2 pt-md-5 pb-md-3 mx-auto">
      <h1 class="display-4">Gifts Details</h1>
    </div>
    @include('giftshop.gifts.detail')
    <a type="button" href="{{route('product.index')}}" class="btn btn-info">&lt;&lt;&nbsp;Back</a>
  </div>
@endsection
