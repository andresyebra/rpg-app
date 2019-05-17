<?php

namespace App\Http\Controllers;

use App\Models\Heroes;
use App\Models\Monsters;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $stats_hero = Heroes::dataStatsHeroes();
        $stats_monster = Monsters::dataStatsMonster();

        return view('dashboard.index', [
            'count_hero' => $stats_hero['count'],
            'race_hero' => $stats_hero['race'],
            'class_hero' => $stats_hero['class'],
            'weapon_hero' => $stats_hero['weapon'],
            'count_monster' => $stats_monster['count'],
            'race_monster' => $stats_monster['race'],
            'race_ability' => $stats_monster['ability'],
        ]);
    }

}
