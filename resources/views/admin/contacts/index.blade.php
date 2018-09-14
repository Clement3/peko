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
                <th scope="col">Nom :</th>
                <th scope="col">Objet :</th>
                <th scope="col">Reçu le : </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{ $contact->id }}</th>
                <td>{{ $contact->fullname }}</td>
                <td>{{ $contact->object }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                                
                <td>
                    @if ($contact->is_received) 
                    <span class="badge badge-info">Terminé</span> 
                    @else
                    <span class="badge badge-warning">En Cours</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.contacts.show', $contact) }}">{{ __('View') }}</a>
                    <a
                        href="{{ route('admin.contacts.destroy', $contact) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}
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
