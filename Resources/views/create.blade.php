@extends('templates.admin')

@section('content')
    {{-- page header --}}
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Novo Autor
                    </h2>
                </div>

            </div>
        </div>
    </div>

    {{-- page body --}}

    <form action="{{ route('author.store') }}" method="POST" class="col-6 mx-auto" enctype="multipart/form-data">
        @csrf

        <div class="row">
            @foreach ($form as $item)
                <div class="{{ $item['size'] }}">
                    @if (isset($item['label']))
                        <label class="form-label">{{ $item['label'] }}</label>
                    @endif
                    @if (isset($item['item']))
                        @foreach ($item['item'] as $iten)
                            @include('components.form-elements.' . $iten['component'], $iten)
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Salvar autor</button>

    </form>
@endsection
