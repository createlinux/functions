<?php

const time_label_today = '今天';
const time_label_yesterday = '昨天';
const time_label_current_week = '本周';
const time_label_previous_week = '上周';

const time_label_current_month = '本月';

const time_label_previous_month = '上个月';
const time_label_current_quarter = '本季度';
const time_label_previous_quarter = '上一个季度';
const time_label_current_year = '本年';
const time_label_previous_year = '去年';
const time_label_thirty_days = '近30天';
const time_label_ninety = '近90天';
const time_label_half_year = '近半年';

/**
 * 获取今天开始和结束时间
 * @return array
 */
function get_today_time()
{
    return [
        'label' => time_label_today,
        'start_time' => date("Y-m-d 00:00:00"),
        'end_time' => date("Y-m-d 23:59:59")
    ];
}

function get_yesterday_time()
{
    return [
        'label' => time_label_yesterday,
        'start_time' => date("Y-m-d 00:00:00", strtotime('-1 days')),
        'end_time' => date("Y-m-d 23:59:59", strtotime('-1 days'))
    ];
}

//本周
function get_current_week_time()
{
    $timestamp = time();
    $start_time = date("Y-m-d 00:00:00", strtotime("monday", $timestamp));
    $end_time = date("Y-m-d 23:59:59", strtotime("sunday", $timestamp));

    return [
        'label' => time_label_current_week,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

//上周
function get_previous_week_time()
{
    $start_time = date("Y-m-d 00:00:00", strtotime("previous monday"));
    $end_time = date("Y-m-d 23:59:59", strtotime("previous sunday"));

    return [
        'label' => time_label_previous_week,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

function get_current_month_time()
{

    $start_time = date("Y-m-01 00:00:00");
    $end_time = date("Y-m-t 23:59:59");

    return [
        'label' => time_label_current_month,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

/**
 *
 * @return array
 */
function get_previous_month_time()
{
    $start_time = date("Y-m-01 00:00:00", strtotime("previous month"));
    $end_time = date("Y-m-t 23:59:59", strtotime("previous month"));

    return [
        'label' => time_label_previous_month,
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
        'label' => time_label_current_quarter,
        'start_time' => date("Y-m-01 00:00:00", $start_unix_time),
        'end_time' => date("Y-m-t 23:59:59", $end_unix_time)
    ];
}

//上一个季度
function get_previous_quarter_time()
{
    $timestamp = time();
    $quarter_start_month = (ceil(date("m", $timestamp) / 3) - 2) * 3 + 1;

    $start_unix_time = mktime(0, 0, 0, $quarter_start_month, 1, date("Y", $timestamp));
    $end_unix_time = mktime(0, 0, 0, $quarter_start_month + 2, 1, date("Y", $timestamp));

    $quarter_start_month = (ceil(date("m", $timestamp) / 3) - 3) * 3 + 1;
    $prevStartUnixTime = mktime(0, 0, 0, $quarter_start_month, 1, date("Y", $timestamp));
    $prevEndUnixTime = mktime(0, 0, 0, $quarter_start_month + 2, 1, date("Y", $timestamp));

    return [
        'label' => time_label_previous_quarter,
        'start_time' => date("Y-m-01 00:00:00", $start_unix_time),
        'end_time' => date("Y-m-t 23:59:59", $end_unix_time)
    ];
}

//本年
function get_current_year_time()
{
    $start_time = date("Y-01-01 00:00:00");
    $end_time = date("Y-12-t 23:59:59");

    $prevYearTime = get_previous_year_time();

    return [
        'label' => time_label_current_year,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $prevYearTime['start_time'],
        'prev_end_time' => $prevYearTime['end_time']*/
    ];
}

//上一年
function get_previous_year_time()
{
    $start_time = date("Y-01-01 00:00:00", strtotime("-1 years"));
    $end_time = date("Y-12-t 23:59:59", strtotime("-1 years"));

    return [
        'label' => time_label_previous_year,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

/*
 * 获取近30天
 */
function get_thirty_days_time()
{
    $start_time = date('Y-m-d', strtotime('-30 days')) . ' 00:00:00';
    $end_time = date('Y-m-d', time()) . ' 23:59:59';

    return [
        'label' => time_label_thirty_days,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

/**
 *
 * @return array
 */
function get_ninety_days_time()
{
    $start_time = date('Y-m-d', strtotime('-90 days')) . ' 00:00:00';
    $end_time = date('Y-m-d', time()) . ' 23:59:59';

    return [
        'label' => time_label_ninety,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

function get_half_year_time()
{
    $start_time = date('Y-m-d', strtotime('-6 months')) . ' 00:00:00';
    $end_time = date('Y-m-d', time()) . ' 23:59:59';

    return [
        'label' => time_label_half_year,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
}

/**
 * @title 获取当前时间
 * @isMenu 1
 * @remark
 * @param $dateFormat
 * @return false|string
 */
function get_current_datetime($dateFormat = '')
{
    if (!$dateFormat) {
        return date("Y-m-d H:i:s");
    }
    return date($dateFormat);
}

/**
 *
 * @param $startTime
 * @param $endTime
 * @return array
 */
function get_prev_datetime($startTime, $endTime)
{
    $duration = strtotime($endTime) - strtotime($startTime);
    $days = number_format($duration / 3600 / 24, 0, '.', '');
    $timestamp = strtotime("-{$days} days", strtotime($startTime));
    $prevStartTime = date("Y-m-d 00:00:00", $timestamp);
    $prevEndTime = date("Y-m-d 23:59:59", $timestamp);
    return [
        'start_time' => $prevStartTime,
        'end_time' => $prevEndTime
    ];
}
