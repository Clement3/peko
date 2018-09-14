@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Labels</h1>
</div>

@include('partials/_alert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># ID</th>
                <th scope="col">Descriptif</th>
                <th scope="col">Recette</th>
                <th scope="col">Image</th>
                <th scope='col'>Créer à :</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labels as $label)
            <tr>
                <th scope="row">{{ $label->id }}</th>
                <td>{{ $label->body}}</td>
                <td>{{ $label->recipe}}</td>
                <td>{{ $label->picture}}</td>
                <td>{{ $label->created_at}}</td>
            </td>
                <td>
                    <a href="{{ route('admin.labels.show', $label) }}">{{ __('View') }}</a>
                    <a href="{{ route('admin.labels.edit', $label) }}">{{ __('Edit') }}</a>
                    <a
                        href="{{ route('admin.labels.destroy', $label) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}
                    </a>
   
                    <form id="delete-form" action="{{ route('admin.labels.destroy', $label) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $labels->links() }}

@endsection
