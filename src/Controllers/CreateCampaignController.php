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
 

 
class CreateCampaignController extends ControllerBase
{
    public function initialize(): void
    {
        $this->view->setTemplateBefore('private');
    }

     
    public function indexAction(): void
    {

        $identity = $this->session->get('auth-identity');
        $this->view->setVar('results', '' );
          
    }


    
    public function createAction(): void
    {
        $identity = $this->session->get('auth-identity');
        if ($this->request->isPost()) {
              
            $data = '{"name": "'. $this->request->getPost('campaign-name', 'striptags').'",';
            $data .= '"direction": "'. $this->request->getPost('direction-campaign-type', 'striptags').'",';
            $data .= '"rate_model": "scpa",';
            $data .= '"target_url": "'. $this->request->getPost('target-url', 'striptags').'",';
            $data .= '"status": '. $this->request->getPost('campaign-status', 'striptags').',';
            $data .= '"started_at": "'. $this->request->getPost('start-date', 'striptags').'",';
            $data .= '"expired_at": "'. $this->request->getPost('expiry-date', 'striptags').'",';
            $data .= '"is_adblock_buy": '. $this->request->getPost('is-adblock-buy', 'striptags').', ';
            $data .= '"targeting": {"traffic_categories":["propeller"],';
            $data .= '"country": {"list": [';
                    
                foreach ( $this->request->getPost('target-countries', 'striptags') as $country) {
                    $data .= '"'.$country.'",';
                }

            $data = rtrim($data, ',');
            $data .= '],"is_excluded": false},"time_table": {"list": ["Mon00"],"is_excluded": false}},';
            $data .= '"timezone": '. $this->request->getPost('time-zone', 'striptags').',"rates": [{"countries": [';

                foreach ( $this->request->getPost('target-countries', 'striptags') as $country) {
                    $data .= '"'.$country.'",';
                }

            $data = rtrim($data, ',');
            $data .= '],"amount": '. $this->request->getPost('rate-amount', 'striptags').'}]}';

            $headers = array('Content-Type' => 'application/json', 'Authorization' => 'Bearer '.$identity['orgApi']);
            $response = \Requests::post( $this->getDI()->get('config')->apiBase.'/adv/campaigns', $headers, $data ); 
            $response_body_raw = $response->body; 
            $response_body = json_decode( $response_body_raw );                                                                                   


            if( !isset($response) ){
                $this->view->setVar('results', 'No response received from api server' );
            }                                             
             elseif( $response->status_code == 201 ){

                if( property_exists( $response_body, 'errors') ){

                    $msg = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <button type=\"button\" class=\"close\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                    Error: Campaign details not saved. Error triggered </div>";
                    $this->view->setVar('results', $msg );

                } else {

                    $campaign_id = 0;
                    foreach ($response_body as $idx => $res) {
                        $campaign_id = $res->id;
                    }
 
                    $datacreatives = '{"creatives": [';
                    $datacreatives .= '{"title": "'. $this->request->getPost('creative-title', 'striptags').'","description": "'. $this->request->getPost('creative-description', 'striptags').'"';
                    
                    $errors=array();
                    $allowed_ext= array('jpg','jpeg','png','gif');

                        if( isset( $_FILES["creative-icon"]["tmp_name"] )) {

                            $file_name =$_FILES['creative-icon']['name']; 
                            $file_size=$_FILES['creative-icon']['size'];
                            $file_tmp= $_FILES['creative-icon']['tmp_name'];
                            $file_ext = strtolower( end(explode('.',$file_name))); 

                            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);

                            if( in_array($file_ext, $allowed_ext) === false)
                            {
                                $theicon = 'null';
                            } else {

                                $dataa = file_get_contents($file_tmp);
                                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($dataa);  
                                $datacreatives .= ',"icon": "'.$base64.'"';

                            }

                        }

                            if( isset( $_FILES["creative-image"]["tmp_name"] )) {
 
                                $file_nameb =$_FILES['creative-image']['name']; 
                                $file_sizeb=$_FILES['creative-image']['size'];
                                $file_tmpb= $_FILES['creative-image']['tmp_name'];
                                $file_extb = strtolower( end(explode('.',$file_nameb))); 

                                $typeb = pathinfo($file_tmpb, PATHINFO_EXTENSION);

                                if( in_array($file_extb, $allowed_ext) === false)
                                {
                                    $errors[]='Extension not allowed';
                                } else {

                                    $datab = file_get_contents($file_tmpb);
                                    $base64b = 'data:image/' . $typeb . ';base64,' . base64_encode($datab);
                                    $datacreatives .= ',"image": "'.$base64b.'"}';

                                }
 
                            }
  
                        
                    $datacreatives .= '] }';

                                           

                    $response2 = \Requests::post( $this->getDI()->get('config')->apiBase.'/adv/campaigns/'.$campaign_id.'/creatives', $headers, $datacreatives ); 
                    $response2_body_raw = $response2->body; 
                    $response2_body = json_decode( $response2_body_raw );

                    if( $response2->status_code == 200 ){
                        $msg =  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                        <button type=\"button\" class=\"close\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                        Successfully created the new compaign and creatives
                        </div>"; 
                        $this->view->setVar('results', $msg );
                    }
                    else {

                        $msg =  "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                        <button type=\"button\" class=\"close\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                        Successfully created the new compaign without creatives
                        </div>";
                        $this->view->setVar('results', $msg );
                    }

                }
 

            } else {

                $msg = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <button type=\"button\" class=\"close\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                    Error: Campaign details not saved </div>";
                $this->view->setVar('results', $msg );
            }
            

             
        } else {
            $msg = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <button type=\"button\" class=\"close\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                    Unauthorized access </div>";
            $this->view->setVar('caughtError', $msg );
        }

        
        
    }


}
