<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\KantongBelanja;

trait AjaxKantongBelanja
{
	public function index()
	{
		$KantongBelanja = KantongBelanja::where('users_id', Auth::user()->id)->get();
		return response()->json($KantongBelanja);
	}

	public function create(Request $request)
	{
		$KantongBelanja = KantongBelanja::create($request->all());
		return response()->json($KantongBelanja);		
	}

	public function update(Request $request, $id)
	{
		$KantongBelanja = KantongBelanja::find($id)->update($request->all());
		return response()->json($KantongBelanja);		
	}

	public function delete($id)
	{
		KantongBelanja::find($id)->delete();
		return response()->json(['done']);
	}
}