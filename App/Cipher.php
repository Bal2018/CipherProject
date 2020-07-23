<?php

declare(strict_types=1);

namespace App;
class Cipher extends CipherBaseClass
{
    public function CiperText($inputText, $key, $cipherType)
    {
        echo "<INPUT=> $inputText><KEY=> $key><TYPE=> $cipherType> .\n";

        if ($cipherType <> "E") {
            $key = 26 - $key;
       }
        $outputText = "";
        $inputArray = str_split($inputText);

        foreach ($inputArray as $inputChar) {
            if (!ctype_alpha($inputChar)) {
                $cipheredChar = $inputChar;
            } else {
                $offsetValue = ord(ctype_upper($inputChar) ? 'A' : 'a');

                $ciperAsciiValue = ord($inputChar) + $key;
                $ciperAsciiValue = $ciperAsciiValue - $offsetValue;
                $ciperAsciiValue = $ciperAsciiValue % 26;
                $ciperAsciiValue = $ciperAsciiValue + $offsetValue;
                $cipheredChar = chr($ciperAsciiValue);
            }
            $outputText .= $cipheredChar;
        }
        return $outputText;
    }
}