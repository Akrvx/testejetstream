@extends('layouts.site')

@section('content')
    <!-- Adiciona padding no topo para não ficar escondido pela navbar -->
    <div class="pt-20">
        @include('components.site.about-content')
    </div>
@endsection