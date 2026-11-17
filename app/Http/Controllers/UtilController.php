<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function loadWelcome () {
    return view('welcome');
}

public function helloMessage (string $message) {
    return '<h1>Hello '.$message.'.</h1>';
}

public function loadHomepage () {

    //dados que no futuro estarão definidos no controller e vêm da base de dados
    $courseName = 'SD';

    // simulo que vou à base de dados e trago a lista de alunos
    $students = ['Licínia', 'Rachel', 'João', 'Leonel'];

     //array associativo
        //dados que serão carregados da base de dados
        $contactInfo = [
            'name' => 'Bruno',
            'contact' => 'Bruno@cesae.pt'
        ];

        // dd($contactInfo); // tipo um console log
        // var_dump($contactInfo); // tipo um console log

        $cesae_info = [
            'name' => 'CESAE',
            'address' => 'Digital',
            'email' => 'cesae@cesaedigital.pt'
        ];

    return view('home', compact('courseName', 'students', 'contactInfo', 'cesae_info'));
}

public function loadAllUsers(){
    return view('users.allusers');
}

public function loadAddUsers(){
    return view('users.addusers');
}

public function loadFallback(){
    return view('utils.fallback');
}

}
