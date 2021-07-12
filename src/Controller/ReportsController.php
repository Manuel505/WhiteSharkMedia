<?php

namespace App\Controller;

use MongoDB;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportsController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
       $collection = (new MongoDB\Client)->demo_db->Accounts;
       $pipeline =[['$match'=>['status'=>'ACTIVE']],
       ['$lookup'=>['from'=>'Metrics','pipeline'=>[['$group'=>['_id'=>'$accountId','totalClick'=>['$sum'=>'$clicks'],'totalSpend'=>['$sum'=>'$spend'],'totalImpressions'=>['$sum'=>'$impressions'],'countclick'=>['$sum'=>1]]],['$addFields'=>['costPerClick'=>['$divide'=>['$totalSpend','$totalClick']]]]], 'as'=>'Metrics']],
      ['$sort'=>['Metrics.totalSpend'=>-1]]];
    $out =  $collection->aggregate($pipeline)->toArray();
        return $this->render('reports/index.html.twig', [
            'controller_name' => 'ReportsController',
            'Accounts'=> $out ,
        ]);
    }
    
     /**
     * @Route("/{id}", name="getelement")
     */
    public function getelement($id): Response
    {
       $collection = (new MongoDB\Client)->demo_db->Accounts;
       $pipeline =[['$match'=>['status'=>'ACTIVE','accountId'=>$id]],
       ['$lookup'=>['from'=>'Metrics','pipeline'=>[['$group'=>['_id'=>'$accountId','totalClick'=>['$sum'=>'$clicks'],'totalSpend'=>['$sum'=>'$spend'],'totalImpressions'=>['$sum'=>'$impressions'],'countclick'=>['$sum'=>1]]],['$addFields'=>['costPerClick'=>['$divide'=>['$totalSpend','$totalClick']]]]], 'as'=>'Metrics']],
      ['$sort'=>['Metrics.totalSpend'=>-1]]];
    $out =  $collection->aggregate($pipeline)->toArray();
        return $this->render('reports/index.html.twig', [
            'controller_name' => 'ReportsController',
            'Accounts'=> $out ,
        ]);
    }
 

     
}
