@extends('layouts.app')
@section('title', 'Tambah Hewan — PawHome')
@section('content')
<div class="card max-w-3xl"><h1 class="text-xl font-bold mb-5">Tambah Hewan</h1>
<form method="POST" action="{{ route('admin.animals.store') }}" enctype="multipart/form-data" class="space-y-4">@csrf
    @include('admin.animals.partials.form', ['animal' => null])
    <div class="flex gap-2"><button class="btn-primary">Simpan</button><a href="{{ route('admin.animals.index') }}" class="btn-secondary">Batal</a></div>
</form></div>
@endsection
