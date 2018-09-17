@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap fle
x-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Voir le message de {{ $contact->email}}</h1>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Message</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $contact->created_at }}</h6>
                <p class="card-text">
                    <strong>Nom du contact :</strong> {{ $contact->fullname }} </br>
                    <strong>Objet :</strong> {{ $contact->object }}</br>
                    <strong>Message :</strong> {{ $contact->message }}
                </p>
            </div>
        </div>
    </div>
            </tbody>
        </table>
        
    </div>
</div>
@endsection
