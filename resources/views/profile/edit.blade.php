@extends('layouts/main')
@section('title','Edytuj profil')
@section('content')
	<div class="row text-center">
    	<h2 class="text-center"><b>EDYCJA PROFILU UŻYTKOWNIKA</b></h2>
	</div>

	<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Imię</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="surname" class="col-md-4 control-label">Nazwisko</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$user->surname}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Nr Telefonu</label>

                            <div class="col-md-6">
                                <input id="phone" type="numeric" class="form-control" name="phone" value="{{$user->phone}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Miasto</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{$user->location}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description">{{$user->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Zatwierdź zmiany
                                </button>
                            </div>
                        </div>
                    </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&region=PL&key=AIzaSyB9-t5hJzQFtw_kc6y4tojZ_TZ1MSRV2NM" type="text/javascript"></script>
    <script>
        new google.maps.places.Autocomplete( document.getElementById('location'), { types: ['(cities)'], componentRestrictions: {country: 'pl'}});
    </script>
@endsection