<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            if(!empty($request->start_date)) {
                $data = Customer::whereBetween('created_at', [$request->start_date, $request->end_date])->get();
            } else {
                $data = Customer::all();
            }

            $users = new Collection;

            foreach($data as $u) {
                $users->push([
                    'id'           => $u->id,
                    'first_name'   => $u->first_name,
                    'last_name'    => $u->last_name,
                    'phone_number' => $u->phone_number,
                    'email'        => $u->email,
                    'created_at'   => $u->created_at->format('jS F, Y | g:i a'),
                    'updated_at'   => $u->updated_at->format('jS F, Y | g:i a'),
                ]);
            }
            return datatables()->of($users)
                    ->addColumn('action', function ($user) {
                return '<button type="button" link="'.route('customers.show', $user['id']).'" class="btn btn-sm btn-primary view">View</button>';
                })
                ->make(true);
        }
        if ($request->page == 2) {
            return view('customers_v2');
        } else {
            return view('customers');
        }
    }

    /**
     * Show the form for creating a new resource.b
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Customer $customer)
    {
        if($request->ajax()) {
            return response()->json([
                'id' => $customer->id,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'phone_number' => $customer->phone_number,
                'email' => $customer->email,
                'created_at' => $customer->created_at->format('jS F, Y | g:i a'),
                'updated_at' => $customer->updated_at->format('jS F, Y | g:i a'),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
