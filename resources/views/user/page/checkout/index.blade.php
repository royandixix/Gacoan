@extends('user.layouts.app')

@section('content')
<h1>Checkout</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

<form action="{{ route('checkout.process') }}" method="POST">
    @csrf

    <label class="block mb-2">Alamat Pengiriman</label>
    <textarea
        name="alamat_pengiriman"
        required
        class="w-full border p-2 rounded"
        rows="4"></textarea>

    <button type="submit" class="btn btn-primary mt-3">
        Konfirmasi Pesanan
    </button>
</form>
@endsection
