<?php

namespace App\Shop\Services;

use App\Shop\Models\Tag;

/**
 * Service for tags management
 */
class TagsManageService
{

    /**
     * Creates new tag.
     *
     * @param array $data
     * @return Tag
     */
    public function create(array $data): Tag
    {
        return Tag::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
    }


    /**
     * Updates the tag.
     *
     * @param Tag $tag
     * @param array $data
     * @return Tag
     */
    public function update(Tag $tag, array $data): Tag
    {
        $tag->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);

        return $tag;
    }

}
