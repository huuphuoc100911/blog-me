<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tableName = 'firebase-user';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->database->getReference($this->tableName)->getValue();

        return view('user.firebase.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('user.firebase.create');
    }

    public function store(Request $request)
    {
        $postData = $request->all();

        $postRef = $this->database->getReference($this->tableName)->push($postData);

        if ($postRef) {
            return redirect()->route('firebase.index')->with('success', 'Contact Added Succesfully');
        } else {
            return redirect()->route('firebase.index')->with('fail', 'Contact Not Added');
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
        $contact = $this->database->getReference($this->tableName)->getChild($id)->getValue();

        if ($contact) {
            return view('user.firebase.edit', compact('id', 'contact'));
        } else {
            return redirect()->back()->with('fail', 'Contact ID Not Found');
        }
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
        $data = $request->all();
        $dataUpdated = $this->database->getReference($this->tableName . "/" . $id)
            ->update($data);

        if ($dataUpdated) {
            return redirect()->route('firebase.index')->with('success', 'Contact Edited Succesfully');
        } else {
            return redirect()->route('firebase.index')->with('fail', 'Contact Not Edited');
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
    }

    public function delete($id)
    {
        $dataDelete = $this->database->getReference($this->tableName . "/" . $id)
            ->remove();

        if ($dataDelete) {
            return redirect()->route('firebase.index')->with('success', 'Contact Deleted Succesfully');
        } else {
            return redirect()->route('firebase.index')->with('fail', 'Contact Not Deleted');
        }
    }
}
