@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Modifica Place</h1>
                <form method="POST" action="{{ route('host.places.update', ['place' => $place->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $place->title) }}">
                        {{-- Error --}}
                        @error('title')
                            <div class="alert alert-danger">
                                {{ message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('title', $place->address) }}">
                        {{-- Error --}}
                        @error('address')
                            <div class="alert alert-danger">
                                {{ message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rooms">Rooms</label>
                        <input type="text" class="form-control" id="rooms" name="rooms"
                            value="{{ old('rooms', $place->rooms) }}">
                        {{-- Error --}}
                        @error('rooms')
                            <div class="alert alert-danger">
                                {{ message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="beds">Beds</label>
                        <input type="text" class="form-control" id="beds" name="beds"
                            value="{{ old('beds', $place->beds) }}">
                    </div>
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <input type="text" class="form-control" id="bathrooms" name="bathrooms"
                            value="{{ old('bathrooms', $place->bathrooms) }}">
                    </div>
                    <div class="form-group">
                        <label for="square_meters">Square Meters</label>
                        <input type="text" class="form-control" id="square_meters" name="square_meters"
                            value="{{ old('square_meters', $place->square_meters) }}">
                    </div>
                    <div class="form-group">
                        <label for="lat">Latitude</label>
                        <input type="text" class="form-control" id="lat" name="lat"
                            value="{{ old('lat', $place->lat) }}">
                    </div>
                    <div class="form-group">
                        <label for="lng">Longidute</label>
                        <input type="text" class="form-control" id="lng" name="lng"
                            value="{{ old('lng', $place->lng) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>

            </div>
        </div>
    </div>
@endsection
