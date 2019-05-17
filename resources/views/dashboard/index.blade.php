@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Dashboard</h4></div>
                    <div class="panel-body">
                        Welcome to Dashboard!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Heroes Information</h4></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4"><b>Total Heroes:</b>{{$count_hero}}</div>
                            <div class="col-md-4 offset-md-4"><b>The Best Race:</b>{{$race_hero}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><b>The Best Class:</b> {{$class_hero}} </div>
                            <div class="col-md-4 offset-md-4"><b>The Best Weapon:</b> {{$weapon_hero}} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Monster Information</h4></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4"><b>Total Monster:</b> {{$count_monster}} </div>
                            <div class="col-md-4 offset-md-4"><b>The Best Race:</b>{{$race_monster}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><b>The Best Ability:</b> {{$race_ability}}  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
