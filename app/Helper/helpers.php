<?php
if (!function_exists('getGenderType')) {
    function getGenderType()
    {
        $genders = [
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Others',
        ];

        return $genders;
    }
}


if (!function_exists('getMaritalStatus')) {
    function getMaritalStatus()
    {

        $status = [
            'married' => 'Married',
            'unmarried' => 'Unmarried',
        ];

        return $status;
    }
}

if (!function_exists('getJobType')) {
    function getJobType()
    {

        $types = [
            'permanent' => 'Permanent',
            'temporary' => 'Temporary',
        ];

        return $types;
    }
}

if (!function_exists('getStatus')) {
    function getStatus()
    {

        $status = [
            '1' => 'Active',
            '0' => 'Inactive',
        ];

        return $status;
    }
}

if (!function_exists('getRelations')) {
    function getRelations()
    {

        $relations = [
            'son' => 'Son',
            'daughter' => 'Daughter',
            'niece' => 'Niece',
            'nephew' => 'Nephew',
            'brother' => 'Brother',
            'sister' => 'Sister',
            'grandson' => 'Grandson',
            'Granddaughter' => 'granddaughter',
        ];

        return $relations;
    }
}

if (!function_exists('getReligionType')) {
    function getReligionType()
    {

        $religions = [
            'islam' => 'Islam',
            'christianity' => 'Christianity ',
            'buddhism' => 'Buddhism ',
            'hinduism ' => 'Hinduism ',
        ];

        return $religions;
    }
}

if (!function_exists('getStudentCategory')) {
    function getStudentCategory()
    {

        $castes = [
            'general' => 'General',
            'obc' => 'OBC',
            'special' => 'Special',
            'physical challenged' => 'Physical challenged',
        ];

        return $castes;
    }
}


if (!function_exists('getBloodGroups')) {
    function getBloodGroups()
    {

        $bloods = [
            'o+' => 'O+ve',
            'o-' => 'O+ve',
            'a+' => 'A+ve',
            'b+' => 'B+ve',
            'ab+' => 'AB+ve',
            'ab-' => 'AB-ve',
        ];

        return $bloods;
    }
}


if (!function_exists('getDaysList')) {
    function getDaysList() {

        $days = [
            'Saturday' => 'Saturday',
            'Sunday' => 'Sunday',
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
        ];

        return $days;
    }
}


if (!function_exists('getEducationLevelList')) {
    function getEducationLevelList() {

        $levels = [
            'bsc' => 'Bachelor of Science',
            'diploma' => 'Diploma',
            'ssc' => 'Secondary School Certificate',
        ];

        return $levels;
    }
}

if (!function_exists('getResultTypeList')) {
    function getResultTypeList() {

        $types = [
            'first_division' => 'First Division/Class',
            'second_division' => 'Second Division/Class',
            'third_division' => 'Third Division/Class',
            'grade' => 'Grade',
            'appeared' => 'Appeared',
            'enrolled' => 'Enrolled',
            'not_mention' => 'Do Not Mention',
            'awarded' => 'Awarded',
            'pass' => 'Pass',
        ];

        return $types;
    }
}

if (!function_exists('styleStatus')) {
    function styleStatus($value)
    {
        $output = '';

        if ($value == 1) {
            $output .= '<span class="badge badge-success">Active</span>';
        } else if ($value == 0) {
            $output .= '<span class="badge badge-danger">Inactive</span>';
        }

        return $output;
    }
}

if (!function_exists('styleApproved')) {
    function styleApproved($value)
    {
        $output = '';

        if ($value == 1) {
            $output .= '<span class="badge badge-success">Approved</span>';
        } else if ($value == 0) {
            $output .= '<span class="badge badge-danger">Unapprove</span>';
        }

        return $output;
    }
}

if (!function_exists('makeDropdownList')) {
    function makeDropdownList($objects, $key='id', $value='name')
    {
        $dropdown_lists = [];

        if ($objects) {
            foreach ($objects as $object) {
                $dropdown_lists[$object->$key] = $object->$value;
            }
        }

        return $dropdown_lists;
    }
}

if (!function_exists('database_formatted_date')) {
    function database_formatted_date($value = null) {
        
        $date = date('Y-m-d', strtotime($value));

        return $date;
    }
}

if (!function_exists('database_formatted_datetime')) {
    function database_formatted_datetime($date = null)
    {
        return $date ? date('Y-m-d H:i:s', strtotime($date)) : date('Y-m-d H:i:s');
    }
}

if (!function_exists('database_formatted_time')) {
    function database_formatted_time($date = null)
    {
        return $date ? date('H:i:s', strtotime($date)) : date('H:i:s');
    }
}


if (!function_exists('user_formatted_datetime')) {
    function user_formatted_datetime($date = null)
    {
        return $date ? date('d M, y  h:i A', strtotime($date)) : date('d M, y  h:i A');
    }
}


if (!function_exists('user_formatted_time')) {
    function user_formatted_time($date = null)
    {
        return $date ? date('h:i A', strtotime($date)) : date('h:i A');
    }
}

if (!function_exists('database_formatted_date')) {
    function database_formatted_date($value = null) {
        
        $date = date('Y-m-d', strtotime($value));

        return $date;
    }
}

if (!function_exists('user_formatted_date')) {
    function user_formatted_date($value = null) {
        
        $date = date('d-M, Y', strtotime($value));

        return $date;
    }
}

if (!function_exists('datepicker_formatted_date')) {
    function datepicker_formatted_date($value = null) {
        if (!$value) {
            return '';
        }
        
        $date = date('d-m-Y', strtotime($value));

        return $date;
    }
}