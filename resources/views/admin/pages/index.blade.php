@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Pages</h1>
</div>

@include('partials/_alert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Actif</th>
                <th scope="col">Création</th>
                <th scope="col">Mis à jour</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>
                <th scope="row">{{ $page->id }}</th>
                <td>{{ $page->title }}</td>
                <td>{{ $page->created_at }}</td>
                <td>{{ $page->updated_at }}</td>
                <td>
                    @if ($page->is_active) 
                    <span class="badge badge-info">Oui</span> 
                    @else
                    <span class="badge badge-warning">Non</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.pages.show', $page) }}">{{ __('View') }}</a>
                    <a href="{{ route('admin.pages.edit', $page) }}">{{ __('Edit') }}</a>
                    <a
                        href="{{ route('admin.pages.destroy', $page) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}
                    </a>
   
                    <form id="delete-form" action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $pages->links() }}

@endsection
