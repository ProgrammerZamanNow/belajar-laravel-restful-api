<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressCreateRequest;
use App\Http\Resources\AddressResource;
use App\Http\Resources\ContactResource;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function create(int $idContact, AddressCreateRequest $request): JsonResponse
    {
        $user = Auth::user();
        $contact = Contact::where('user_id', $user->id)->where('id', $idContact)->first();
        if (!$contact) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    "message" => [
                        "not found"
                    ]
                ]
            ])->setStatusCode(404));
        }

        $data = $request->validated();
        $address = new Address($data);
        $address->contact_id = $contact->id;
        $address->save();

        return (new AddressResource($address))->response()->setStatusCode(201);
    }
}
