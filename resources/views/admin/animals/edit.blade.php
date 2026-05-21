@extends('layouts.app')
@section('title', 'Edit Hewan — PawHome')
@section('content')
<div class="card max-w-3xl"><h1 class="text-xl font-bold mb-5">Edit Hewan</h1>
<form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data" class="space-y-4">@csrf @method('PUT')
    @include('admin.animals.partials.form', ['animal' => $animal])
    <div class="flex gap-2"><button class="btn-primary">Update</button><a href="{{ route('admin.animals.index') }}" class="btn-secondary">Batal</a></div>
</form></div>
@endsection
