<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QuoteModels;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuoteControllers extends Controller
{
    public function getAll()
    {
        $data = QuoteModels::all();

        return response()->json([
            'count' => count($data),
            'data' => $data
        ], 200);
    }

    public function insertQuotes(Request $request)
    {
        $data = array(
            'content' => $request->content,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        );
        try {
            QuoteModels::create($data);
            return response()->json(['message' => 'Data created'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function getQuotes($id)
    {
        $data = QuoteModels::whereId($id)->first();
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json(['data' => $data], 201);
    }

    public function putQuotes(Request $request, $id)
    {
        $data = array(
            'content' => $request->content,
            'updated_at' => Carbon::now()
        );
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        try {
            QuoteModels::whereId($id)->update($data);
            return response()->json([
                'data' => $data,
                'message' => 'Data updated'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }
    }

    public function deleteQuotes($id): JsonResponse
    {
        $quote = QuoteModels::whereId($id)->first();
        if (!$quote) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        try {
            $quote->delete();
            return response()->json(['message' => 'Data deleted'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
