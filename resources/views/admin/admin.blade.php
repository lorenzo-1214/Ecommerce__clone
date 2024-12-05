
@extends('layouts.app')

@section('content')
    <h1>Benvenuto nella Dashboard dell'Amministratore</h1>
    <a href="{{ route('admin.products.index') }}">Gestisci Prodotti</a>
@endsection
