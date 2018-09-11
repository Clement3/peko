@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($pages as $page)
                        {{ $page->title }}
                        {{ $page->body }}
                    @endforeach 

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
