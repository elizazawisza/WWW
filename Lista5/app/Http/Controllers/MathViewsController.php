<?php


namespace App\Http\Controllers;


use App\Comment;

class MathViewsController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function part1()
    {
        return view('part1');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function part2()
    {
        return view('part2');
    }
}