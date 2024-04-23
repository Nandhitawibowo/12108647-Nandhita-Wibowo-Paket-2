@extends('layout')

@section('layout')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1><br>
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

                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Halo {{$user->role}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main>

@endsection
