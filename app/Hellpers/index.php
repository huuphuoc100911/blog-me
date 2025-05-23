<?php

use App\Models\Customer;
use Carbon\Carbon;

if (!function_exists('create_slug')) {
    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}

function isCustomerActive($email)
{
    return Customer::where('email', $email)->isActive()->count();
}

function convertDateTime($date)
{
    return Carbon::parse($date)->format('Y-m-d H:i:s');
}

function isRolePermission($dataArr, $moduleName, $role = 'view')
{
    if (!empty($dataArr)) {
        if (!empty($dataArr[$moduleName])) {
            $roleArr = $dataArr[$moduleName];
            if (in_array($role, $roleArr)) {
                return true;
            }
        }
    }

    return false;
}

function checkIsRoleIsset($dataArr, $moduleName, $role = 'view')
{
    $roleArr = json_decode($dataArr, true);

    if (!empty($roleArr[$moduleName])) {
        if (in_array($role, $roleArr[$moduleName])) {
            return true;
        }
    }

    return false;
}

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

function getCategoriesCheckbox($categories, $old = [], $parentId = 0, $char = '')
{
    $id = request()->route()->category;

    if ($categories) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId && $id != $category->id) {
                $checked = !empty($old) && in_array($category->id, $old) ? 'checked' : '';

                echo '<label class="d-block"><input type="checkbox" name="categories[]" value="' . $category->id . '" ' . $checked . ' /> ' . $char . $category->name . '</label>';
                unset($categories[$key]);
                getCategoriesCheckbox($categories, $old, $category->id, $char . '--');
            }
        }
    }
}

function generateRandomString($string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    return '#' . substr(str_shuffle($string), 0, 6);
}

function formatPrice($price)
{
    return number_format($price, 0, ',', '.');
}

function isRouteActive($routeList)
{
    if (!empty($routeList)) {
        foreach ($routeList as $route) {
            if (request()->is(trim($route, '/'))) {
                return true;
            }
        }
    }

    return false;
}

function activeSideBar($name, $routeList)
{
    return request()->is('manager/' . $name . '/*') || request()->is('manager/' . $name) || isRouteActive($includes ?? []) || isRouteActive($routeList);
}
