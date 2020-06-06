<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class TrainerController extends Controller {
    /**
     * Show the trainer list.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $trainers = User::trainer();
        $q = $request->q;
        
        if($request->has('q')) {
            $trainers = $trainers->where('name', 'LIKE', "%{$q}%");
        }
        
        $trainers = $trainers->paginate(15);

        return view('trainer.index', compact('trainers', 'q'));
    }

    /**
     * Show the trainer list.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request, $id)
    {
        $trainer = User::trainer()->where('id', $id)->first();

        if($trainer === null) {
            abort('404');
        }
    
        return view('trainer.profile', compact('trainer'));
    }
}