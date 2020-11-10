<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'sender_name' => 'required|string|max:100',
            'sender_phone' => 'required|string|max:20',
            'location_latlong' => 'required|string',
            'total_price' => 'required|string',
            'packet_category_id' => 'required',
            'delivery_type_id' => 'required',
            'deliveries' => 'required',
            'deliveries.*.receiver_name' => 'required|string|max:100',
            'deliveries.*.receiver_phone' => 'required|string|max:20',
            'deliveries.*.location_latlong' => 'required|string',
            'deliveries.*.sort_order' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus berupa string',
            'ineteger' => ':attribute harus berupa ineteger',
            'max' => ':attribute maksimal :max karakter',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'user_id' => 'id user',
            'sender_name' => 'nama pengirim',
            'sender_phone' => 'nomor telepon',
            'location_latlong' => 'koordinat lokasi',
            'total_price' => 'total harga',
            'packet_category_id' => 'id paket kategori',
            'delivery_type_id' => 'id jenis pengiriman',
            'deliveries' => 'data pengiriman',
            'deliveries.*.receiver_name' => 'nama penerima pengiriman',
            'deliveries.*.receiver_phone' => 'nomor penerima pengiriman',
            'deliveries.*.location_latlong' => 'koordinat lokasi penerima pengiriman',
            'deliveries.*.sort_order' => 'urutan pengiriman',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
