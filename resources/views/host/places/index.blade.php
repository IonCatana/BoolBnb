@extends('layouts.app')

@section('content')
    {{-- button per creare nuovo place --}}
    <div class="container py-2 justify-content-end mb-4">
        <a href="{{ route('host.places.create') }}">
            <button type="submit" class="btn btn-primary mr-2">Create new place</button>
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
                <th>Messages</th>
                
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
                                <i class="{{ $item->icon }}"></i>
                            @endforeach
                        </td>
                        <td>
                            @if($place->img)
                                <img class="img-fluid" src="{{ asset('storage/' . $place->img)}}" alt="">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('host.places.edit', $place) }}" class="btn btn-warning mb-2 w-100">Edit</a>
                        
                            <form class="place-delete-form form-group mb-2" action="{{ route('host.places.destroy', $place) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <!-- Button trigger modal -->
                                <button type="submit" id="delete-confirm-button" class="btn btn-danger w-100" data-toggle="modal" data-target="">Delete</button>
            
                                <!-- Modal -->
                                {{-- // TODO pericoloso laciare id tipo exampleModal --}}
                                <div name="delete-confirm-modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="exampleModalLabel">Attention!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-msg"></div>
                                            <div class="modal-footer">
                                                <button id="btn-confirm-delete" type="button" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @if (!$place->visible)
                                <a href="{{ route('host.places.toggleVisibility', $place) }}" class="btn btn-dark">Visibility:Off</a>
                            @else
                                <a href="{{ route('host.places.toggleVisibility', $place) }}" class="btn btn-success">Visibility:On</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('host.places.messages.index', $place) }}" class="btn btn-info mb-2">View Messages</a>
                            @if (!$place->visible)
                                <button class="btn btn-secondary w-100 disabled">Sponsor</button>
                            @else
                                <button class="btn btn-info w-100" data-toggle="modal" data-target="#sponsorship-modal">Sponsor</button>



                                <!-- Sponsorships Modal -->
                                <div name="sponsorship-modal" class="modal fade" id="sponsorship-modal" tabindex="-1" role="dialog" aria-labelledby="sposnsorshipModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                {{-- //TODO sarebbe bello centrato? --}}
                                                <h5 class="modal-title text-success" id="sponsorshipModalLabel">Welcome <span class="text-danger">{{ Auth::user()->name }}</span>! Boost your place's visualisations by sponsoring it!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-msg">
                                                <div class="container">
                                                    <h3>How long do you want your place to be sponsored?</h3>
                                                    <div class="row">
                                                        @foreach ($sponsorships as $spons)
                                                            <div class="col-4">
                                                                <div class="card">
                                                                    <h5 class="card-header">
                                                                        @for ($i = 0; $i < $loop->iteration; $i++)
                                                                            <i class="fas fa-dollar-sign h3"></i>
                                                                        @endfor
                                                                    </h5>
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">{{ $spons->denomination }}</h5>
                                                                        <p class="card-text">Sponsor your place for {{ $spons->duration }} hours</p>
                                                                        <p class="card-text ">Price: {{ $spons->price }} &euro;</p>
                                                                        <a href="#" class="btn btn-primary">Purchase</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif



                        </td>
                        {{-- //TODO aggiungere tasto/link per front/show-- --}}
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
