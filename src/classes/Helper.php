<?php

class Helper
{

    public static function getBugImportance($index = null)
    {
        $bugImportance = array(
            0 => trans('ZagrosCore::layout.critical'),
            1 => trans('ZagrosCore::layout.high'),
            2 => trans('ZagrosCore::layout.medium'),
            3 => trans('ZagrosCore::layout.low'),
        );

        if (is_null($index))
            return $bugImportance;
        else
            return $bugImportance[$index];
    }

    public static function getBugImportanceColor($index)
    {
        $colors = array(
            0 => '#FF3A3A',
            1 => '#990D0D',
            2 => '#007C1E',
            3 => '#000000'
        );

        return $colors[$index];
    }

    public static function getBugStatus($index = null)
    {
        $bugsStatus = array(
            0 => trans('ZagrosCore::layout.new'),
            1 => trans('ZagrosCore::layout.confirmed'),
            2 => trans('ZagrosCore::layout.in_progress'),
            3 => trans('ZagrosCore::layout.completed'),
            4 => trans('ZagrosCore::layout.on_hold'),
            5 => trans('ZagrosCore::layout.rejected'),
        );

        if (is_null($index))
            return $bugsStatus;
        else
            return $bugsStatus[$index];

    }

    public static function getBugStatusColor($index)
    {
        $colors = array(
            0 => '#414141',
            1 => '#002847',
            2 => '#00467E',
            3 => '#007E00',
            4 => '#000000',
            5 => '#8A8A8A'
        );

        return $colors[$index];
    }

    public static function getBlueprintImportance($index = null)
    {
        $blueprintImportance = array(
            0 => trans('ZagrosCore::layout.critical'),
            1 => trans('ZagrosCore::layout.high'),
            2 => trans('ZagrosCore::layout.medium'),
            3 => trans('ZagrosCore::layout.low'),
        );

        if (is_null($index))
            return $blueprintImportance;
        else
            return $blueprintImportance[$index];
    }

    public static function getBlueprintImportanceColor($index)
    {
        $colors = array(
            0 => '#FF3A3A',
            1 => '#990D0D',
            2 => '#007C1E',
            3 => '#000000'
        );

        return $colors[$index];
    }

    public static function getBlueprintStatus($index = null)
    {
        $blueprintsStatus = array(
            0 => trans('ZagrosCore::layout.unknown'),
            1 => trans('ZagrosCore::layout.not_started'),
            2 => trans('ZagrosCore::layout.started'),
            3 => trans('ZagrosCore::layout.in_progress'),
            4 => trans('ZagrosCore::layout.good_progress'),
            5 => trans('ZagrosCore::layout.beta_available'),
            6 => trans('ZagrosCore::layout.implemented'),
            7 => trans('ZagrosCore::layout.on_hold'),
            8 => trans('ZagrosCore::layout.rejected'),
        );

        if (is_null($index))
            return $blueprintsStatus;
        else
            return $blueprintsStatus[$index];

    }

    public static function getBlueprintStatusColor($index)
    {
        $colors = array(
            0 => '#8A8A8A',
            1 => '#414141',
            2 => '#002847',
            3 => '#00467E',
            4 => '#0B79D1',
            5 => '#888302',
            6 => '#007E00',
            7 => '#000000',
            8 => '#8A8A8A',
        );

        return $colors[$index];
    }

    public static function getAvatar($email)
    {
        return HTML::image('http://gravatar.com/avatar/'.md5(strtolower(trim($email))).'?s=60', 'avatar', array('class' => 'avatar'));
    }
}
