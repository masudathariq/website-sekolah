<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        return view('profil.visi-misi');
    }
}
