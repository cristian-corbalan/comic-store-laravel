<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ComicUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user())
            return Auth::user()->can('edit comics');
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10',
            'number_pages' => 'nullable|numeric|min:1|max:65535', // Why does it not validate?
            'price' => 'required|numeric|min:1',
            'discount' => 'numeric|min:0|max:100',
            'stock' => 'nullable|numeric|min:0',
            'publication_date' => 'required|before_or_equal:now',
            'cover' => 'image|mimes:jpg',
            'brand_id' => 'required|exists:brands,id',
            'genres' => 'required|exists:genres,id',
            'characters' => 'required|exists:characters,id',
            'authors' => 'required|exists:authors,id',
            'artists' => 'required|exists:artists,id',
        ];
    }

    /**
     * Get the validation messages that apply to the request
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El titulo es obligatorio',
            'title.min' => 'El titulo debe contener al menos 2 caracteres',
            'title.unique' => 'El titulo ya existe',
            'synopsis.required' => 'La sinopsis es obligatoria',
            'synopsis.min' => 'La sinopsis debe contener 10 caracteres como mínimo',
            'number_pages.numeric' => 'La cantidad de paginas debe ser un valor numérico',
            'number_pages.min' => 'La cantidad de paginas no puede ser inferior a 1',
            'number_pages.max' => 'La cantidad de paginas no puede superar los 65535',
            'price.required' => 'El precio del comic es obligatorio',
            'price.numeric' => 'El precio debe ser un valor numérico',
            'price.min' => 'El precio mínimo posible es de 1',
            'discount.required' => 'El descuento del comic es obligatorio',
            'discount.numeric' => 'El descuento debe ser un valor numérico',
            'discount.min' => 'El descuento mínimo posible es de 0',
            'discount.max' => 'El descuento maximo posible es de 100',
            'stock.numeric' => 'El stock debe ser un valor numérico',
            'stock.min' => 'El stock mínimo posible es de 0',
            'publication_date.required' => 'La fecha de publicación es obligatoria',
            'publication_date.before_or_equal' => 'La fecha de publicación no puede ser mayor a la fecha de hoy',
            'cover.required' => 'La imagen de portada es obligatoria',
            'cover.image' => 'Debe ser una imagen',
            'cover.mimes' => 'La imagen debe ser de formato JPG',
            'cover.size' => 'La imagen no puede superar los 502 KB',
            'brand_id.required' => 'La marca del comic es obligatoria',
            'brand_id.exists' => 'La marca que selecciono no se pudo encontrar en nuestros registros',
            'genres.required' => 'El campo géneros es obligatorio',
            'genres.exists' => 'Uno o varios géneros seleccionados no se pudieron encontrar en nuestros registros',
            'characters.required' => 'El campo personajes es obligatorio',
            'characters.exists' => 'Uno o varios personajes seleccionados no se pudieron encontrar en nuestros registros',
            'authors.required' => 'El campo autores es obligatorio',
            'authors.exists' => 'Uno o varios autores seleccionados no se pudieron encontrar en nuestros registros',
            'artists.required' => 'El campo artistas es obligatorio',
            'artists.exists' => 'Uno o varios artistas seleccionados no se pudieron encontrar en nuestros registros',
        ];
    }
}
