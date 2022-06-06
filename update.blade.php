@extends('masters.giftshopMaster')

@section('main')
  <div class="container">
    <div class="p-2 pt-md-5 pb-md-3 mx-auto">
      <h1 class="text-center">EDIT PRODUCT</h1>
      @include('partials.errors')
      <form action="{{route('product.update', ['Gifts_id' => $product->Gifts_id])}}" method="post">
        @csrf
        @include('giftshop.gifts.proFields')
        <button type="submit" class="btn btn-dark">Submit</button>
        <a type="button" class="btn btn-danger" href="{{route('product.index')}}">Back</a>
      </form>
    </div>
  </div>
@endsection
