<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class WeekTemplateModel extends CFormModel
{
    public $IsMon;
    public $IsTue;
    public $IsWed;
    public $IsThu;
    public $IsFri;
    public $IsSat;
    public $IsSun;
    
    public $WedFaci;
    public $FriFaci;
    public $MonFaci;
    public $TueFaci;
    public $ThuFaci;
    
    public $MonSub;
    public $TueSub;
    public $WedSub;
    public $ThuSub;
    public $FriSub;

    public $MonFrom;
    public $MonTo;
    public $TueFrom;
    public $TueTo;
    public $WedFrom;
    public $WedTo;
    public $ThuFrom;
    public $ThuTo;
    public $FriFrom;
    public $FriTo;
    
        
    public function rules()
    {
        return array(
            array('Mon, Tue, Wed, The, Fri, Sat, Sun', 'safe', 'on'=>'search')
        );
    }
 
    public function GenerateAttendance($FromDate,$ToDate)
    {
        
    }
}