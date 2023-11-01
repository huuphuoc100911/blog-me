<?php

namespace App\Rules\Staff;

use App\Models\Media;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class Uppercase implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $mediaId;

    public function __construct($mediaId = null)
    {
        $this->mediaId = $mediaId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $medias = Media::where('id', '!=', $this->mediaId)->select('title')->get();
        $checkTitle = true;
        foreach ($medias as $media) {
            if ($value == $media->title) {
                $checkTitle = false;
                break;
            }
        }

        return $checkTitle;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute đã tồn tại';
    }
}
