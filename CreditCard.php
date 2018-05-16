class CardDetection
{

    /**
     * Detects which card to use as MyGate requires a new number if this is in place.
     * Not being Used anymore
     * Only for MYGATE
     *
     * @param $card
     * @return mixed
     */
    public static function detectCard($card)
    {
        $actionTypeID = PaymentGateway::AUTHORISE;

        //visa
        $visa_regex = "/^4[0-9]{0,}$/";

        // MasterCard
        $mastercard_regex = "/^(5[1-5]|222[1-9]|22[3-9]|2[3-6]|27[01]|2720)[0-9]{0,}$/";

        // American Express
        $amex_regex = "/^3[47][0-9]{0,}$/";

        // Diners Club
        $diners_regex = "/^3(?:0[0-59]{1}|[689])[0-9]{0,}$/";

        //Discover
        $discover_regex = "/^(6011|65|64[4-9]|62212[6-9]|6221[3-9]|622[2-8]|6229[01]|62292[0-5])[0-9]{0,}$/";
        $cardType = 0;

        if (preg_match($amex_regex, $card)) {
            $cardType = self::CARD_AMEX;
        }

        if (preg_match($diners_regex, $card)) {
            $cardType = self::CARD_DINERS_CLUB;
        }

        if (preg_match($mastercard_regex, $card)) {
            $cardType = self::CARD_MASTERCARD;
        }

        if (preg_match($discover_regex, $card)) {
            $cardType = self::CARD_DISCOVER;
        }

        if (preg_match($visa_regex, $card)) {
            $cardType = self::CARD_VISA;
        }

        return $actionTypeID;
    }
}
