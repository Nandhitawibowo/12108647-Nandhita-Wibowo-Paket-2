@extends('layout')

@section('layout')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Edit Product</h1><br>
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

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <div class=" col-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                
                    <form action="{{ route('product.update', $products->id) }}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                        @method('PATCH')
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Product Name<span class="text-danger">*</span></label>
                                    <input type="text" name="product_name" placeholder="{{ $products->product_name }}" class="form-control" required value="{{ $products->product_name }}">
                                    <div class="invalid-feedback">
                                        Masukan nama produk
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Picture Product<span class="text-danger">*</span></label>
                                    <input type="file" name="product_img" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Masukan harga
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Price<span class="text-danger">*</span></label>
                                    <input type="number" name="price" class="form-control" required value="{{ $products->price }}">
                                    <div class="invalid-feedback">
                                        Masukan harga
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Stock<span class="text-danger">*</span></label>
                                    <input type="number" name="stock" placeholder="{{ $products->stock }}" class="form-control" disabled required value="{{ $products->stock }}">
                                    <div class="invalid-feedback">
                                        Masukan stock
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12"><br>
                                    <button class="btn btn-primary">Simpan</button>
                                    <a href="/list-product" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>

              </div>
            </div>


      </div>
    </section>
    <script>
        $(document).ready(function() {
            $('input[name="price"]').attr('placeholder', '{{ $products->price }}');
        });
    </script>
  </main>

@endsection