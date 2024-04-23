@extends('layout')

@section('layout')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Create Account</h1><br>
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
                
                    <form action="{{ route("post.user") }}" method="post" class="needs-validation" novalidate>
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
                                    <label>Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" placeholder="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please input your name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="text" name="email" placeholder="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please input your email
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" placeholder="****" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please input your password
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Role<span class="text-danger">*</span></label>
                                    <select class="form-control" required name="role">
                                        <option disabled selected>Select Role</option>
                                       
                                        <option value="administrator">Administrator</option>
                                        <option value="petugas">Petugas</option>
                                  
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12"><br>
                                    <button class="btn btn-primary">Simpan</button>
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