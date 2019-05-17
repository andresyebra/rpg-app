<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Monsters extends Model
{
    public $timestamps = false;

    public static function getMonster()
    {
        $monster = DB::table('monster')->get();

        return $monster;
    }

    public static function createMonster($data)
    {

        $idMonster = DB::table('monster')->insertGetId([
            'name' => $data['name'],
            'level' => $data['level'],
            'race' => $data['race'],
            'abilities' => $data['ability'],
            'strength' => $data['strength'],
            'intelligence' => $data['intelligence'],
            'dexterity' => $data['dexterity'],
        ]);

        return $idMonster;
    }

    public static function deleteMonster($id)
    {

        $delete = DB::table('monster')->where('id', '=', $id)->delete();
        return $delete;
    }

    public static function updateMonster($data)
    {

        $updatedHero = DB::table('monster')->where('id', $data['id'])
            ->update(['name' => $data['name'],
                'race' => $data['race'],
                'abilities' => $data['ability'],
                'strength' => $data['strength'],
                'intelligence' => $data['intelligence'],
                'dexterity' => $data['dexterity']]);

        return $updatedHero;
    }


    public static function getMonsterById($id)
    {
        $monster = DB::table('monster')->where('monster.id', '=', $id)->first();

        return $monster;
    }

    public static function dataMonster()
    {

        $powers= DB::table('monster_powers')->get();
        $races= DB::table('monster_races')->get();

        $data = [
            'powers' =>$powers,
            'races' =>$races,
        ];

        return $data;

    }

    public static function dataStatsMonster()
    {
        $monster_count = DB::table('monster')->count();
        $monster_count_race = DB::table('monster')
            ->select('race', DB::raw('count(*) as race_count'))
            ->groupBy('race')
            ->orderBy('race_count', 'acs')
            ->first()
            ->race;
        $monster_count_ability = DB::table('monster')
            ->select('abilities', DB::raw('count(*) as ability_count'))
            ->groupBy('abilities')
            ->orderBy('ability_count', 'acs')
            ->first()
            ->abilities;


        $data = [
            'count' => $monster_count,
            'race' => $monster_count_race,
            'ability' => $monster_count_ability,
        ];

        return $data;
    }


}
