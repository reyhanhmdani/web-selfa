@extends('layouts.docs')

@section('content')
<h2>Dokumen Santri: {{ $santri->name }}</h2>

<div class="container">
    @foreach ($files as $file)
        <div class="card">
            <img src="{{ asset('storage/' . $file) }}" alt="Dokumen" />
            <div class="caption">{{ pathinfo($file, PATHINFO_BASENAME) }}</div>
        </div>
    @endforeach
</div>
@endsection

