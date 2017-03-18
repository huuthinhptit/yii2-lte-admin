<?php
/**
 * Created by IntelliJ IDEA.
 * User: vietpn
 * Date: 21/04/2016
 * Time: 11:22
 */

namespace common\models;


class BaseModel extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const DISABLE = 0;
    const QUIZ_CONTENT = 1;
    const ANSWER_CONTENT = 2;
    public $startTime;
    public $endTime;
    public $time;
    const BOUGHT = 1; //đã mua gói
    const NOT_BUY_PACKAGE = 0; //chưa mua gói
    const BUY_NEW_PACKAGE = 2 ;//đã mua gói sau đó update câu hỏi
    const PRICE_NEW_DEFAUL = 0;//giá mới nếu không có quiz mới
    const SUCCESS = 200;
    /**
     * @param $provider
     * @param $fieldName
     * @return int
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['updated_at']);
        unset($fields['user_created']);
        unset($fields['user_updated']);
        unset($fields['status']);
        return $fields;
    }

    public static function pageTotal($provider, $fieldName)
    {
        $total = 0;
        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }
        return $total;
    }

    public static function userTotal($provider, $fieldName)
    {
        $total = 0;
        foreach ($provider as $item) {
            if (strtotime(date('Y-m-d', strtotime($item[$fieldName]))) == strtotime(date('Y-m-d'))) {
                $total += 1;
            }
        }
        return $total;
    }

    public static function randomOject($array, $number)
    {
        $keyrandom = array_rand($array, $number);
        $valueRandom = [];
        foreach ($keyrandom as $item) {
            array_push($valueRandom, $array[$item]);
        }
        return $valueRandom;
    }

    public static function UniqueRandomNumbersWithinRange($min, $max, $quantity, $numAnswerKey)
    {
        $numbers = range($min, $max);

        if (in_array($numAnswerKey, $numbers))
            shuffle($numbers);
        $numberOject = array_slice($numbers, 0, $quantity + 1);
        if (!in_array($numAnswerKey, $numberOject)) {
            $numberOject[1] = $numAnswerKey;
        }
        shuffle($numberOject);
        return $numberOject;
    }
}