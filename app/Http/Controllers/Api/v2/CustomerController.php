<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conditions = [];

        if (isset($request->name)) {
            $conditions[] = ['name', 'like', '%' . $request->name . '%'];
        }

        if (isset($request->email)) {
            $conditions[] = ['email', 'like', '%' . $request->email . '%'];
        }

        $customers = Customer::orderByDesc('id');

        if ($conditions) {
            $customers->where($conditions);
        }

        $customers = $customers->get();

        return [
            'status' => Response::HTTP_OK,
            'data' => $customers
        ];
    }

    /**
     * Show the form for creating a new resource.
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
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:customers',
        ];

        $messges = [
            'name.required' => 'Tên bắt buộc phải nhập',
            'name.min' => 'Tên không được nhỏ hơn :min ký tự',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
        ];

        $request->validate($rules, $messges);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();

        return [
            'status' => Response::HTTP_OK,
            'data' => $customer
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return 'User: ' . $customer;
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
    public function update(Request $request, Customer $customer)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
