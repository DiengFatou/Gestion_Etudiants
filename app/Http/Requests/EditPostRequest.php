<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'matricule' => 'required',
            'classe' => 'required'
        ];
    }
    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        // Renvoie une reponse JSON contenant les erreurs de validation
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Erreur de validation',
            'errorList' => $validator->errors()
        ]));

    }
    public function messages() {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'prenom.required'=> 'Le prenom est obligatoire',
            'email.required'=> 'L\'email est obligatoire',
            'matricule.required'=> 'Le matricule est obligatoire',
            'classe.required'=> 'La classe est obligatoire',
        ];
    }
}
