@extends('layouts.app')

@section('title', 'Visura — Photo Gallery')

@section('content')
    <x-navbar />

<x-hero-section :items="$categories" :photos="$photos" />

    <x-gallery-section :photos="$photos" />

    <x-upload-modal />
@endsection
