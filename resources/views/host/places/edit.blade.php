@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Edit place info</h1>
                <form method="POST" action="{{ route('host.places.update', $place) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Places Name --}}
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $place->title) }}">
                        {{-- Error --}}
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Address Places --}}
                    <div class="form-group">
                        <label for="address">Address *</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('title', $place->address) }}">
                        {{-- Error --}}
                        @error('address')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input id="latitude" name="lat" type="number" class="coordinate form-control" placeholder="Latitude" readonly value="{{ old('lat', $place->lat) }}">
                            </div>
                            <div class="col">
                                <input id="longitude" name="lon" type="number" class="coordinate form-control" placeholder="Longitude" readonly value="{{ old('lon', $place->lon) }}">
                            </div>
                        </div>
                    </div>

                    {{-- Stanze Rooms, Beds, Bathrooms --}}
                    <div class="form-group">
                        <label for="rooms">Rooms</label>
                        <input type="text" class="form-control" id="rooms" name="rooms"
                            value="{{ old('rooms', $place->rooms) }}">
                        {{-- Error --}}
                        @error('rooms')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="beds">Beds</label>
                        <input type="text" class="form-control" id="beds" name="beds"
                            value="{{ old('beds', $place->beds) }}">
                        {{-- Error --}}
                        @error('beds')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <input type="text" class="form-control" id="bathrooms" name="bathrooms"
                            value="{{ old('bathrooms', $place->bathrooms) }}">
                        {{-- Error --}}
                        @error('bathrooms')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Square Meters --}}
                    <div class="form-group">
                        <label for="square_meters">Square Meters</label>
                        <input type="text" class="form-control" id="square_meters" name="square_meters"
                            value="{{ old('square_meters', $place->square_meters) }}">
                        {{-- Error --}}
                        @error('square_meters')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    
                    {{-- Chechboxes Amenities --}}                    
                    <label class="d-block">Amenities</label>
                    <div class="form-group form-check form-check-inline">
                        @foreach ($amenities as $i => $amenity)
                            <input class="form-check-input" type="checkbox" id="amenities-{{ $i }}" value="{{ $amenity->id }}" name="amenities[]" 
                            {{ $place->amenities->contains($amenity) ? 'checked' : '' }}/>
                            <label class="form-check-label mr-3" for="amenities-{{ $i }}">{{ $amenity->name }}</label>
                        @endforeach
                    </div>

                    {{-- upload dell'immagine --}}
                    <div class="form-group">
                        {{-- //TODO trovare il modo per cambiare la lingua in inglese, problema è che online la maggior parte dice che dipende dal browser --}}
                        <input id="img" type="file" name="img" class="@error('img') is-invalid @enderror">
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- // TODO tasto per rimuovere senza sostituire la foto --}}

                    {{-- visibility --}}
                    <label class="d-block">All fields must be filled to make your place visible on the app</label>
                    <div class="form-group form-check form-check-inline d-block">
                        <input class="form-check-input" type="checkbox" id="visible" name="visible" 
                        {{ old('visible') || $place->visible ? ' checked' : '' }}/>
                        <label class="form-check-label mr-3" for="visible">Visible</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
