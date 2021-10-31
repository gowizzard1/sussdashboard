<?php
declare(strict_types=1);
/**
 * This file is part of Siwebapp.
 *
 * (c) Sobbayi Interactive Team <developers@sobbayi.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Siwebapp\Controllers;

use Siwebapp\Providers\NumTagProvider;
use Phalcon\Http\Request; //coz not in an Action


/**
 * Display the "Dashboard" page.
 */ 
class DashboardController extends ControllerBase
{
    public function initialize(): void
    { 
        $this->view->setTemplateBefore('private');
    }

    
    public function indexAction(): void
    {
        $this->view->NumTag = new NumTagProvider(); 
        $identity = $this->session->get('auth-identity');
         
            try {
                // 09/06/2021 - 26/06/2021
                
                if ( null !== $this->request->getPost('dashdatefilter') ) {

                    $thedate = $this->request->getPost('dashdatefilter');

                    $split_dates = explode( ' - ', $thedate);

                    $datestart = \DateTime::createFromFormat( 'd/m/Y', $split_dates[0] );
                    $dateend = \DateTime::createFromFormat( 'd/m/Y', $split_dates[1] );
  
                    $identity['startDate'] = $datestart->format('Y-m-d');
                    $identity['endDate'] = $dateend->format('Y-m-d');

                    $displayDateStart = $datestart->format('d/m/Y');
                    $displayDateEnd = $dateend->format('d/m/Y');

                    $this->view->setVar('splitDate0', $displayDateStart );  
                    $this->view->setVar('splitDate1', $displayDateEnd );
                    $this->view->setVar('fullDate', $displayDateStart . ' - '. $displayDateEnd ); 
 
   
                } else {

                    $displayDateStart = \DateTime::createFromFormat( 'Y-m-d', $identity['startDate'] );
                    $displayDateEnd = \DateTime::createFromFormat( 'Y-m-d', $identity['endDate'] ); 
                    $displayDateStart = $displayDateStart->format('d/m/Y');
                    $displayDateEnd = $displayDateEnd->format('d/m/Y'); 

                    $this->view->setVar('splitDate0', $displayDateStart );  
                    $this->view->setVar('splitDate1', $displayDateEnd );
                    $this->view->setVar('fullDate', $displayDateStart . ' - '. $displayDateEnd); 
  
                }
                              
                $the_start_date = $identity['startDate'];
                $the_end_date = $identity['endDate'];   

                 file_put_contents("data1.txt", $the_start_date . ' - ' . $the_end_date);
                $headers = array('Content-Type' => 'application/json', 'Authorization' => 'Bearer '. $identity['orgApi']);

                $data = '{
                    "group_by": "campaign_id",
                    "day_from": "'.$the_start_date.'",
                    "day_to": "'.$the_end_date.'"}';
   
                
                $response = \Requests::post( $this->getDI()->get('config')->apiBase .'/adv/statistics', $headers, $data );
                $response_body_raw = $response->body; 
                $response_body = json_decode( $response_body_raw ); 

				// -----------------new Code-------------------
				$propellaReport = $response_body;
				$propellaCampaignReport = [];
				foreach($propellaReport as $campaign){
					$propellaCampaignReport[] = new CampaignReport(
						$campaign->campaign_id,
						$campaign->campaign_name,
						$campaign->impressions,
						$campaign->clicks,
						$campaign->cpm,
						$campaign->cpc,
						$campaign->ctr,
						$campaign->money,
						$campaign->conversions,
						$campaign->cr);
				}
				
				
				$campaignReport = array_merge($propellaCampaignReport, array());
				
				// --------------------------------------------
                
				
				// Changed from $response_body to $campaignReport
				$this->view->setVar('campaigns', $campaignReport);
                  
            }
            catch (Exception $e) { 
                  
                $this->view->setVar('caughtError', $e->getMessage());
            
            }
    }
	
	public function getEskimiData($dateFrom, $dateTo){
		try{
			$accessToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQ0MzIzZWMzMGUyNGEzM2E4ZGY4YzAzODA4ZGRiNTM3YmQyMmYzMTcxMGY2MzRhYWJmZTdlNjcwOGUwOThkNGYyYTc4NGYyZWNmNWExY2ZkIn0.eyJhdWQiOiIyMDUiLCJqdGkiOiJkNDMyM2VjMzBlMjRhMzNhOGRmOGMwMzgwOGRkYjUzN2JkMjJmMzE3MTBmNjM0YWFiZmU3ZTY3MDhlMDk4ZDRmMmE3ODRmMmVjZjVhMWNmZCIsImlhdCI6MTYzNTA2MTAxMiwibmJmIjoxNjM1MDYxMDEyLCJleHAiOjE2NjY1OTcwMTEsInN1YiI6IjEwNSIsInNjb3BlcyI6W119.uDDyc1bGhwokLnvTt3kyxbQfCKziVNjy1W6G6EketjIVBD2iduORbYcVQxya3EWvFiu8WyfHhX7rj89hCprt0GFP6LKNrtmA42Ys9_85Obm5EzZNP4Dt1WY5u4GyLiVgU6L-GmXPQGotFqWcy7PBuVt98UCDyaiok4cgI_Qf3oZWaTcGRLOa8a4vVBULzktFf6h4CgKdyLyZ-VTBBipkKa8tuM_GTM_W6vGCSxD2nmsb802b8EWNRF67FOqVcXIgKKCEm79h_N-l4X4SL_NhAnIvc45zwptWlywwL2_AoyAHOkxatejR65wuIeNR3fhVpIox_BQTjXMZU_eV3YwOS5qAaJYFJHMHgZ7uA5POEtpNu0JXOh2h17C7dTg2UGD-Mzah8eBslJdWwyS5UqaBomRoLH3BR-ApFuiGlNl9_9sMLi3mPJnDKJ3rl5Tp8lCOGxVSznQRxZVJH0CBlFCHM_qAfdmyAIJh0WKHjMs65-p8kURgzFOsC9E4PUIbWLai7m9WpctqbXewXbIyHjK4Hajw-33pikKKVdZtW1qHdojn2dqJFSAPsRREVTLHXp4TOiAkSEyl89xO07VlpWxsfPpLJjG_fiCeDlLgjXdHQg8cTUaPwjTiknx_OwPgejiCppT3z73Gr9ecAh7BGY44ak89qobOsH0hvXW8f93DoeM";
			$postData = array(
				'byCampaign' => true,
				'dateFrom' => "2021-08-01",
				'dateTo' => "2021-08-01"
			);
			$ch = curl_init($this->getdi()->get('config')->eskimiApiBase ."/api/v1/report/adPlacementPositions/get");
			curl_setopt_array($ch, array(
				CURLOPT_POST => TRUE,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer'.$accessToken,
					'Content-Type: application/json'
				),
				CURLOPT_POSTFIELDS => json_encode($postData)
			));

			// Send the request
			$response = curl_exec($ch);

			// Check for errors
			if($response === FALSE){
				die(curl_error($ch));
			}

			// Decode the response
			$responseData = json_decode($response, TRUE);
			$eskimiCampaignReport = [];
			foreach($eskimiReport as $campaign){
						$eskimiCampaignReport[] = new CampaignReport(
							$campaign->campaign_id,
							$campaign->campaign_name,
							$campaign->impressions,
							$campaign->clicks,
							$campaign->cpm,
							$campaign->cpc,
							$campaign->ctr,
							$campaign->spent,
							0,
							0);
			}
			
			return $eskimiCampaignReport;
		} 
		catch (Exception $e) { 
                  
                $this->view->setVar('caughtError', $e->getMessage());
            
		}
	}
	
	public function getEskimiToken(){
		$tokenheaders = array();
		$gettokendata = '{
                    "grant_type" : "'.$this->getdi()->get('config')->eskimi_grantType.'",
					"username" : "'.$this->getdi()->get('config')->eskimi_username.'",
					"password" : "'.$this->getdi()->get('config')->eskimi_password.'",
					"client_id" : "'.$this->getdi()->get('config')->eskimi_clientId.'",
					"client_secret" : "'.$this->getdi()->get('config')->eskimi_clientSecret.'"}';
		
		$tokenresponse = \Requests::post( $this->getdi()->get('config')->eskimi_apiBase .'/oauth/token', $tokenheaders, $gettokendata );
		$tokenresponse_body_raw = $response->body; 
        $tokenresponse_body = json_decode( $tokenresponse_body_raw ); 
		return $tokenresponse_body->access_token;
	}
	
	public function getEskimiStats($dateFrom, $dateTo){
		$eskimiCampaignReport = [];
		if(true){
			$eskimiCampaignReport[] = new CampaignReport(
						1,
						$dateFrom,
						246504,
						1449,
						58.3,
						9.918,
						0.588,
						14371.221,
						0,
						0);
			//return $eskimiCampaignReport;
		}
		// get token
		$accessToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQ0MzIzZWMzMGUyNGEzM2E4ZGY4YzAzODA4ZGRiNTM3YmQyMmYzMTcxMGY2MzRhYWJmZTdlNjcwOGUwOThkNGYyYTc4NGYyZWNmNWExY2ZkIn0.eyJhdWQiOiIyMDUiLCJqdGkiOiJkNDMyM2VjMzBlMjRhMzNhOGRmOGMwMzgwOGRkYjUzN2JkMjJmMzE3MTBmNjM0YWFiZmU3ZTY3MDhlMDk4ZDRmMmE3ODRmMmVjZjVhMWNmZCIsImlhdCI6MTYzNTA2MTAxMiwibmJmIjoxNjM1MDYxMDEyLCJleHAiOjE2NjY1OTcwMTEsInN1YiI6IjEwNSIsInNjb3BlcyI6W119.uDDyc1bGhwokLnvTt3kyxbQfCKziVNjy1W6G6EketjIVBD2iduORbYcVQxya3EWvFiu8WyfHhX7rj89hCprt0GFP6LKNrtmA42Ys9_85Obm5EzZNP4Dt1WY5u4GyLiVgU6L-GmXPQGotFqWcy7PBuVt98UCDyaiok4cgI_Qf3oZWaTcGRLOa8a4vVBULzktFf6h4CgKdyLyZ-VTBBipkKa8tuM_GTM_W6vGCSxD2nmsb802b8EWNRF67FOqVcXIgKKCEm79h_N-l4X4SL_NhAnIvc45zwptWlywwL2_AoyAHOkxatejR65wuIeNR3fhVpIox_BQTjXMZU_eV3YwOS5qAaJYFJHMHgZ7uA5POEtpNu0JXOh2h17C7dTg2UGD-Mzah8eBslJdWwyS5UqaBomRoLH3BR-ApFuiGlNl9_9sMLi3mPJnDKJ3rl5Tp8lCOGxVSznQRxZVJH0CBlFCHM_qAfdmyAIJh0WKHjMs65-p8kURgzFOsC9E4PUIbWLai7m9WpctqbXewXbIyHjK4Hajw-33pikKKVdZtW1qHdojn2dqJFSAPsRREVTLHXp4TOiAkSEyl89xO07VlpWxsfPpLJjG_fiCeDlLgjXdHQg8cTUaPwjTiknx_OwPgejiCppT3z73Gr9ecAh7BGY44ak89qobOsH0hvXW8f93DoeM";
		$headers = array('Content-Type' => 'application/json', 'Authorization' => 'Bearer '. $accessToken);
		// get stats
		$data = '{
                    "group_by": "campaign_id",
                    "day_from": "'.$dateFrom.'",
                    "day_to": "'.$dateTo.'"}';
			
		$data = '{
			"byCampaign": true,
			"dateFrom": "2021-08-01",
			"dateTo": "2021-08-01"}';
   
				
		$response = \Requests::post( $this->getDI()->get('config')->eskimiApiBase .'/api/v1/report/adPlacementPositions/get', $headers, $data );
		
		$response_body_raw = $response->body; 
		$eskimiReport = json_decode( $response_body_raw ); 
		
		foreach($eskimiReport as $campaign){
					$eskimiCampaignReport[] = new CampaignReport(
						$campaign->campaign_id,
						$campaign->campaign_name,
						$campaign->impressions,
						$campaign->clicks,
						$campaign->cpm,
						$campaign->cpc,
						$campaign->ctr,
						$campaign->spent,
						0,
						0);
		}
		
		return eskimiCampaignReport;
	}

    public function detailsAction($getId): void
    {
        $this->view->NumTag = new NumTagProvider(); 
        $identity = $this->session->get('auth-identity');

        try {
                                                                    
            $headers = array('Content-Type' => 'application/json', 'Authorization' => 'Bearer '.$identity['orgApi']);
            $response = \Requests::get( $this->getDI()->get('config')->apiBase.'/adv/campaigns/'.$getId, $headers);
            $response_body_raw = $response->body; 
            $response_body = json_decode( $response_body_raw );
 
            $this->view->setVars([
                    'id' => $getId,
                    'campaignStatus' => $this->getDI()->get('config')->campaignStatus,
                    'campaignDirectionId' => $this->getDI()->get('config')->campaignDirectionId,
                    'campaignIsArchived' => $this->getDI()->get('config')->campaignIsArchived,
                    'userStatus' => $this->getDI()->get('config')->userStatus,
                    'policyStatus' => $this->getDI()->get('config')->policyStatus,
                    'campaigns' => $response_body, 
            ]);
 
        } catch ( Exception $e ) { 
              
            $this->view->setVar('caughtError', $e->getMessage());

        }
 
    }

    public function targetingAction($getId): void
    {
        $this->view->NumTag = new NumTagProvider(); 
        $identity = $this->session->get('auth-identity');

        try {
                                                                     
            $headers = array('Content-Type' => 'application/json', 'Authorization' => 'Bearer '.$identity['orgApi']);
            $response = \Requests::get( $this->getDI()->get('config')->apiBase.'/adv/campaigns/'.$getId.'/targeting/include/', $headers);
            $response_body_raw = $response->body; 
            $response_body = json_decode( $response_body_raw );
 
            $this->view->setVar('id', $getId);
            $this->view->setVar('campaigns', $response_body);
 
        } catch ( Exception $e ) { 
              
            $this->view->setVar('caughtError', $e->getMessage());
                
        }
 
    }

    public function dateCtrlStartDate()
    {
        $start = $this->session->get('auth-identity');
        return $start['startDate']; 
    }
    
    public function dateCtrlEndDate()
    {
        $end = $this->session->get('auth-identity');
        return $end['endDate'];
    }
    

}

class CampaignReport{
	public $campaign_id;
	public $campaign_name;
	public $impressions;
	public $clicks;
	public $cpm;
	public $cpc;
	public $ctr;
	public $money;
	public $conversions;
	public $cr;
	
	
	function __construct($campaign_id, $campaign_name, $impressions, $clicks, $cpm, $cpc, $ctr, $spends, $conversions, $cr){
		$this->campaign_id = $campaign_id;
		$this->campaign_name = $campaign_name;
		$this->impressions = $impressions;
		$this->clicks = $clicks;
		$this->cpm = $cpm;
		$this->cpc = $cpc;
		$this->ctr = $ctr;
		$this->money = $spends;
		$this->conversions = $conversions;
		$this->cr = $cr;
	}
}
