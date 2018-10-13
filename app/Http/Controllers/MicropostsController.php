<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MicropostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'messages' => $tasks,
            ];
            $data += $this->counts($user);
            return view('messages.index', $data);
        }else {
            return view('welcome');
        }
    }
     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->tasks()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
     public function destroy($id)
    {
        $task = \App\Tasks::find($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect()->back();
    }
}