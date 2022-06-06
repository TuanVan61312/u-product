@extends('masters.giftshopMaster')

@section('main')
  <div class="container">
    <br>
    <div class="p-2 pt-md-5 pb-md-3 mx-auto ">
      <h1 class="display-4">New Gifts</h1>
    </div>
    @include('partials.errors')

    <form action="{{route('product.store')}}" method="post" enctype= "multipart/form-data">
      @csrf
      @include('giftshop.gifts.proFields')
      <button type="submit" class="btn btn-dark">Submit</button>
    </form>
  </div>
@endsection
