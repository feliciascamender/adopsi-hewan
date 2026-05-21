@extends('layouts.app')
@section('title', 'Edit Riwayat Medis — PawHome')
@section('content')
<div class="card max-w-2xl"><h1 class="text-xl font-bold mb-5">Edit Riwayat Medis</h1><form method="POST" action="{{ route('admin.medical.update', $record) }}" class="space-y-4">@csrf @method('PUT') @include('admin.medical.partials.form', ['record' => $record])<div class="flex gap-2"><button class="btn-primary">Update</button><a href="{{ route('admin.medical.index', $record->animal) }}" class="btn-secondary">Batal</a></div></form></div>
@endsection
