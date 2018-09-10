@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Utilisateurs</div>

                <div class="card-body">
                    @include('partials/_alert')

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Nom complet</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Actif</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->fullname() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->is_active) 
                                    <span class="badge badge-info">Oui</span> 
                                    @else
                                    <span class="badge badge-warning">Non</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" 
                                            class="btn btn-primary btn-sm" 
                                            data-toggle="modal" 
                                            data-target="#edit"
                                            data-whatever="lel">
                                        Editer
                                    </button> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
