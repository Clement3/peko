@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Contacts</h1>
</div>

@include('partials/_alert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># ID</th>
                <th scope="col">Destinataire</th>
                <th scope="col">Objet:</th>
                <th scope="col">Date réception : </th>
                <th scope="col">Status </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{ $contact->id }}</th>
                <td>{{ $contact->fullname }}</td>
                <td>{{ $contact->object }}</td>
                <td>{{ $contact->created_at }}</td>
                                
                <td>
                    @if ($contact->is_read) 
                    <span class="badge badge-info">lu</span> 
                    @else
                    <span class="badge badge-warning">non-lu</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.contacts.show', $contact) }}">{{ __('Voir') }}</a>
                    <a
                        href="{{ route('admin.contacts.destroy', $contact) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Supprimer') }}
                    </a>
   
                    <form id="delete-form" action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $contacts->links() }}
@endsection
