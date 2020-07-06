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
    public function index(Request $request)
    {
        if($user = auth()->user())
        {
            $filter_by  = $request->filter_by;
            $filter_by  = (in_array($filter_by, ['approved', 'rejected', 'pending'])) ? $filter_by : 'ALL';

            $query      = Missionary::where('created_by', $user->id);



            if($filter_by != 'ALL')
            {
                switch ($filter_by)
                {
                    case 'approved':
                        $query = $query->where('approved', true)->whereNotNull('approved_at')->whereNotNull('approved_by');
                        break;

                    case 'pending':
                        $query = $query->whereNull('approved');
                        break;

                    case 'rejected':
                        $query = $query->where('approved', false);
                        break;
                }
            }

            $missionaries = $query->paginate(10);
         return view('registro/pages/my_account/missionaries', compact(['missionaries', 'filter_by']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro/pages/my_account/add_edit_missionary_page');
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
                'phone_1'               => (isset($request->phone_1['number'])) ? json_encode($request->phone_1) : null,
                'phone_2'               => (isset($request->phone_2['number'])) ? json_encode($request->phone_2) : null,
                'note'                  => $request->note,
                'allocated_in'          => $request->allocated_in,
                'allocated_country'     => $request->allocated_country,
                'allocated_state'       => $request->allocated_state,
                'allocated_city'        => $request->allocated_city,
                'allocated_district'    => $request->allocated_district,
                'allocated_lat'         => $request->allocated_lat,
                'allocated_long'        => $request->allocated_long,
                'created_by'            => $user->id,
                'approved'              => false,
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
        $missionary = Missionary::find($id);

        if($missionary)
            return view('registro/pages/my_account/add_edit_missionary_page', compact(['missionary']));
        else{
            return redirect()->route('my_account.missionaries')->with(['error' => 'Registro não encontrado!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($user = auth()->user())
        {
            if($request->m_id)
            {
                $data       = [
                    'name'                  => $request->name,
                    'email_1'               => $request->email_1,
                    'email_2'               => $request->email_2,
                    'phone_1'               => (isset($request->phone_1['number'])) ? json_encode($request->phone_1) : null,
                    'phone_2'               => (isset($request->phone_2['number'])) ? json_encode($request->phone_2) : null,
                    'note'                  => $request->note,
                    'allocated_in'          => $request->allocated_in,
                    'allocated_country'     => $request->allocated_country,
                    'allocated_state'       => $request->allocated_state,
                    'allocated_city'        => $request->allocated_city,
                    'allocated_district'    => $request->allocated_district,
                    'allocated_lat'         => $request->allocated_lat,
                    'allocated_long'        => $request->allocated_long,
                    'created_by'            => $user->id,
                    'approved'              => false,
                ];

                $status     = Missionary::where('id', $request->m_id)->update($data);

                if($status)
                    return redirect()->route('my_account.missionaries')->with(['success' => 'Registro atualizado com sucesso!']);
                else
                    return redirect()->route('my_account.missionaries')->with(['error' => 'Erro ao atualizar os dados']);
            }else{
                return redirect()->route('my_account.missionaries')->with(['error' => 'Por favor verifique os dados informados']);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $missionary = Missionary::find($id);
        if($missionary)
        {
           $status  = $missionary->delete();
           if($status)
           return redirect()->route('my_account.missionaries')->with(['success' => 'Registro excluído com sucesso!']);
        }else{
            return redirect()->route('my_account.missionaries')->with(['error' => 'Registro não encontrado!']);
        }
    }
}
