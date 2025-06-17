@extends('layouts.docs')

@section('content')
    <h2>Dokumentasi {{ ucfirst($tipe) }}: {{ $person->name }}</h2>

    <div class="container grid grid-cols-1 gap-4 md:grid-cols-3">
        @forelse ($files as $file)
            <div class="card rounded bg-white p-4 shadow">
                <img src="{{ asset('storage/' . $file) }}" alt="Dokumen" class="mb-2 rounded" />
                <div class="caption text-sm text-gray-600">
                    {{ pathinfo($file, PATHINFO_BASENAME) }}
                </div>
            </div>
        @empty
            <p class="col-span-full text-gray-500">Tidak ada file dokumentasi.</p>
        @endforelse
    </div>
@endsection
