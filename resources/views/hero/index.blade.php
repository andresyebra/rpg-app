@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Heroes</h4></div>

                    <div class="panel-body">
                        Welcome to Hero Page!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Manage Heroes</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/hero/new')}}">
                            {!! csrf_field() !!}
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="radios">Multiple Radios</label>
                                    <div class="col-md-4">
                                        <div class="radio">
                                            <label for="manual">
                                                <input type="radio" name="radios" id="manual" value="1"
                                                       checked="checked">
                                                Manual Creation
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="random">
                                                <input type="radio" name="radios" id="random" value="2">
                                                Randomize Creation
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="id_hero">Hero ID</label>
                                    <div class="col-md-4">
                                        <input id="id_hero" name="id_hero" type="text" placeholder="ID"
                                               class="form-control input-md" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name_level">Level & Race</label>
                                    <div class="col-md-2">
                                        <input id="level" name="level" type="text" placeholder="Level"
                                               class="form-control " value="1" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="race" name="race" class="form-control selector">
                                            @foreach($hero_data['races'] as $data => $value)

                                                <option value="{{$value->race}}"
                                                        id="{{$value->id}}">{{$value->race}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="hero_name">Hero Name</label>
                                    <div class="col-md-2">
                                        <select id="first_name" name="first_name" class="form-control selector">
                                            <option value="default" id="default" selected disabled hidden>Choose name
                                            </option>
                                        </select>

                                    </div>
                                    <div class="col-md-2">
                                        <select id="last_name" name="last_name" class="form-control selector">
                                            <option value="default" id="default" selected disabled hidden>Choose Last
                                                name
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name_class">Class & Weapon</label>
                                    <div class="col-md-2">
                                        <select id="class" name="class" class="form-control selector2">
                                            {{--@foreach($hero_data['classes'] as $data => $value)--}}

                                                {{--<option value="{{$value->class}}"--}}
                                                        {{--id="{{$value->id}}">{{$value->class}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="weapon" name="weapon" class="form-control selector2">
                                            <option value="default" id="default" selected disabled hidden>Choose
                                                weapon
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="stats">Stats</label>
                                    <div class="col-md-2">
                                        <input id="strength" name="strength" type="text"
                                               placeholder="Strength" class="form-control input-md">
                                    </div>
                                    <div class="col-md-2">
                                        <button id="strength_button" type="button" name="strength_button"
                                                class="btn btn-primary">Roll
                                        </button>
                                        <label id="strength_text"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="stats"></label>
                                    <div class="col-md-2">
                                        <input id="intelligence" name="intelligence" type="text"
                                               placeholder="Intelligence" class="form-control input-md">
                                    </div>
                                    <div class="col-md-2">
                                        <button id="intelligence_button" type="button" name="intelligence_button"
                                                class="btn btn-primary">Roll
                                        </button>
                                        <label id="intelligence_text"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="stats"></label>
                                    <div class="col-md-2">
                                        <input id="dexterity" name="dexterity" type="text"
                                               placeholder="Dexterity" class="form-control input-md">
                                    </div>
                                    <div class="col-md-2">
                                        <button id="dexterity_button" type="button" name="dexterity_button"
                                                class="btn btn-primary">Roll
                                        </button>
                                        <label id="dexterity_text"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="delete_hero"></label>
                                    <div class="col-md-4">
                                        <button id="add_hero" type="submit" name="add_hero"
                                                class="btn btn-primary" value="add">Save
                                        </button>
                                        <button id="discard" type="button" name="discard"
                                                class="btn btn-primary">Discard
                                        </button>
                                    </div>
                                </div>
                                @if(!empty($_GET['message']))
                                    <div class="col-md-4 col-md-offset-2">
                                        <div class="alert alert-success" role="alert">{{ $_GET['message'] }}</div>
                                    </div>

                                @endif
                                @if($errors->any())
                                    <div class="col-md-4 col-md-offset-2">
                                        <div class="alert alert-danger" role="alert">
                                            {{$errors->first()}}
                                        </div>
                                    </div>
                                @endif
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Heroes List</h4></div>
                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Hero Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Race</th>
                                <th scope="col">Class</th>
                                <th scope="col">Weapon</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($heroes) > 0)
                                @foreach ($heroes as $hero => $value)
                                    <tr data-id="{{$value->id}}">
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->first_name}}</td>
                                        <td>{{$value->last_name}}</td>
                                        <td>{{$value->level}}</td>
                                        <td>{{$value->race}}</td>
                                        <td>{{$value->class}}</td>
                                        <td>{{$value->weapon}}</td>
                                        <td>
                                            <button type="button" name="delete_hero" class="btn btn-primary delete_hero"
                                                    value="{{$value->id}}">Delete
                                            </button>
                                            <button type="button" name="edit_hero" class="btn btn-primary edit_hero"
                                                    value="{{$value->id}}">Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>don't exists heroes</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="GET" id="DataHeroByRace" action="{{ url('/hero/data/')}}"></form>
    <form method="GET" id="DataHeroByClass" action="{{ url('/hero/class/')}}"></form>
    <form method="GET" id="DataHeroById" action="{{ url('/hero/id/')}}"></form>
    <form method="POST" id="deleted_hero" action="{{ url('/hero/deleted')}}">{!! csrf_field() !!}</form>
@endsection

@section('scripts')
    <script src="{{ asset('js/hero/hero.js') }}"></script>
@endsection



