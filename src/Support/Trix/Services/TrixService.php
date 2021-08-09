<?php

namespace Support\Services;

class TrixService
{
    public function transformTrixDataFromRequest(array $data, $model): array
    {
        $trixFieldsKey = "$model-trixFields";
        $trixFields = $data[$trixFieldsKey];
        if (isset($trixFields)) {
            $newData = array_merge($data, compact('trixFields'));
            unset ($newData[$trixFieldsKey]);
            return $newData;
        } else {
            return $data;
        }
    }

    public function transformTrixDataToModel(array $data, $model): array
    {
        $transformedTrixKey = 'trixFields';
        $trixFieldsKey = "$model-trixFields";
        $trixFields = $data[$transformedTrixKey];
        if (isset($trixFields)) {
            $newData = array_merge($data, [$trixFieldsKey => $trixFields]);
            unset ($newData[$transformedTrixKey]);
            return $newData;
        } else {
            return $data;
        }
    }
}
