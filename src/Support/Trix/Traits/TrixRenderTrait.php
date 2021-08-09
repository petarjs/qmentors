<?php

namespace Support\Trix\Traits;

use Exception;

trait TrixRenderTrait
{
    public function trixRender($field)
    {
        try {
            return $this->trixRichText->where('field', $field)->first()->content;
        } catch (Exception $e) {
            return '';
        }
    }
}
