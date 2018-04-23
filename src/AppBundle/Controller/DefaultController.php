<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Data;
use AppBundle\Entity\Exchange;
use AppBundle\Entity\PairMap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $allData = $this->getDoctrine()
            ->getRepository(Data::class)
            ->findBy(array(), array("id"=>'DESC'));
        return $this->render('pages/data.html.twig', array(
            'allData' => $allData
        ));
    }

    /**
     * @Route("/api/binance", name="binance")
     */
    public function getFromBinance(Request $request){

        $exchangeId = 1;

        $pairs = $this->getDoctrine()
            ->getRepository(PairMap::class)
            ->findBy(
                array('exchange' => $exchangeId)
            );

        if (sizeof($pairs) > 0){
            foreach ($pairs as $pair){
                $pairSymbol = $pair->getSymbol();
                $symbolPair = $pair->getSymbolPair();
                $exchange = $pair->getExchange();
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.binance.com/api/v1/klines?symbol=$pairSymbol&interval=1m",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "postman-token: 67f85662-0c24-7305-3831-85baaeb9ae4a"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $response = json_decode($response);

//                    var_dump($response);
                    /**
                    1499040000000,      // Open time
                    "0.01634790",       // Open
                    "0.80000000",       // High
                    "0.01575800",       // Low
                    "0.01577100",       // Close
                    "148976.11427815",  // Volume
                    1499644799999,      // Close time
                    "2434.19055334",    // Quote asset volume
                    308,                // Number of trades
                    "1756.87402397",    // Taker buy base asset volume
                    "28.46694368",      // Taker buy quote asset volume
                    "17928899.62484339" // Ignore
                     */

                    $count = sizeof($response);
                    $timeStamp = $response[$count - 1][0];
                    $high = $response[$count - 1][2];
                    $low = $response[$count - 1][3];
                    $close = $response[$count - 1][4];
                    $volume = $response[$count - 1][5];

                    $data = new Data();
                    $data->setDateTime($timeStamp);
                    $data->setHigh(floatval($high));
                    $data->setLow(floatval($low));
                    $data->setClose(floatval($close));
                    $data->setVolume(floatval($volume));
                    $data->setSma20(0);
                    $data->setSma(0);
                    $data->setBbUpper(0);
                    $data->setBbLower(0);
                    $data->setEma(0);
                    $data->setMacd(0);
                    $data->setMacdSignal(0);
                    $data->setCloseGainLoss(0);
                    $data->setRsi(0);


                    $data->setExchange($exchange);
                    $data->setSymbolPair($symbolPair);

                    $entityManager = $this->getDoctrine()->getManager();

                    // tells Doctrine you want to (eventually) save the Product (no queries yet)
                    $entityManager->persist($data);
                    $entityManager->flush();
                }
            }
        }

        $status = array("status"=>"OK");
        return new JsonResponse($status);
    }
}
