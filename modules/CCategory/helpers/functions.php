<?php

function getCategories($categories, $old = '', $parentId = 0, $char = '')
{
    $id = request()->route()->category;

    if ($categories) {
        foreach ($categories as $key => $category) {
            $selected = $old == $category->id ? 'selected' : '';

            if ($category->parent_id == $parentId && $id != $category->id) {
                echo '<option value="' . $category->id . '"' . $selected . '>' . $char . $category->name . '</option>';
                unset($categories[$key]);
                getCategories($categories, $old, $category->id, $char . '--');
            }
        }
    }
}
