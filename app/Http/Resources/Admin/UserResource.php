<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'                    => $this->id,
            'name'                  => (string)$this->name??'',
            'email'                 => (string)$this->email??'',
            'phone'                 => (string)$this->phone??'',
            'status'                => (string)$this->status??'',
            'address'               => (string)$this->address??'',
            'country'               => (string)$this->country??'',
            'country_name'          => (string)$this->country_name??'',
            'state'                 => (string)$this->state??'',
            'state_name'            => (string)$this->state_name??'',
            'city'                  => (string)$this->city??'',
            'zip_code'              => (string)$this->zip??'',
            'profile_image'         => (string)$this->image??'',
            'role_id'               => $this->roles[0]->id??'',
            'role'                  => $this->roles[0]->title??'',
            'business_id'           => (string)$this->business_id??'',
            'is_partner'            => ($this->is_partner)?true:false,
            'business_verified'     => ($this->business->status)?true:false,
        ];
    }
}
