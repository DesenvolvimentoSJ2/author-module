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
                        Autores
                    </h2>
                </div>

            </div>
        </div>
    </div>

    {{-- page body --}}

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Birthday</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $author)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url({{ asset('storage/' . $author->avatar_path) }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $author->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Title">
                                                <div>{{ date('d/m/Y', strtotime($author->birthday)) }}</div>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn">
                                                        Edit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
