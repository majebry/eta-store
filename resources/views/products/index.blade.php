@extends('layouts.app')

@section('title')
Products List
@endsection

@section('content')


        @if (! $myProducts->count())
          <div class="alert alert-warning">
            <p>No Products</p>
          </div>
        @endif

 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


        @foreach ($myProducts as $item)

        <div class="col">
          <div class="card shadow-sm">
            {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
            
            @if ($item->image)
              <img class="bd-placeholder-img card-img-top" src="{{ url($item->image) }}">
            @endif

            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">{{ $item->category ? $item->category->name : 'Not Categorized' }}</p>
              <p class="card-text">{{ $item->description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ url('show-product/' . $item->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>

                  @auth

                  <form action="{{ url('products/' . $item->id ) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                  </form>

                  @endauth
                </div>
                <small class="text-body-secondary">{{ $item->price }} LYD</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach
        
        
      </div>

@endsection