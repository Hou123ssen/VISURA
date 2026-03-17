@extends('layouts.app')

@section('title', 'Visura — Photo Gallery')

@section('content')
    <x-navbar />

<x-hero-section :categories="$categories" />

    <x-gallery-section :photos="$photos" />

    <x-upload-modal />
@endsection

