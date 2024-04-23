@extends('layout')

@section('layout')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Penjualan</h1><br>
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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class=" col-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <div class="form-group d-flex justify-content-between align-items-center">
                    <div style="margin-top: 20px;">
                        <a href="#" class="btn btn-success">Export Data Penjualan (.xlsx)</a>
                    </div>
                    {{-- @if(Auth::user()->role=='petugas') --}}
                    <div style="margin-top: 20px;">
                        <a href="/sales-data/add" class="btn btn-secondary">New transaction</a>
                    </div>
                    {{-- @endif --}}
                </div>

                    <div class="card-body p-0">
                        <div class="table-responsive"><br>
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Total Harga</th>
                                    <th>Dilayani</th>
                                    <th></th>
                                    <th></th>
                                    {{-- @if(Auth::user()->role=='petugas') --}}
                                    <th></th>
                                    {{-- @endif --}}
                                </tr>
                                @foreach ($penjualans as $penjualan)
                                    <tr>
                                        <td>{{ $penjualan->id }}</td>
                                        <td>{{ $penjualan->pelanggan->customer_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($penjualan['sale_date'])->format('l, j F Y') }}</td>
                                        <td>Rp. {{ $penjualan->total_price }}</td>
                                        <td><span class="badge badge-primary">Kasir</span></td>
                                        <td>
                                          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>

                                          <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                                              </div>
                                                <div class="modal-body">
                                                  
                                                 <div class="row">
                                                  <div class="form-group">
                                                    <table class="table table-striped">
                                                      <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Alamat Pelangan</th>
                                                        <th>Nomor Telepon</th>
                                                      </tr>
                                                      <tr>
                                                        <td>{{ $penjualan->pelanggan->customer_name }}</td>
                                                        <td>{{ $penjualan->pelanggan->address }}</td>
                                                        <td>{{ $penjualan->pelanggan->no_phone }}</td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="form-group">
                                                      <table class="table table-striped">
                                                        <tr>
                                                          <th>Nama Produk</th>
                                                          <th>Qty</th>
                                                          <th>Harga</th>
                                                          <th>Total Harga</th>
                                                        </tr>
                                                        @foreach ($penjualan->detailPenjualan as $detail)
                                                            <tr>
                                                                <td>{{ $detail->product->product_name }}</td>
                                                                <td>{{ $detail->total_product }}</td>
                                                                <td>{{ $detail->product->price }}</td>
                                                                <td>{{ $detail->subtotal }}</td>
                                                            </tr>
                                                        @endforeach
                                                      </table>
                                                    </div>
                                                    </div>

                                                    <div class="row">
                                                      <center>
                                                        History Date : {{ \Carbon\Carbon::parse($penjualan['sale_date'])->format('l, j F Y') }}  <br> Oleh : Kasir
                                                    </center>
                                                    </div>
                                                

                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        </td>
                                        <td><button class="btn btn-warning" onclick="buttonConfirm()">Download History</button></td>

                                        {{-- @if(Auth::user()->role=='petugas') --}}
                                        <td>
                                          <form method="post" action="{{ route('sales.delete', $penjualan->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="buttonConfirm()">Delete</button>                  
                                          </form>
                                        </td>
                                        {{-- @endif --}}
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

  </main><!-- End #main -->

  @endsection

@section('scripts')
    <script>
        function addProductInput() {
            var productInputs = document.getElementById('productInputs');
            var newProductInput = productInputs.children[0].cloneNode(true);
            var dicountInput = document.getElementById('discount');
            productInputs.appendChild(newProductInput);
            newProductInput.querySelectorAll('input').forEach(function(input) {
                input.value = '';
                discountInput.value = 0;
            });
        }

        function removeProductInput(button) {
            var cardBody = button.closest('.card-body');
            cardBody.parentElement.remove();
        }
    </script>
@endsection