@extends('layouts.app')

@section('content')
    {{-- button per creare nuovo place --}}
    <div class="container py-2 justify-content-end mb-4">
        <a href="{{ route('host.places.create') }}">
            <button type="submit" class="btn btn-primary">Create new place</button>
        </a>
    </div>

    {{-- tabella riepilogativa dei places dell'user loggato --}}
    <div class="container">
        <table class="table">
            <thead class="table-dark text-center">
                <th>Denomination</th>
                <th>Address</th>
                <th>Rooms</th>
                <th>Beds</th>
                <th>Bathrooms</th>
                <th>Square Meters</th>
                <th>Amenities</th>
                <th>Image</th>
                <th>Actions</th>
                
                {{-- //TODO aggiungere collegamento alla view front/show --}}
            </thead>

            <tbody class="text-center">
                @foreach ($places as $place)
                    <tr>
                        <td>{{ $place->title }}</td>
                        <td>{{ $place->address }}</td>
                        <td>{{ $place->rooms }}</td>
                        <td>{{ $place->beds }}</td>
                        <td>{{ $place->bathrooms }}</td>
                        <td>{{ $place->square_meters }}</td>
                        <td>
                            @foreach ($place->amenities as $item)
                            {{-- //TODO mettiamoci le icone al posto del amenity->name --}}
                                {{ $item->name }}
                            @endforeach
                        </td>
                        <td>
                            <img class="w-75" src="{{ asset('storage/' . $place->img)}}" alt="">
                        </td>
                        <td>
                            <a href="{{ route('host.places.edit', $place) }}" class="btn btn-warning">Edit</a>
                        
                            <form class="form-group" action="{{ route('host.places.destroy', $place) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @if (!$place->visible)
                                <a href="{{ route('host.places.toggleVisibility', $place) }}" class="btn btn-dark">Visibility:Off</a>
                            @else
                                <a href="{{ route('host.places.toggleVisibility', $place) }}" class="btn btn-success">Visibility:On</a>
                            @endif
                        </td>
                        {{-- //TODO aggiungere tasto/link per front/show-- --}}
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
