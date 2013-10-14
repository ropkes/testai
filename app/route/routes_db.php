<?php

use Swagger\Annotations as SWG;

/**
 * Db test controller
 * @SWG\Resource(
 *		apiVersion="0.1",
 *      resourcePath="/v1/dbtest",
 *		swaggerVersion="1.1",
 *		basePath="/v1",
 *      @SWG\Api(
 *          path="http://88.119.193.169:8001/v1/dbtest.{format}",
 *          @SWG\Operation(
 *				httpMethod="GET",
 *				summary="Check if db working",
 *				nickname="checkdb"
 *          )
 *      )
 * )
*/
$app->get('/v1/dbtest', function() use ($app){
   include '../app/action/db-get.php';
});

$app->get('/crash', function() use ($app)
{
   throw new Exception("Test Exception For Error Handling", 1);
   
});