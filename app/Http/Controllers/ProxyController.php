<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;


class ProxyController extends Controller
{
    public function index(){

        $proxy = 'proxy:gedik@proxy.gedik.edu.tr:3128';

        $client = new Client([
            'proxy' => $proxy,
            'timeout'  => 10.0,
        ]);

        try {
            $response = $client->request('GET', 'https://cabim.ulakbim.gov.tr/ekual/e-veri-tabanlari/universiteler-ve-polis-akademisinin-erisimine-acilan-veritabanlari/');
            $content = $response->getBody()->getContents();

            $stream = fopen('php://temp', 'r+');

            fwrite($stream, $content);
            rewind($stream);
            fpassthru($stream);
        } catch (RequestException $e) {
            dd($e);
        }
    }
}

//            'community'=> 'y',
//            'authtype' => 'ip',
//            'encid' => ' 22D731163C7635873776356632853C673253309374C377C379C375C373C376C370C331',
//            'selectServiceToken' => 'A2PqAKYYttkO0PNu8W9wGNOEYUUMiyXLoxLn3Ph2ipfNJESoCV5Svn3KuQki0y46hfC5vdzKYejGvcgHl80BnKbRh1faTCbQsIRgyALFWAu_DsK3VWLIrPASzFR_DGMWpMiDjpLISuvsn3xvZcqG487I9CLZ29V2Fq21eWXOCuJRCo1wyGT0kUFbpXjKpvipQbK4J9JFE_DSss0zS3hVEuLxAVtrDZ9onAKLAMS3cSt_0w2DQoRPuxw76pr7-zT_DPEE0MPZQOKcwVrnjyPKoHi-JA72KJiLZ-OVm9sJasBIvGYaeu7MBLspEnMPgJvSFGeFthHYtj9vXa-Kv6RT2OPojR_JtIBBE6LIg4GLfiHNA9WnE7qPqGcntzJBMM_Oflv-DRQLGGehMAK-1WKYZJg733nCOhahx3x4kd62dgma9-sDpig-ob7XBtl1ENNtRjxRJ3qAQStJshN0eGmDQL0AP1C3l7JxayXKizkFcO8BarY0Y4zq9ZsSaLv_DkSZec5t47BJkQkC_MmpmPQQnbVQoF9BqCtXfj-539bQmgj8WD9fD7xVvpTf7uGFsnHWxnWGGzwbT1gs1kmFWwr_cwSxdi-sLbROyqshU0topGxBIRhrlvA8qZWiCYD24rXBapLRY_sUp9HyDADYYY5DzqhR3DhIM2a2ZEMGHB9ecFDq3Tzuig5ljDejs4VbkDyVdrEDJC4Us7Fofz6UCVGZmwYY_J6pZh04JwPJKyCewTonS1jaKW7iXcvmPDWrtIQnaTaaTBvEEELBZs2i1DkxUU3E8BqtggReHdwHHGzeUc9bIAhJN7yoV95KJ-aGI8CwXcPj4P-NvMnXszZFVEipmzLj-kEGzD0gKwcSAe-lWFFeH6L536RF7QXBd0sa1SLYj7VVV0-Rk0la_LaIgL5tL4uOgZeaAbIi4qyoRTq6YRV8-8kpVtKhU_x0RHbu8VYV5wSNsj6SzUdDFml-OCIn2CVmyqfNaYDIZbAHVDaPIhTAmw',
//            'ugt' => '62E771363C2635273716350632253E6226E360D36413679369E325E333133603',
//            'stsug' => 'AmNVpTbooH7VLfsCBdYnxykyVcrAel6m2eFQ_anXINUQ9pyf3mAAsmA-AUzkC3ZNx5mhBYbLAxt1UNA1KXHRGTkezB7ueTV-oMMNIEIR5xY0q0wxYcVmfEzeGjKgOhAuGcf1A3zphbiKdtsOVXIPlzT1AGmzoDsL2oRnMZPW6Z4Rnd0',
//            'IsAdminMobile' => 'N',
