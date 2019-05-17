<?php

namespace App\Http\Controllers;

use App\Models\Monsters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class MonstersController extends Controller
{

    public function index()
    {

        $monster = Monsters::getMonster();
        $data_monster = Monsters::dataMonster();

        return view('monster.index', [
            'monster' => $monster,
            'monster_data' => $data_monster
        ]);

    }

    public function create()
    {
        $data = [
            'id' => Input::get('id_monster'),
            'name' => Input::get('monster_name'),
            'level' => Input::get('level'),
            'race' => Input::get('race'),
            'ability' => Input::get('abilities'),
            'strength' => Input::get('strength'),
            'intelligence' => Input::get('intelligence'),
            'dexterity' => Input::get('dexterity'),
        ];

        if (!empty(Input::get('id_monster'))) {

            $valid = Validator::make($data, [
                'name' => 'required|string',
                'level' => 'required|integer',
                'race' => 'required|string',
                'ability' => 'required|string',
                'strength' => 'required|integer',
                'intelligence' => 'required|integer',
                'dexterity' => 'required|integer',
            ]);

            if ($valid->fails()) {

                return redirect('monster/index')->withErrors($valid) ->withInput();
            }

            $updated = Monsters::updateMonster($data);

            return redirect()->route('monster', ['message' => 'Monster was updated success']);
        } else {
            $valid = Validator::make($data, [
                'name' => 'required|string',
                'level' => 'required|integer',
                'race' => 'required|string',
                'ability' => 'required|string',
                'strength' => 'required|integer',
                'intelligence' => 'required|integer',
                'dexterity' => 'required|integer',
            ]);

            if ($valid->fails()) {
                return redirect('monster/index')->withErrors($valid)->withInput();
            }

            $create = Monsters::createMonster($data);

            return redirect()->route('monster', ['message' => 'Monster created success']);
        }
    }

    public function deleted(Request $request)
    {
        $delete = Monsters::deleteMonster($request->id);
        $response = array(
            'status' => 'success',
            'id' => $request->id,
            'deleted' => $delete
        );

        return response()->json($response);

    }

    public function getMonsterId($id)
    {

        $monster_id = Monsters::getMonsterById($id);

        if ($monster_id == null) {

            return view('errors.404');
        }

        $response = array(
            'status' => 'success',
            'id' => $id,
            'monster_data' => $monster_id
        );
        return response()->json($response);
    }

    public function getDataMonsterByRace($race)
    {

        $data_monster = Monsters::dataMonster();
        $data = array();

        foreach ($data_monster['powers'] as $key => $value) {

            if ($value->powers == 'Shadow Ball') {
                if ($race == 'Beholder' || $race == 'Mind Flayer') {
                    $data['abilities'][] = $value->powers;
                }
            } elseif ($value->powers == 'Aerial Ace') {
                if ($race == 'Dragons' || $race == 'Owlbear' || $race == 'Cloud Giant' || $race == 'Storm Giant' || $race == 'Umber Hulk') {
                    $data['abilities'][] = $value->powers;
                }
            } elseif ($value->powers == 'Surf') {
                if ($race == 'Yuan-ti' || $race == 'Gelatinous' || $race == 'Cube' || $race == 'Drow') {
                    $data['abilities'][] = $value->powers;
                }
            } elseif ($value->powers == 'Giga Drain') {
                if ($race == 'Mind Flayer') {
                    $data['abilities'][] = $value->powers;
                }
            } elseif ($race == 'Kobold') {
                if ($value->powers == 'Double Team' || $value->powers == 'Crunch') {
                    $data['abilities'][] = $value->powers;
                }
            } else {
                $data['abilities'][] = $value->powers;
            }

        }

        if (!empty($race)) {

            $race = strtolower($race);
            $name_monster = strrev($race);
            $name_monster = ucfirst($name_monster);
            $data['name_monster'] = $name_monster;

        }


        return $data;

    }

}
