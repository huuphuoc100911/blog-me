<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Lấy danh sách tất cả các bản ghi với phân trang.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function getAllWithPagination($perPage = 10)
    {
        return static::paginate($perPage);
    }

    /**
     * Tìm kiếm theo tên cột và giá trị.
     *
     * @param string $column
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function findByColumn($column, $value)
    {
        return static::where($column, $value)->get();
    }

    /**
     * Lấy danh sách các bản ghi theo điều kiện.
     *
     * @param array $conditions
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByConditions(array $conditions)
    {
        $query = static::query();

        foreach ($conditions as $column => $value) {
            $query->where($column, $value);
        }

        return $query->get();
    }

    /**
     * Tăng giá trị một cột trong bảng.
     *
     * @param string $column
     * @param int $amount
     * @param array $conditions
     * @return int
     */
    public static function incrementColumnBy($column, $amount, array $conditions)
    {
        return static::where($conditions)->increment($column, $amount);
    }

    /**
     * Lấy một bản ghi ngẫu nhiên từ cơ sở dữ liệu.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function getRandomRecord()
    {
        return static::inRandomOrder()->first();
    }

    // Các phương thức khác tùy thuộc vào nhu cầu của ứng dụng của bạn.
}
