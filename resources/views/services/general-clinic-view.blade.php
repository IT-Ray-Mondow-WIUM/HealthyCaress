@extends('layouts.app')
@section('title', 'Services')
@section('content')
<div class="mt-2">
    <livewire:services.main-livewire :id="$registration->id" />
</div>
@endsection