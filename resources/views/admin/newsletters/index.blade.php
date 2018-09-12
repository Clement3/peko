@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Newsletter</h1>
</div>

@include('partials/_alert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># ID</th>
                <th scope="col">E-mail</th>
                <th scope="col">Créer à</th>
                <th scope="col">Mise à jour</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsletters as $newsletter)
            <tr>
                <th scope="row">{{ $newsletter->id }}</th>
                <td>{{ $newsletter->email }}</td>
                <td>{{ $newsletter->created_at }}</td>
                <td>{{ $newsletter->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.newsletters.show', $newsletter) }}">{{ __('View') }}</a>
                    <a href="{{ route('admin.newsletters.edit', $newsletter) }}">{{ __('Edit') }}</a>
                    <a
                        href="{{ route('admin.newsletters.destroy', $newsletter) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}
                    </a>
   
                    <form id="delete-form" action="{{ route('admin.newsletters.destroy', $newsletter) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $newsletters->links() }}
@endsection
