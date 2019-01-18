<?php
set_time_limit(60*60*10); // 10 hodin

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/XMLRPC_JSON_clean.php';

dibi::connect([
    'driver'   => 'mysqli',
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '*********',
    'database' => 'newKeywords',
    'charset'  => 'utf8',
]);


$keywordsToDownload = dibi::query("SELECT [keyword] FROM [seed_keywords] ")->fetchAll();
// print_r($keywordsToDownload);

foreach ($keywordsToDownload as $key => $value) {
  $cc = new JsonSklik();
  $keyword = (string) $value['keyword'];
  $allData = [];
  $data = $cc->request($keyword, 0, 1);


  $total = $data->total;
  $runs = (int) $total / 10000;
  $runs++;
  $runs =  ($runs > 10) ? 10 : $runs;
  $aData = array();
  $recordsCounter = 0;
  $limitToDB = 100;
  $columns = '';
  $columns_set = FALSE;

  for ($i=0; $i < $runs; $i++) {
    $data = $cc->request($keyword, $i*10000, 10000);

    if ($data->status == 200 && $data->total > 0 ){


      foreach ($data->suggestions as $key => $query ) {

        if ($columns_set === FALSE) {
            $columns = array( // nastaveni nayvu lsoupcu pro on duplicate key update
              $query->searchCountInTime[0]->timePeriod,
              $query->searchCountInTime[1]->timePeriod,
              $query->searchCountInTime[2]->timePeriod,
              $query->searchCountInTime[3]->timePeriod,
              $query->searchCountInTime[4]->timePeriod,
              $query->searchCountInTime[5]->timePeriod,
              $query->searchCountInTime[6]->timePeriod,
              $query->searchCountInTime[7]->timePeriod,
              $query->searchCountInTime[8]->timePeriod,
              $query->searchCountInTime[9]->timePeriod,
              $query->searchCountInTime[10]->timePeriod,
              $query->searchCountInTime[11]->timePeriod,
              'diff-' .$query->searchCountInTime[1]->timePeriod,
              'diff-' .$query->searchCountInTime[2]->timePeriod,
              'diff-' .$query->searchCountInTime[3]->timePeriod,
              'diff-' .$query->searchCountInTime[4]->timePeriod,
              'diff-' .$query->searchCountInTime[5]->timePeriod,
              'diff-' .$query->searchCountInTime[6]->timePeriod,
              'diff-' .$query->searchCountInTime[7]->timePeriod,
              'diff-' .$query->searchCountInTime[8]->timePeriod,
              'diff-' .$query->searchCountInTime[9]->timePeriod,
              'diff-' .$query->searchCountInTime[10]->timePeriod,
              'diff-' .$query->searchCountInTime[11]->timePeriod
            );
            $columns_set = TRUE;
        }



        if (mb_strlen((string) $query->query, 'UTF-8') > 100 ) { // nechci fraze pres 100 znaku
          continue;
        }
         //echo $query->query."<br>";
         $allData['seed_keyword%s'][] = (string) $keyword;
         $allData['keyword%s'][] = (string) $query->query;
         $allData['search_count%i'][] = (integer) $query->avgSearchCount;
         $allData['cpc%f'][] = (double) $query->cpc;
         $allData[ $query->searchCountInTime[0]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[0]->searchCount;
         $allData[ $query->searchCountInTime[1]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[1]->searchCount;
         $allData[ $query->searchCountInTime[2]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[2]->searchCount;
         $allData[ $query->searchCountInTime[3]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[3]->searchCount;
         $allData[ $query->searchCountInTime[4]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[4]->searchCount;
         $allData[ $query->searchCountInTime[5]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[5]->searchCount;
         $allData[ $query->searchCountInTime[6]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[6]->searchCount;
         $allData[ $query->searchCountInTime[7]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[7]->searchCount;
         $allData[ $query->searchCountInTime[8]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[8]->searchCount;
         $allData[ $query->searchCountInTime[9]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[9]->searchCount;
         $allData[ $query->searchCountInTime[10]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[10]->searchCount;
         $allData[ $query->searchCountInTime[11]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[11]->searchCount;
         $allData['diff-' .$query->searchCountInTime[1]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[1]->searchCount - (integer) $query->searchCountInTime[0]->searchCount;
         $allData['diff-' .$query->searchCountInTime[2]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[2]->searchCount - (integer) $query->searchCountInTime[1]->searchCount;
         $allData['diff-' .$query->searchCountInTime[3]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[3]->searchCount - (integer) $query->searchCountInTime[2]->searchCount;
         $allData['diff-' .$query->searchCountInTime[4]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[4]->searchCount - (integer) $query->searchCountInTime[3]->searchCount;
         $allData['diff-' .$query->searchCountInTime[5]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[5]->searchCount - (integer) $query->searchCountInTime[4]->searchCount;
         $allData['diff-' .$query->searchCountInTime[6]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[6]->searchCount - (integer) $query->searchCountInTime[5]->searchCount;
         $allData['diff-' .$query->searchCountInTime[7]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[7]->searchCount - (integer) $query->searchCountInTime[6]->searchCount;
         $allData['diff-' .$query->searchCountInTime[8]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[8]->searchCount - (integer) $query->searchCountInTime[7]->searchCount;
         $allData['diff-' .$query->searchCountInTime[9]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[9]->searchCount - (integer) $query->searchCountInTime[8]->searchCount;
         $allData['diff-' .$query->searchCountInTime[10]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[10]->searchCount - (integer) $query->searchCountInTime[9]->searchCount;
         $allData['diff-' .$query->searchCountInTime[11]->timePeriod .'%i'][]  = (integer) $query->searchCountInTime[11]->searchCount - (integer) $query->searchCountInTime[10]->searchCount;


         if($recordsCounter == $limitToDB) {
          	 saveRecordsToDB($allData, $columns);
          	 unset($allData);
          	 $recordsCounter = 0;  // musime znovu nastavit na nulu aby se nam do pole ulozilo dalsich XX zaznamu.
          }
          $recordsCounter++;
      }

      if (!empty($allData)) {
        saveRecordsToDB($allData, $columns);
        unset($allData);
      }

    } else {
      // co když API vrátí chybu?
      echo $data->status;
    }
  }

  // print_r($allData);
  // die();
}


function saveRecordsToDB($data, $columns) {

    dibi::query("INSERT INTO [data] %m ON DUPLICATE KEY UPDATE
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n),
      %n = VALUES(%n); ", $data, $columns[0], $columns[0], $columns[1], $columns[1], $columns[2], $columns[2], $columns[3], $columns[3], $columns[4], $columns[4],
     $columns[5], $columns[5], $columns[6], $columns[6], $columns[7], $columns[7], $columns[8], $columns[8], $columns[9], $columns[9], $columns[10], $columns[10],
   $columns[11], $columns[11], $columns[12], $columns[12], $columns[13], $columns[13], $columns[14], $columns[14], $columns[15], $columns[15], $columns[16], $columns[16],
 $columns[17], $columns[17], $columns[18], $columns[18], $columns[19], $columns[19], $columns[20], $columns[20], $columns[21], $columns[21], $columns[22], $columns[22] );

}
