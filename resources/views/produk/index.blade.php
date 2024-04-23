@extends('layout')

@section('layout')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Produk</h1><br>
    </div>
    @if (Session::get('notAllowed'))
				<div class="alert alert-danger" style="text-align: center">
					{{ Session::get('notAllowed') }}
				</div>
			@endif
      @if (Session::get('berhasil'))
				<div class="alert alert-success" style="text-align: center">
					{{ Session::get('berhasil') }}
				</div>
			@endif
      @if (Session::get('success'))
				<div class="alert alert-success" style="text-align: center">
					{{ Session::get('success') }}
				</div>
			@endif
      @if (Session::get('mantap'))
      <div class="alert alert-success" style="text-align: center">
        {{ Session::get('mantap') }}
      </div>
    @endif
      @if (Session::get('sukses'))
				<div class="alert alert-success" style="text-align: center">
					{{ Session::get('sukses') }}
				</div>
			@endif

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <div class=" col-12">
              <div class="card info-card sales-card">

                <div class=" col-12">
                  <div class="card info-card sales-card">
                    <form action="{{ route('product.list') }}" method="GET" class="p-3">
                      <input type="text" name="keyword" placeholder="Search...">
                      <button type="submit">Search</button>

                <div class="card-body">
                    @if(Auth::user()->role=='administrator')
                      <div class="input-group-btn">
                          <br><a href="/list-product/create" class="btn btn-primary"><i class="fas fa-plus"></i>
                              Create Product</a>
                      </div>
                      @endif

                    <div class="card-body p-0">
                        <div class="table-responsive"><br>
                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stock</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{ asset('storage/images/'. $product->product_img) }}"width="100px" alt=""></td>
                                    <td>{{$product->product_name}}</td>
                                    <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>

                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Update Stock</button>
                                      
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Stock Product</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form method="POST" action="{{ route('stock.update', $product->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <div class="modal-body">
                                                  <div class="form-group">
                                                    <label>Nama Produk<span class="text-danger">*</span></label>
                                                    <input type="text" name="product_name" placeholder="{{$product->product_name}}" class="form-control" disabled required value="{{ $product->product_name }}">
                                                    <div class="invalid-feedback">
                                                        Masukan nama produk
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Stock<span class="text-danger">*</span></label>
                                                    <input type="number" name="stock" placeholder="{{$product->stock}}" class="form-control" required value="{{ $product->stock }}">
                                                    <div class="invalid-feedback">
                                                        Masukan stock
                                                    </div>
                                                  </div>

                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                  <button class="btn btn-primary">Update</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                    
                                    </td>
                                    <td>
                                      {{-- delete --}}
                                      <form method="post" action="{{ route('product.delete', $product->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" onclick="buttonConfirm()">Delete</button>                  
                                      </form>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </table>
                        </div>
                    </div>
                </div>

              </div>
            </div>


      </div>
    </section>

  </main>
  @endsection