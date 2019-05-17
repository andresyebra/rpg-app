<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Heroes extends Model
{
    public $timestamps = false;

    public static function getHeroes()
    {
        $heroes= DB::table('hero')->get();

        return $heroes;
    }

    public static function createHero($data)
    {

        $idHero = DB::table('hero')->insertGetId([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'level' => $data['level'],
            'race' => $data['race'],
            'class' => $data['class'],
            'weapon' => $data['weapon'],
            'strength' => $data['strength'],
            'intelligence' => $data['intelligence'],
            'dexterity' => $data['dexterity'],
        ]);

        return $idHero;
    }

    public static function deleteHero($id)
    {

        $delete = DB::table('hero')->where('id', '=', $id)->delete();
        return $delete;
    }

    public static function updateHero($data)
    {

        $updatedHero = DB::table('hero')->where('id', $data['id'])
            ->update(['first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'level' => $data['level'],
                'race' => $data['race'],
                'class' => $data['class'],
                'weapon' => $data['weapon'],
                'strength' => $data['strength'],
                'intelligence' => $data['intelligence'],
                'dexterity' => $data['dexterity']]);

        return $updatedHero;
    }

    public static function getHeroById($id)
    {
        $hero = DB::table('hero')->where('hero.id', '=', $id)->first();

        return $hero;
    }

    public static function dataHero()
    {

        $first_name = DB::table('hero_first_name')->get();
        $last_name = DB::table('hero_last_name')->get();
        $classes = DB::table('hero_classes')->get();
        $races = DB::table('hero_races')->get();
        $weapons = DB::table('hero_weapons')->get();

        $data = [
            'first_name' =>$first_name,
            'last_name' =>$last_name,
            'classes' =>$classes,
            'races' =>$races,
            'weapons' =>$weapons,

        ];

        return $data;

    }

    public static function dataStatsHeroes()
    {
        $hero_count = DB::table('hero')->count();
        $hero_count_race = DB::table('hero')
            ->select('race', DB::raw('count(*) as race_count'))
            ->groupBy('race')
            ->orderBy('race_count', 'acs')
            ->first()
            ->race;
        $hero_count_class = DB::table('hero')
            ->select('class', DB::raw('count(*) as class_count'))
            ->groupBy('class')
            ->orderBy('class_count', 'acs')
            ->first()
            ->class;
        $hero_count_weapon = DB::table('hero')
            ->select('weapon', DB::raw('count(*) as weapon_count'))
            ->groupBy('weapon')
            ->orderBy('weapon_count', 'acs')
            ->first()
            ->weapon;

        $data = [
            'count' => $hero_count,
            'race' => $hero_count_race,
            'class' => $hero_count_class,
            'weapon' => $hero_count_weapon
            ];

        return $data;
    }


}
