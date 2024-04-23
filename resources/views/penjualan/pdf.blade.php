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
                 

                    <div class="card-body p-0">
                        <div class="table-responsive"><br>
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Total Harga</th>
                                   
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
                                     

                                        {{-- @if(Auth::user()->role=='petugas') --}}
                                        
                                        
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

<script type="text/javascript">
    window.print()
</script>

