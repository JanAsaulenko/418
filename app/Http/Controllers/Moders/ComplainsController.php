<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 19.04.2018
 * Time: 23:48
 */

namespace App\Http\Controllers\Moders;


use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Http\Middleware\ModersMiddleware;

class ComplainsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const PER_PAGE = 5;
    public function index(Request $request)
    {
        $filter = [
            'confirmed' => 'confirmed'
        ];

        if($request->has($filter)) {
            $complains = Post::where('confirmed', NULL)
            ->orderBy('created_at', 'desc')
            ->paginate(self::PER_PAGE  );
        }else {
            $complains = Post::orderBy('created_at', 'desc')
                ->paginate(self::PER_PAGE);
        }

        return view('moders.complains.index')->with('complains', $complains);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('moders.complains.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        if($request->isMethod('POST')){

            if($request->hasFile('img')) {
                $file = $request->file('img');
               $filename = '/upload/complain/'.$request->id.'/'.str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';

               $file->move(public_path() . '/upload/complain/'.$request->id,$filename);


                $complain = Post::find($request->id);
                $complain->img = $filename;
                $complain->save();
            }
        }



        return redirect('moders/complains/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $complain = Post::find($id);

        return view('moders.complains.show', compact('complain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //

        $complain = Post::find($id);

        return View('moders.complains.edit', compact('complain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $complain = Post::find($id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = '/upload/complain/' . $id . '/' . str_random(20) . '.' . $file->getClientOriginalExtension() ?: 'jpg';
            $file->move(public_path() . '/upload/complain/'.$id, $filename);
            $complain->img = $filename;
        }

        $complain->confirmed = 1;

        $complain->update($request->all());
        return redirect('moders/complains');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('moders/complains')
            ->with('success','Complain deleted successfully');
    }
}