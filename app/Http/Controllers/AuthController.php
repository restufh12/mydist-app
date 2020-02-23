<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataSetting;

class AuthController extends Controller
{
   public function cek_store(Request $request){
      $StoreCode    = $request->post('StoreCode');
      $vDataStore   = DataSetting::where('StoreCode', $StoreCode)->first();
      $vRecordCount = DataSetting::where('StoreCode', $StoreCode)->where('StoreCode', '<>', '')->count();
    
      if($vRecordCount>0){
        // Set Store Code Session
        session( ['SessionID' => session_id(),
                  'LoginYN' => 1,
                  'StoreCode' => $vDataStore->StoreCode,
                  'StoreCode2' => $vDataStore->StoreCode2,
                  'DatabaseName' => $vDataStore->DatabaseName,
                  'DB_ID' => $vDataStore->DB_ID,
                  'DB_Password' => $vDataStore->DB_Password,
                  'DB_Port' => $vDataStore->DB_Port,
                  'DB_IP' => $vDataStore->DB_IP,
                  'ModuleCode' => $vDataStore->ModuleCode,
                  'StoreMain' => $vDataStore->StoreMain,
                  'ArrSidebarScopeModule1' => $vDataStore->ArrSidebarScopeModule1,
                  'ArrSidebarScopeModule2' => $vDataStore->ArrSidebarScopeModule2,
                  'ArrSidebarScopeModule3' => $vDataStore->ArrSidebarScopeModule3,
                  'ArrScopeModuleDashboard' => $vDataStore->ArrScopeModuleDashboard,
                  'DBVersionDate' => $vDataStore->DBVersionDate,
                 ]
                );
        return "1";
      } else {
        return "0";
      }
   }

   public function login(Request $request){
      return view("login");
   }
}
