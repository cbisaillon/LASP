<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 2019-04-01
 * Time: 7:31 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class the manage the different pages of the guide pages
 * Class GuideController
 * @package App\Http\Controllers
 */
class GuideController
{
    public function index(Request $request){
        return view('guide.index');
    }
}