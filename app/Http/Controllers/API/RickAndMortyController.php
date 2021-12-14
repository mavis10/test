<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Http;
use stdClass;
use function env;
use function view;

/**
 * Description of RickAndMontyController
 * This class makes a call to Rick and Morty API and renders the data in view
 * @author madhavi
 */
class RickAndMortyController extends Controller {

    /**
     * This function renders the view list of all Rick and Morty characters 
     * @return type view
     */
    public function index() {
        $responseRickyAndMortyAPIData = $this->callRickAndMortyapi();

        if ($responseRickyAndMortyAPIData->statusCode === 200) {
            $arrRickyAndMortyAPIData = $responseRickyAndMortyAPIData->data['results'];
            return view('rickyAndMorty.index', compact('arrRickyAndMortyAPIData'));
        }
        if ($responseRickyAndMortyAPIData->statusCode === 400) {
            $errorMessage = $responseRickyAndMortyAPIData->data['message'];
            return view('errors.400', compact('errorMessage'));
        }
    }

    /**
     *  Make call to Rick and Morty API
     * @return stdClass
     */
    protected function callRickAndMortyapi() {
        $resultObject = new stdClass();
        try {
            $response = Http::get(env('RICKY_AND_MORTY_API_URL'));
            $resultObject->statusCode = $response->status();
            $resultObject->data = $response->json();
        } catch (Exception $ex) {

            $resultObject->statusCode = 400;
            $resultObject->data = array('message' => $ex->getMessage());
        }
        return $resultObject;
    }

}
