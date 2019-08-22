<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class ItemIssueData extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'is_active', 'item_issue_id', 'quantity', 'item_id', 'measuring_unit_id', 'unit_price', 'description');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function itemIssue(){
        return $this->belongsTo('App\ItemIssue', 'item_issue_id', 'id');
    }
    
    /*
    //one to many (inverse)
    public function stock(){
        return $this->belongsTo('App\Stock', 'stock_id', 'id');
    }
    */
    
    //one to many (inverse)
    public function item(){
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }
    
    //one to many (inverse)
    public function measuringUnit(){
        return $this->belongsTo('App\MeasuringUnit', 'measuring_unit_id', 'id');
    }
    
    //one to many
    public function itemReceiveDatasSum(){
        //->selectRaw('SUM(column) as sum')
        //->addSelect('SUM(column) as sum')
        //->selectRaw('SUM(column) as sum')
        /*
        $itemIssueObject = $this->belongsTo('App\ItemIssue', 'item_issue_id', 'id')
            //->with(['itemReceiveDatas' => function($query){}])
            ->with(['itemReceiveDatas'])
            ->whereHas('itemReceiveDatas', function(Builder $query){
                $query->where('item_id', '=', $this->item_id);
            })->first();
        $itemReceiveDatas = $itemIssueObject->itemReceiveDatas;
        dd(collect($itemReceiveDatas)->sum('quantity'));
        */
        $itemReceiveDatasObject = $this->itemReceiveDatas();
        return ($itemReceiveDatasObject) ? ( collect($itemReceiveDatasObject)->sum('quantity') ) : 0;
    }
    
    //one to many
    public function itemReceiveDatas(){
        return $this->itemIssue->itemReceiveDatas->where('item_id', '=', $this->item_id);
    }
    
}
