@extends('layout')

@section('layout')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Tambah Penjualan</h1><br>
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
                
                    <form action="{{ route('sales.store') }}" method="post" class="needs-validation" novalidate>
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
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Masukan Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="customer_name" placeholder="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Masukan nama
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Masukan Alamat<span class="text-danger">*</span></label>
                                    <input type="text" name="address" placeholder="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Masukan alamat
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nomor Telepon<span class="text-danger">*</span></label>
                                    <input type="text" name="no_phone" placeholder="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Masukan alamat
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12"><br>
                                    <label for="product_id">Produk<span class="text-danger">*</span></label>
                                    <select name="product_id" id="product_id" class="form-control" required>
                                        <option disabled selected>Pilih Produk</option>
                                       
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                  
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12"><br>
                                    <label>Total Produk<span class="text-danger">*</span></label>
                                    <input type="number" name="total_product" placeholder="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Masukan Alamat
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12"><br>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/data-user" class="btn btn-secondary">Kembali</a>
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