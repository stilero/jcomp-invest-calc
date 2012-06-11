<?php
/**
 * Description of investment
 *
 * @author Daniel Eliasson - joomla at stilero.com
 */
class Investment {
    var $investment;
    var $years;
    var $interestRate;
    var $residualValue;
    var $paymentBalances = array();
    var $results;
    var $error;
    
    public function __construct() {

        $this->error = false;
    }
    /**
     *
     * @param int $years
     * @param int $rate
     * @param int $value
     * @return int (false on error) 
     */
    public static function presentValue($years, $rate, $value, $round=true){
        if( !is_integer($years) || !is_integer($rate) || !is_integer($value) ){
            return false;
        }
        $presentRate = self::presentRate($years, $rate);
        $presentValueFactor = 1 / $presentRate;
        $presentValue = $presentValueFactor * $value;
        $roundedPresentVal = ($round)?round($presentValue, 0) : $presentValue;
        return $roundedPresentVal;
    }
    
    public static function presentValueForYearlyPayments($years, $rate, $valuePerYear){
//        if( !is_integer($years) || !is_integer($rate) || !is_integer($valuePerYear) ){
//            return false;
//        }
        $presentValue = 0;
        $totalRate = 0;
        for($i=1;$i<=$years;$i++){
            //$presentValue += self::presentValue($i, $rate, $valuePerYear, FALSE);
            $totalRate += 1 / self::presentRate($i, $rate);
        }
        $presentValue = $valuePerYear * $totalRate;
        $roundedPresentVal = round($presentValue, 0);
        return $roundedPresentVal;
    }
    /**
     *
     * @param int $years
     * @param int $rate
     * @return int (false on error) 
     */
    public static function presentRate($years, $rate){
        if( !is_integer($years) || !is_integer($rate)){
            return false;
        }
        $rateAsFloat = $rate / 100;
        $presentRate = pow( 1 + $rateAsFloat, $years );
        return $presentRate;
    }
    /**
     *
     * @param int $investment initial cost of investment
     * @param int $years economic lifetime of investment (likely 3-10 years)
     * @param int $rate interestRate in percent (1-100) for best alternative placement
     * @param array $paymentBalances Array with balance for every year (yearly revenue - yearly cost)
     * @param int $residualValue Residual value after economic lifetime. ie what can you sell the investment for after the lifetime.
     */
    public function investmentProfit($investment, $years, $rate, $paymentBalances, $residualValue = 0){
//        $this->investment = $investment;
//        $this->years = $years;
//        $this->interestRate = $rate;
//        $this->residualValue = $residualValue;
//        $this->paymentBalances = $paymentBalances;
        $results = array();
        $presValBalances = array();
        $result = -1 * $investment;
        $results['investment'] = $result;
        for($i=0;$i<$years;$i++){
            $currentYear = $i +1;
            $balance = isset($paymentBalances[$i])? (int)$paymentBalances[$i] : 0;
            $presentBalanceValue = self::presentValue((int)$currentYear, (int)$rate, $balance);
            $presValBalances[]=$presentBalanceValue;
            $result += $presentBalanceValue;
        }
        $currentResidualVal = self::presentValue($years, $rate, $residualValue);
        $result += $currentResidualVal;
        $roundedResult = round($result, 0);
        $results['presValBalances'] = $presValBalances;
        $results['balances'] = $this->paymentBalances;
        $results['curValResidual'] = $currentResidualVal;
        $results['result'] = $roundedResult;
        $this->results = $results;
        return $roundedResult;
    }
}

?>
