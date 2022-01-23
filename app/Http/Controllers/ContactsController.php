<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
  public function index() {
    $data = Contact::all();
    return response()->json([
      "error" => false,
      "message" => 'Data has been retrieved successfully',
      "data" => $data,
    ], 200);
  }

  public function store(Request $request) {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email|unique:contacts',
      'phone' => 'required|numeric'
    ]);

    if ($validator->fails()) {
      return response()->json([
        "error" => true,
        "message" => $validator->errors(),
      ], 400);
    }
    
    $data = Contact::create($request->all());
    return response()->json([
      "error" => false,
      "message" => 'Data has been added successfully',
      "data" => $data,
    ], 201);
  }

  public function show($id) {
    $data = Contact::find($id);
    if (!$data) {
      return response()->json([
        "error" => true,
        "message" => 'Data not found',
      ], 400);
    }

    return response()->json([
      "error" => false,
      "message" => 'Data has been retrieved successfully',
      "data" => $data,
    ], 200);
  }

  public function update(Request $request, $id) {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required|numeric'
    ]);

    if ($validator->fails()) {
      return response()->json([
        "error" => true,
        "message" => $validator->errors(),
      ], 400);
    }

    $data = Contact::find($id);
    if (!$data) {
      return response()->json([
        "error" => true,
        "message" => 'Data not found',
      ], 400);
    }

    $data->update($request->all());
    return response()->json([
      "error" => false,
      "message" => 'Data has been updated successfully',
      "data" => $data,
    ], 200);
  }

  public function destroy($id) {
    $data = Contact::find($id);
    if (!$data) {
      return response()->json([
        "error" => true,
        "message" => 'Data not found',
      ]);
    }

    $data->delete();
    return response()->json([
      "error" => false,
      "message" => 'Data has been deleted successfully',
    ]);
  }
}