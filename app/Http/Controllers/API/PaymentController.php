<?php

namespace App\Http\Controllers;

//Gestione chiamata APi
use Illuminate\Http\Request;
//Gateway di Braintree, una specie di intermediario di pagamento
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function managePayment(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'k7hty5rbd7vhxpms',
            'publicKey' => 'z3mftxysm53qfs6m',
            'privateKey' => 'b49ef59f4e036c34775592ff6e6bda0f'
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
            //restitutisco una risposta json al client 
            return response()->json($newTransaction->transaction);
        } else {
            //Se no errore
            return response()->json(['error' => $newTransaction->message], 500);
        }
    }

    public function getToken(Request $request)
    {
        //Attraverso le mie credenziali genere un instanza gateway di BT 
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'k7hty5rbd7vhxpms',
            'publicKey' => 'z3mftxysm53qfs6m',
            'privateKey' => 'b49ef59f4e036c34775592ff6e6bda0f'
        ]);

        //Utilizzo i metodi di BF per generare un token
        $token = $gateway->clientToken()->generate();
        
        //Lo restituisco
        return response()->json(['clientToken' => $token]);
    }
}
