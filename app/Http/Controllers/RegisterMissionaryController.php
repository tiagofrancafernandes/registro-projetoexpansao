<?php

namespace App\Http\Controllers;

use App\Missionary;
use Illuminate\Http\Request;

class RegisterMissionaryController extends Controller
{
    /**
     * Display a dashboard of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if($user = auth()->user())
        {
            $missionaries          = Missionary::where('created_by', $user->id)->count();
            $total_missionaries    = Missionary::count();
            $total_approved        = Missionary::count();
            $approved_missionaries = Missionary::where('created_by', $user->id)->count();//TODO buscar os aprovados
         return view('registro/pages/my_account/dashboard', compact(['missionaries', 'approved_missionaries', 'total_missionaries', 'total_approved']));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($user = auth()->user())
        {
            $missionaries = Missionary::where('created_by', $user->id)->get();
         return view('registro/pages/my_account/missionaries', compact(['missionaries']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro/pages/my_account/add_missionary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(auth()->user())
        {
            $user = auth()->user();

            $missionary = [
                'name'                  => $request->name,
                'email_1'               => $request->email_1,
                'email_2'               => $request->email_2,
                'phone_1'               => (isset($request->phone_1['number'])) ? $request->phone_1 : null,
                'phone_2'               => (isset($request->phone_2['number'])) ? $request->phone_2 : null,
                'note'                  => $request->note,
                'allocated_in'          => $request->allocated_in,
                'allocated_country'     => $request->allocated_country,
                'allocated_state'       => $request->allocated_state,
                'allocated_city'        => $request->allocated_city,
                'allocated_district'    => $request->allocated_district,
                'allocated_lat'         => $request->allocated_lat,
                'allocated_long'        => $request->allocated_long,
                'created_by'            => $user->id,
            ];

            $status = Missionary::updateOrCreate(
                ['email_1'       => $request->email_1],
                $missionary
            );

            if($status)
            {
                return redirect()->route('my_account.missionaries');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
