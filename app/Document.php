<?php

namespace App;

use App\Traits\UuidField;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use UuidField;

    protected $fillable = ['user_id', 'name', 'content'];

    /**
     * Get document sharing url.
     *
     * @return string
     */
    public function url()
    {
        return route('documents.show', $this->uuid);
    }
}
