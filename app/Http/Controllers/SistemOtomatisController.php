<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SistemOtomatis;
use Illuminate\Http\Request;

class SistemOtomatisController extends Controller
{
    public function index()
    {
        $sistem = SistemOtomatis::first();

        if (! $sistem) {
            $sistem = SistemOtomatis::create(['enabled' => true]);
        }

        return view('sistem_otomatis.index', [
            'sistem' => $sistem,
        ]);
    }

    public function enable()
    {
        $sistem = SistemOtomatis::first();

        if (! $sistem) {
            $sistem = SistemOtomatis::create(['enabled' => true]);
        }

        $sistem->enabled = true;
        $sistem->save();

        return redirect()->back()->with('success', 'Sistem absensi otomatis dinyalakan.');
    }

    public function disable()
    {
        $sistem = SistemOtomatis::first();

        if (! $sistem) {
            $sistem = SistemOtomatis::create(['enabled' => false]);
        }

        $sistem->enabled = false;
        $sistem->save();

        return redirect()->back()->with('success', 'Sistem absensi otomatis dimatikan.');
    }
}
