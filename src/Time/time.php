<?php
/**
 * 获取今天开始和结束时间
 * @return array
 */
function get_today_time()
{
    return [
        'label' => time_label_today,
        'start_time' => date("Y-m-d 23:59:59", strtotime('previous day')),
        'end_time' => date("Y-m-d 00:00:00", strtotime('next day')),

        /*'prev_start_time' => date("Y-m-d 23:59:59", strtotime('-2 days')),
        'prev_end_time' => date("Y-m-d 23:59:59")*/
    ];
}

function get_yesterday_time()
{
    return [
        'label' => time_label_yesterday,
        'start_time' => date("Y-m-d 23:59:59", strtotime('-2 days')),
        'end_time' => date("Y-m-d 00:00:00", strtotime('-1 day')),

        /*'prev_start_time' => date("Y-m-d 23:59:59", strtotime('-3 days')),
        'prev_end_time' => date("Y-m-d 23:59:59", strtotime('-2 days'))*/
    ];
}

//本周
function get_current_week_time()
{
    $timestamp = time();
    $start_time = date("Y-m-d 23:59:59", strtotime("previous sunday", $timestamp));
    $end_time = date("Y-m-d 00:00:00", strtotime("next monday", $timestamp));
    $prevWeekTime = get_previous_week_time();
    return [
        'label' => time_label_current_week,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $prevWeekTime['start_time'],
        'prev_end_time' => $prevWeekTime['end_time']*/
    ];
}

//上周
function get_previous_week_time()
{
    $timestamp = strtotime("-1 week");

    $start_time = date("Y-m-d 23:59:59", strtotime("previous sunday", $timestamp));
    $end_time = date("Y-m-d 00:00:00", strtotime("next monday", $timestamp));

    $timestamp2 = strtotime("-2 week");

    $start_time2 = date("Y-m-d 23:59:59", strtotime("previous sunday", $timestamp2));
    $end_time2 = date("Y-m-d 00:00:00", strtotime("next monday", $timestamp2));

    return [
        'label' => time_label_previous_week,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $start_time2,
        'prev_end_time' => $end_time2*/
    ];
}

function get_current_month_time()
{

    $start_time = date("Y-m-t 23:59:59", strtotime("previous month"));
    $end_time = date("Y-m-01 00:00:00", strtotime("next month"));
    $prevMonthTime = get_previous_month_time();

    return [
        'label' => time_label_current_month,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $prevMonthTime['start_time'],
        'prev_end_time' => $prevMonthTime['end_time']*/
    ];
}

/**
 *
 * @return array
 */
function get_previous_month_time()
{
    $start_time = date("Y-m-t 23:59:59", strtotime("-2 months"));
    $end_time = date("Y-m-01 00:00:00");

    $startTime2 = date("Y-m-t 23:59:59", strtotime("-3 months"));
    $endTime2 = date("Y-m-t 23:59:59", strtotime("-1 months"));

    return [
        'label' => time_label_previous_month,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $startTime2,
        'prev_end_time' => $endTime2*/
    ];
}

//本季度
function get_current_quarter_time()
{
    $timestamp = time();
    $quarter_start_month = (ceil(date("m", $timestamp) / 3) - 1) * 3 + 1;
    $start_unix_time = mktime(0, 0, 0, $quarter_start_month, 1, date("Y", $timestamp));
    $end_unix_time = mktime(0, 0, 0, $quarter_start_month + 2, 1, date("Y", $timestamp));

    $prevQuarterTime = get_previous_quarter_time();

    return [
        'label' => time_label_current_quarter,
        'start_time' => date("Y-m-t 23:59:59", strtotime("-1 month", $start_unix_time)),
        'end_time' => date("Y-m-01 00:00:00", strtotime("+1 month", $end_unix_time)),

        /*'prev_start_time' => $prevQuarterTime['start_time'],
        'prev_end_time' => $prevQuarterTime['end_time']*/
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
        'start_time' => date("Y-m-t 23:59:59", strtotime("-1 month", $start_unix_time)),
        'end_time' => date("Y-m-01 00:00:00", strtotime("+1 month", $end_unix_time)),

        /*'prev_start_time' => date("Y-m-t 23:59:59", strtotime("-1 month", $prevStartUnixTime)),
        'prev_end_time' => date("Y-m-01 00:00:00", strtotime("+1 month", $prevEndUnixTime))*/
    ];
}

//本年
function get_current_year_time()
{
    $start_time = date("Y-12-t 23:59:59", strtotime("previous year last month"));
    $end_time = date("Y-01-01 00:00:00", strtotime("next year first month"));

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
    $start_time = date("Y-12-t 23:59:59", strtotime("-2 years"));
    $end_time = date("Y-01-01 00:00:00");

    $prev_start_time = date("Y-12-t 23:59:59", strtotime("-3 years"));
    $prev_end_time = date("Y-01-01 00:00:00", strtotime('-1 years'));

    return [
        'label' => time_label_previous_year,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $prev_start_time,
        'prev_end_time' => $prev_end_time*/
    ];
}

/*
 * 获取近30天
 */
function get_thirty_days_time()
{
    $start_time = date('Y-m-d', strtotime('-30 days')) . ' 23:59:59';
    $end_time = date('Y-m-d', time()) . ' 00:00:00';

    $prev_start_time = date('Y-m-d', strtotime('-60 days')) . ' 23:59:59';
    $prev_end_time = date('Y-m-d', strtotime('-30 days')) . ' 00:00:00';

    return [
        'label' => time_label_thirty_days,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $prev_start_time,
        'prev_end_time' => $prev_end_time*/
    ];
}

/**
 *
 * @return array
 */
function get_ninety_days_time()
{
    $start_time = date('Y-m-d', strtotime('-90 days')) . ' 23:59:59';
    $end_time = date('Y-m-d', time()) . ' 00:00:00';

    $prev_start_time = date('Y-m-d', strtotime('-180 days')) . ' 23:59:59';
    $prev_end_time = date('Y-m-d', strtotime('-90 days')) . ' 00:00:00';

    return [
        'label' => time_label_ninety,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $prev_start_time,
        'prev_end_time' => $prev_end_time*/
    ];
}

function get_half_year_time()
{
    $start_time = date('Y-m-d', strtotime('-6 months')) . ' 23:59:59';
    $end_time = date('Y-m-d', time()) . ' 00:00:00';

    $prev_start_time = date('Y-m-d', strtotime('-12 months')) . ' 23:59:59';
    $prev_end_time = date('Y-m-d', strtotime('-6 months')) . ' 00:00:00';

    return [
        'label' => time_label_half_year,
        'start_time' => $start_time,
        'end_time' => $end_time,

        /*'prev_start_time' => $prev_start_time,
        'prev_end_time' => $prev_end_time*/
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
 * 根据开始时间和结束时间获取环比时间断
 * @param $startTime
 * @param $endTime
 * @return array
 */
function get_prev_datetime($startTime, $endTime)
{
    $duration = strtotime($endTime) - strtotime($startTime);
    $days = number_format($duration / 3600 / 24, 0, '.', '');

    $prevStartTime = date("Y-m-d 23:59:59", strtotime("-{$days} days", strtotime($startTime)));
    $prevEndTime = date("Y-m-d 00:00:00", strtotime($startTime) + 1);
    return [
        'start_time' => $prevStartTime,
        'end_time' => $prevEndTime
    ];
}