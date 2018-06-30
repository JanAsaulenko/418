<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 27.04.2018
 * Time: 0:03
 */

namespace App\Http\Controllers;


class ModeratorEditController
{
    public function edit($id)
    {
        return view('moders.edit');
    }
}