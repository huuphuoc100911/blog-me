<?php
if (!function_exists('handleOrderPlanWhereBy')) {
    function handleOrderPlanWhereBy($viewData, $checkOrderPlan = null, $getKeyColumn = null)
    {
        $arrayData = [];

        foreach ($viewData as $key => $data) {
            foreach ($checkOrderPlan as $item) {
                if ($data[$item]) {
                    $isCheck = 0;
                    foreach ($data[$item] as $keyChild => $val) {
                        if ($val[$getKeyColumn]) {
                            $isCheck++;
                        }
                    }

                    if ($isCheck > 0) {
                        array_push($arrayData, $data);
                    }
                }
            }
        }

        return $arrayData;
    }
}

if (!function_exists('handleOrderWhereBy')) {
    function handleOrderWhereBy($viewData, $check = null, $getKeyColumn = null)
    {
        $arrayData = [];
        foreach ($viewData as $key => $data) {
            if ($data[$check]) {
                $isCheck = 0;
                foreach ($data[$check] as $keyChild => $val) {
                    if ($val[$getKeyColumn]) {
                        $isCheck++;
                    }
                }

                if ($isCheck > 0) {
                    array_push($arrayData, $data);
                }
            }
        }

        return $arrayData;
    }
}
