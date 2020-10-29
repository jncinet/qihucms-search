<?php

namespace Qihucms\Search\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Keyword extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_uri' => $this->type_uri,
            'keyword' => $this->keyword,
            'count' => $this->count,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
