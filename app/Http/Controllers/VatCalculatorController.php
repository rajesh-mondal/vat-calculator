<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VatCalculatorController extends Controller {
    public function index() {
        return view( 'pages.vat_calculator' );
    }

    public function calculate( Request $request ) {
        $grossSum = $request->input( 'gross_sum' );
        $vatOperation = $request->input( 'vat_operation' );
        $taxPercentage = $request->input( 'tax_percentage' );

        if ( $vatOperation == 'exclude' ) {
            $vatAmount = round( $grossSum - ( $grossSum / ( 1 + ( $taxPercentage / 100 ) ) ), 2 );
        } else {
            $vatAmount = round( $grossSum * ( $taxPercentage / 100 ), 2 );
        }

        return view( 'pages.vat_calculator' )->with( 'vatAmount', $vatAmount );
    }
}
