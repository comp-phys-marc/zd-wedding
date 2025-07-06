<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\GuestbookEntry;

class GuestbookController extends Controller
{

    public function index()
    {
        $entries = GuestbookEntry::latest()->get();

        return response()->json(['data' => $entries]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        $entry = GuestbookEntry::create([
            'name' => $request->input('name'),
            'message' => $request->input('message'),
        ]);

        return response()->json(['success' => true, 'entry' => $entry], 201);
    }
}
