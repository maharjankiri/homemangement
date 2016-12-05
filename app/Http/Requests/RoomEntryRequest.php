<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RoomEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function rules()
    {
       $id = Route::input('room');
        return [
        'name'=>"required|unique:rooms,room_name,$id;",
        'price' => 'required|integer',
        ];


    }
    public function messages()
{
    return [
        'name.required' => 'A name is required',
        'name.unique' => 'Room with this name already exists',
        
    ];
}
}
