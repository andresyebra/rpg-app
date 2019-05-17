<?php

namespace App\Http\Controllers;

use App\Models\Heroes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HeroesController extends Controller
{

    public function index()
    {

        $heroes = Heroes::getHeroes();
        $data_hero = Heroes::dataHero();

        return view('hero.index', [
            'heroes' => $heroes,
            'hero_data' => $data_hero
        ]);

    }

    public function create()
    {
        $data = [
            'id' => Input::get('id_hero'),
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'level' => Input::get('level'),
            'race' => Input::get('race'),
            'class' => Input::get('class'),
            'weapon' => Input::get('weapon'),
            'strength' => Input::get('strength'),
            'intelligence' => Input::get('intelligence'),
            'dexterity' => Input::get('dexterity'),
        ];

//        Half-orcs and Dragonborns don’t have a Last Name
//        Elfs’ Last Name must be its First Name, but mirrored (i.e. Jimmy => Ymmij)

        if (!empty(Input::get('id_hero'))) {


            $valid = Validator::make($data, [
                'first_name' => 'required|string',
                'level' => 'required|integer',
                'race' => 'required|string',
                'class' => 'required|string',
                'weapon' => 'required|string',
                'strength' => 'required|integer',
                'intelligence' => 'required|integer',
                'dexterity' => 'required|integer',
            ]);

            if ($valid->fails()) {

                return redirect('hero/index')->withErrors($valid) ->withInput();
            }

            $updated = Heroes::updateHero($data);

            return redirect()->route('hero', ['message' => 'Hero was updated success']);
        } else{

            $valid = Validator::make($data, [
                'first_name' => 'required|string',
                'level' => 'required|integer',
                'race' => 'required|string',
                'class' => 'required|string',
                'weapon' => 'required|string',
                'strength' => 'required|integer',
                'intelligence' => 'required|integer',
                'dexterity' => 'required|integer',
            ]);

            if ($valid->fails()) {

                return redirect('hero/index')->withErrors($valid) ->withInput();
            }


            $create = Heroes::createHero($data);

            return redirect()->route('hero', ['message' => 'Hero created success']);
        }

    }

    public function deleted(Request $request)
    {

        $delete = Heroes::deleteHero($request->id);
        $response = array(
            'status' => 'success',
            'id' => $request->id,
            'deleted' => $delete
        );

        return response()->json($response);
    }

    public function getHeroId($id)
    {

        $hero_id = Heroes::getHeroById($id);

        if($hero_id == null){

            return view('errors.404');
        }

        $response = array(
            'status' => 'success',
            'id' => $id,
            'hero_data' => $hero_id
        );
        return response()->json($response);
    }

    public function getDataHeroByRace($race)
    {

        $data_heroes = Heroes::dataHero();
        $data = array();

        foreach ($data_heroes['first_name'] as $key => $value) {

            if ($race == 'Dwarf') {
                if (strpos(strtolower($value->name), 'h') !== false ||
                    strpos(strtolower($value->name), 'r') !== false) {
                    $data['first_name'][] = $value->name;
                }
            } else {
                $data['first_name'][] = $value->name;
            }


        }

        foreach ($data_heroes['last_name'] as $key => $value) {

            if ($race == 'Dragonborn' || $race == 'Half-elf') {

                $data['last_name'] = '-';
            } elseif ($race == 'Dwarf') {

                if (strpos(strtolower($value->last_name), 'h') !== false ||
                    strpos(strtolower($value->last_name), 'r') !== false) {
                    $data['last_name'][] = $value->last_name;
                }

            } else {

                $data['last_name'][] = $value->last_name;
            }
        }


        foreach ($data_heroes['classes'] as $key => $value) {

            if ($race == 'Human' || $race == 'Half-elf') {
                if ($value->class == 'Paladin') {
                    $data['classes'][] = $value->class;
                }
            } elseif ($race == 'Dwarf') {

                if ($value->class != 'Ranger' && $value->class != 'Wizard') {
                    $data['classes'][] = $value->class;
                }

            } elseif ($race == 'Elf') {
                if ($value->class != 'Barbarian' && $value->class != 'Warrior') {
                    $data['classes'][] = $value->class;
                }
            }
            if ($race == 'Halfling') {
                if ($value->class != 'Barbarian') {
                    $data['classes'][] = $value->class;
                }
            } elseif ($race == 'Half-orc') {
                if ($value->class != 'Wizard' && $value->class != 'Cleric') {
                    $data['classes'][] = $value->class;
                }
            } elseif ($race == 'Dragonborn') {
                if ($value->class != 'Cleric') {
                    $data['classes'][] = $value->class;
                }
            }

        }


        return $data;

    }

    public function getDataWeaponByClass($class)
    {

        $data_heroes = Heroes::dataHero();
        $data = array();

        foreach ($data_heroes['weapons'] as $key => $value) {

            if ($class == 'Paladin') {
                if($value->weapon == 'Sword' || $value->weapon == 'Dagger'){
                    $data['weapons'][] = $value->weapon;
                }

            } elseif ($class == 'Ranger'){
                if($value->weapon == 'Bow and Arrows' || $value->weapon == 'Dagger'){
                    $data['weapons'][] = $value->weapon;
                }
            }elseif ($class == 'Barbarian'){
                if($value->weapon != 'Staff' && $value->weapon != 'Bow and Arrows' ){
                    $data['weapons'][] = $value->weapon;
                }
            }elseif ($class == 'Wizard' || $class == 'Cleric'){
                if($value->weapon == 'Dagger' || $value->weapon == 'Staff'){
                    $data['weapons'][] = $value->weapon;
                }
            }elseif ($class == 'Thief'){
                if($value->weapon != 'Hammer'){
                    $data['weapons'][] = $value->weapon;
                }
            }
            else{
                $data['first_name'][] = $value->weapon;
            }
        }

        return $data;
    }


}
