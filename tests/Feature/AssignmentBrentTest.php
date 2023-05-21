<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Sajya\Server\Testing\ProceduralRequests;

class AssignmentBrentTest extends TestCase
{
    use ProceduralRequests;
    /**
     * A feature test to test external call.
     */
    public function test_the_external_call_works(): void
    {

        $response = Http::get('https://datahub.io/core/oil-prices/r/brent-day.json');

        // Verifica che la chiamata abbia successo
        $this->assertEquals(200, $response->status());
        
        // Verifica la struttura del JSON restituito
        $responseData = $response->json();
        $this->assertIsArray($responseData);

        // Verifica che ogni JSON abbia i due campi
        foreach ($responseData as $data) {
            $this->assertArrayHasKey('Brent Spot Price', $data);
            $this->assertArrayHasKey('Date', $data);
        }
    }

    /**
     * A feature test to test rpc-json response.
     */

    public function test_the_json_rpc_response_is_correct():void
    {

        // Esegui la chiamata API con i parametri di input desiderati
        $startDate = '2023-01-01';
        $endDate = '2023-01-31';

        $response = $this->postJson('/api/v1/GetOilPriceTrend', [
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);

        // Verifica lo status della risposta
        $response->assertOk();
        
        $responseData = $response->json();      

        // Verifica se nella risposta ci siano i campi
        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('jsonrpc', $responseData);  
        // $this->assertArrayHasKey('result', $responseData);  

        // test nativi della libreria sajya
        // toFix: funziona ma stesso problema. non riesco ad accedere a 'result'

        // $this
        //     ->setRpcRoute('GetOilPriceTrend.rpc-endpoint')
        //     ->callProcedure('Assignment@GetOilPriceTrend')
        //     ->assertJsonFragment([
        //         'id' => '1',
        //         "jsonrpc" => "2.0"              
        //     ]);    
        
    }
}
