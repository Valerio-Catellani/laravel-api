@section('title', 'All Technologies')
@extends('layouts.admin')


@section('content')
    <section class="hype-w-85x100 mx-auto py-5">
        <h1 class="mb-3">Technologies</h1>
        <a role="button" class="mine-custom-btn mb-3" href="{{ route('admin.technologies.create') }}">Add a Technology</a>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <table id="projects-table"
            class="table table-dark table-hover shadow mb-2 mt-3 hype-unselectable hype-table-clickable">
            <thead>
                <tr>
                    <th scope="col">#id Technology</th>
                    <th scope="col">Technology Name</th>
                    <th scope="col" class="d-none d-xl-table-cell">Technology Slug</th>
                    <th scope="col" class="d-none d-xl-table-cell">Hex Color</th>
                    <th scope="col" class="d-none d-xl-table-cell">Icon</th>
                    <th scope="col" class="d-none d-xl-table-cell">Icon Class</th>
                    <th scope="col" class=" text-center">
                        Amministration Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $element)
                    <tr>
                        <td>{{ $element->id }}</td>
                        <td>{{ $element->name }}</td>
                        <td class="d-none d-xl-table-cell">{{ $element->slug }}</td>
                        <td class="d-none d-xl-table-cell" style="color: {{ $element->color }};">{{ $element->color }}</td>
                        <td class="d-none d-xl-table-cell" style="color: {{ $element->color }};"><i
                                class="{{ $element->icon }} fs-3"></i></td>
                        <td class="d-none d-xl-table-cell">{{ $element->icon }}</td>
                        </td>
                        <td class="">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.technologies.show', $element->slug) }}" class="table-icon m-1">
                                    <div class="icon-container">
                                        <i
                                            class=" fa-solid fa-eye fs-3 text-active-tertiary hype-text-shadow hype-hover-size"></i>
                                    </div>
                                </a>
                                <a href="{{ route('admin.technologies.edit', $element->slug) }}" class="table-icon m-1">
                                    <div class="icon-container">
                                        <i
                                            class=" fa-solid fa-pen-to-square fs-3 text-active-tertiary hype-text-shadow hype-hover-size"></i>
                                    </div>
                                </a>
                                <form id="delete-form" action="{{ route('admin.technologies.destroy', $element->slug) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="element-delete default-button text-active-primary hype-text-shadow fs-3 m-1"
                                        type="submit" data-element-id="{{ $element->id }}"
                                        data-element-title="{{ $element->name }}">
                                        <div class="icon-container">
                                            <i class="fa-solid fa-trash-can "></i>
                                        </div>
                                    </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}
    </section>
@endsection
