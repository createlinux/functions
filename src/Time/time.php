<?php
/**
 * 获取今天开始和结束时间
 * @return array
 */
function get_today_time()
{
    return [
        'start_time' => date("Y-m-d 23:59:59", strtotime('previous day')),
        'end_time' => date("Y-m-d 00:00:00", strtotime(strtotime('next day')))
    ];
}

function get_yesterday_time()
{
    return [
        'start_time' => date("Y-m-d 23:59:59", strtotime('-2 days')),
        'end_time' => date("Y-m-d 00:00:00", strtotime('-1 day'))
    ];
}

//本周
function get_current_week_time()
{
    $timestamp = time();
    $start_time = date("Y-m-d 23:59:59", strtotime("previous sunday", $timestamp));
    $end_time = date("Y-m-d 00:00:00", strtotime("next monday", $timestamp));

    return [
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

//上周
function get_previous_week_time()
{
    $timestamp = strtotime("-1 week");

    $start_time = date("Y-m-d 23:59:59", strtotime("previous sunday", $timestamp));
    $end_time = date("Y-m-d 00:00:00", strtotime("next monday", $timestamp));

    return [
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

function get_current_month_time()
{

    $start_time = date("Y-m-t 23:59:59", strtotime("previous month"));
    $end_time = date("Y-m-01 00:00:00", strtotime("next month"));

    return [
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

function get_previous_month_time()
{
    $start_time = date("Y-m-t 23:59:59", strtotime("-2 months"));
    $end_time = date("Y-m-01 00:00:00");

    return [
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

//本季度
function get_current_quarter_time()
{
    $timestamp = time();
    $quarter_start_month = (ceil(date("m", $timestamp) / 3) - 1) * 3 + 1;
    $start_unix_time = mktime(0, 0, 0, $quarter_start_month, 1, date("Y", $timestamp));
    $end_unix_time = mktime(0, 0, 0, $quarter_start_month + 2, 1, date("Y", $timestamp));

    return [
        'start_time' => date("Y-m-t 23:59:59", strtotime("-1 month", $start_unix_time)),
        'end_time' => date("Y-m-01 00:00:00", strtotime("+1 month", $end_unix_time))
    ];
}
//上一个季度
function get_previous_quarter_time()
{
    $timestamp = time();
    $quarter_start_month = (ceil(date("m", $timestamp) / 3) - 2) * 3 + 1;
    $start_unix_time = mktime(0, 0, 0, $quarter_start_month, 1, date("Y", $timestamp));
    $end_unix_time = mktime(0, 0, 0, $quarter_start_month + 2, 1, date("Y", $timestamp));

    return [
        'start_time' => date("Y-m-t 23:59:59", strtotime("-1 month", $start_unix_time)),
        'end_time' => date("Y-m-01 00:00:00", strtotime("+1 month", $end_unix_time))
    ];
}
//本年
function get_current_year_time()
{
    $start_time = date("Y-12-t 23:59:59",strtotime("previous year last month"));
    $end_time = date("Y-01-01 00:00:00",strtotime("next year first month"));

    return [
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

//上一年
function get_previous_year_time()
{
    $start_time = date("Y-12-t 23:59:59",strtotime("-2 years"));
    $end_time = date("Y-01-01 00:00:00");

    return [
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}