@extends('layout')

@section('title')
Products List
@endsection

@section('content')

<form method="POST" action="/store-product">
@csrf

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>

    <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" class="form-control" name="price">
  </div>

      <div class="mb-3">
    <label class="form-label">Description</label>

    <textarea class="form-control" name="description"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
