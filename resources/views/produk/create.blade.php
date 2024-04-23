@extends('layout')

@section('layout')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Create Product</h1><br>
    </div><!-- End Page Title -->
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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class=" col-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                
                    <form action="{{ route("post.product") }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                                    <div class="form-group col-md-6 col-12">
                                        <label>Product Name<span class="text-danger">*</span></label>
                                        <input type="text" name="product_name" placeholder="" class="form-control" required>
                                        <div class="invalid-feedback">
                                           Masukan produk
                                        </div>
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
                                    <input type="number" name="price" placeholder="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Masukan harga
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Stock<span class="text-danger">*</span></label>
                                    <input type="number" name="stock" placeholder="" class="form-control" required value="">
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

  </main>

@endsection