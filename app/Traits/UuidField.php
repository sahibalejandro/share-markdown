<?php
/**
 * @author Sahib J. Leo <sahib@sahib.io>
 * Date: 10/31/15 8:20 PM
 */

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait UuidField
{
    /**
     * Add a uuid to the model before persist to the data base.
     *
     * @param array $options
     */
    public function save(array $options = [])
    {
        if (!$this->exists) {
            $this->uuid = Uuid::uuid4();
        }

        parent::save($options);
    }

    /**
     * Get a record by its uuid.
     *
     * @param string $uuid
     * @return $this|null
     */
    public static function byUuid($uuid)
    {
        return static::where('uuid', '=', $uuid)->first();
    }

    /**
     * Scope to filter by uuid.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string $uuid
     */
    public function scopeUuid($query, $uuid)
    {
        $query->where('uuid', '=', $uuid);
    }
}