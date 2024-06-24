<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

//Gestione chiamata APi
use Illuminate\Http\Request;
//Gateway di Braintree, una specie di intermediario di pagamento
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function managePayment(Request $request)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        //Assegno alla mia variabile l'input che mi arriva lato client nella mia request di Laravel
        $clientNonce = $request->input('paymentMethodNonce');

        //Creo un array associativo seguendo la struttua di BrainTree per la mia transazione
        //Utilizzo il metodo transaction di Gateway per accedere ai dati e sale per effettuare una transazione
        $newTransaction = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $clientNonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);


        //Se la transazione fa a buon fine
        if ($newTransaction->success) {
            return response()->json(['success' => true, 'transaction' => $newTransaction->transaction]);
        } else {
            return response()->json(['success' => false, 'message' => $newTransaction->message, 'transaction' => $newTransaction], 500);
        }
    }

    public function getToken(Request $request)
    {
        //Attraverso le mie credenziali genere un instanza gateway di BT 
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
        //Token di default
        //$token = "sandbox_9q3q5vsf_k7hty5rbd7vhxpms";

        //Utilizzo i metodi di BF per generare un token
        $token = $gateway->clientToken()->generate();
        
        //Lo restituisco
        return response()->json(['clientToken' => $token]);
    }
}
