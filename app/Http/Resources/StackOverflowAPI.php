<?php

namespace App\Http\Resources;

class StackOverflowAPI
{
    var $endpoint_base = "https://api.stackexchange.com/2.3";
    var $filters = [];
    public function __construct( string $tagged )
    {
        $this->filters['tagged'] = $tagged;
    }
    public function getQuestionByTag( Request $request ){
        return $request;
    }
    public function getQuestions(){
        $url = "/questions?order=desc&sort=activity&site=stackoverflow";
        return $this->get_data_curl( $url, 'GET');
    }
    private function get_endpoint_with_filters( $endpoint ){
        $endpoint .= '&tagged='.$this->filters['tagged'];
        return $endpoint;
    }
    private function get_data_curl( $endpoint, $request, $dataRequest="" ){
        $header = array(  );
        $endpoint = $this->endpoint_base.$this->get_endpoint_with_filters( $endpoint );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $request,
            CURLOPT_POSTFIELDS => $dataRequest,
            CURLOPT_HTTPHEADER => $header,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, TRUE);
    }
}
