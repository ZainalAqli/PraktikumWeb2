@extends('layouts.app')
@section('content')
<div class="container p-4">
    <div class="card">
      <div class="card-body">
        <h1>Halo, Selamat datang {{Auth::user() -> name}}</h1>
      </div>
    </div>
  </div>
@endsection