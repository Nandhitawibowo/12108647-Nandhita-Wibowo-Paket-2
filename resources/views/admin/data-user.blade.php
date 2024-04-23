@extends('layout')

@section('layout')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Pengguna</h1><br>
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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class=" col-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                    <div class="input-group-btn">
                        <br><a href="/data-user/create" class="btn btn-primary"><i class="fas fa-plus"></i>
                            Buat Akun</a>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive"><br>
                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th></th>
                                    <th></th>
                                   
                                </tr>
                                @foreach ($users as $user)
                                  <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    @if ($user->role == 'administrator')
                                      <td><span class="badge badge-success">{{ $user->role }}</span></td>
                                      @elseif($user->role == 'petugas')
                                      <td><span class="badge badge-warning">{{ $user->role }}</span></td>
                                    @endif
                                  {{-- <td>{{ $user->role}}</td> --}}
                                  <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a></td>
                                  <td>
                                    <form method="post" action="{{ route('user.delete', $user->id) }}">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger" onclick="buttonConfirm()">Delete</button>
                                    
                                </form></td>
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