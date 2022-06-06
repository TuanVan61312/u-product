<dl class="row">
  <dt class="col-sm-3">ID</dt>
  <dd class="col-sm-9">{{ $product->Gifts_id }}</dd>

  <dt class="col-sm-3">Name</dt>
  <dd class="col-sm-9">{{ $product->Gifts_Name }}</dd>

  <dt class="col-sm-3">Category</dt>
  <dd class="col-sm-9">{{ $category->Cate_Name }}</dd>

  <dt class="col-sm-3">Price</dt>
  <dd class="col-sm-9">{{ $product->Price }}</dd>

  <dt class="col-sm-3">Brand</dt>
  <dd class="col-sm-9">{{ $product->Brand }}</dd>

  <dt class="col-sm-3">Description</dt>
  <dd class="col-sm-9">{{ $product->Gifts_Description }}</dd>

  <dt class="col-sm-3">Image</dt>
  <dd class="col-sm-9"><img width = 500rem; src="{{asset('storage/'.$product->Gifts_Images )}}" /></dd>
</dl>
