@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Sliders</h1>
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
            @foreach ($sliders as $slider)
            <tr>
                <th scope="row">{{ $slider->id }}</th>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->created_at }}</td>
                <td>{{ $slider->updated_at }}</td>
                <td>
                    @if ($slider->is_active) 
                    <span class="badge badge-info">Oui</span> 
                    @else
                    <span class="badge badge-warning">Non</span>
                    @endif
                </td>
                
                    <a href="{{ route('admin.sliders.show', $slider) }}">{{ __('View') }}</a>
                    <a href="{{ route('admin.sliders.edit', $slider) }}">{{ __('Edit') }}</a>
                    <a
                        href="{{ route('admin.sliders.destroy', $slider) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}
                    </a>
   
                    <form id="delete-form" action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $sliders->links() }}

@endsection
